<?php

namespace App\Services;

use App\Models\UrlShortener;
use Exception;
use RuntimeException;
use Throwable;

class UrlShortenerService
{
    /**
     * @throws Exception
     */
    public function makeShortUrl(string $originalUrl): string
    {
        try {
            $shortUrl = substr(md5($originalUrl . time()), 0, 6);
            $this->saveShortUrl($shortUrl, $originalUrl);

            return $shortUrl;
        } catch (Throwable $exception) {
            throw new RuntimeException('Failed to generate short url: ' . $exception->getMessage(), 0, $exception);
        }
    }

    /**
     * @throws Exception
     */
    public function getOriginalUrl(string $url): string
    {
        try {
            $urlObject = UrlShortener::where('short_url', $url)->firstOrFail();
            return $urlObject->original_url;
        } catch (Throwable $exception) {
            throw new Exception('Url not found');
        }
    }

    public function isOriginalUrl(string $url): bool
    {
        $urlObject = UrlShortener::where('original_url', $url)->first();

        if($urlObject){
            return true;
        } else {
            return false;
        }
    }

    private function saveShortUrl(string $shortUrl, string $originalUrl): void
    {
        $urlShortener = new UrlShortener([
            'original_url' => $originalUrl,
            'short_url' => $shortUrl,
        ]);

        $urlShortener->save();
    }
}
