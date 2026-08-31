<?php

namespace App\Services;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;

class GithubContributions
{
    private const CACHE_TTL_MINUTES = 60;

    /**
     * Kalender kontribusi setahun terakhir, atau null kalau belum dikonfigurasi / gagal.
     */
    public function calendar(): ?array
    {
        $username = config('services.github.username');
        $token = config('services.github.token');

        if (! $username || ! $token) {
            return null;
        }

        $year = now()->year;
        $key = "github.contributions.{$username}.{$year}";

        if ($cached = Cache::get($key)) {
            return $cached;
        }

        $data = $this->fetch($username, $token);

        // kegagalan sengaja tidak di-cache, biar percobaan berikutnya tetap jalan
        if ($data) {
            Cache::put($key, $data, now()->addMinutes(self::CACHE_TTL_MINUTES));
        }

        return $data;
    }

    private function fetch(string $username, string $token): ?array
    {
        $query = <<<'GRAPHQL'
            query($login: String!, $from: DateTime!, $to: DateTime!) {
                user(login: $login) {
                    contributionsCollection(from: $from, to: $to) {
                        contributionCalendar {
                            totalContributions
                            weeks {
                                contributionDays {
                                    date
                                    contributionCount
                                    contributionLevel
                                }
                            }
                        }
                    }
                }
            }
        GRAPHQL;

        $response = Http::withToken($token)
            ->acceptJson()
            ->timeout(8)
            ->post('https://api.github.com/graphql', [
                'query' => $query,
                'variables' => [
                    'login' => $username,
                    // dikunci ke tahun berjalan, bukan 365 hari terakhir
                    'from' => now()->startOfYear()->toIso8601String(),
                    'to' => now()->endOfYear()->toIso8601String(),
                ],
            ]);

        if ($response->failed()) {
            return null;
        }

        return $response->json('data.user.contributionsCollection.contributionCalendar');
    }
}