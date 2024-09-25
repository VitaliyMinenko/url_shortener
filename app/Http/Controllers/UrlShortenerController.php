<?php

namespace App\Http\Controllers;

use App\Http\Requests\UrlShortenerRequest;
use App\Services\UrlShortenerService;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Illuminate\Support\Facades\Log;
use RuntimeException;
use Throwable;

class UrlShortenerController extends Controller
{

    public function __construct(private UrlShortenerService $shortenerService)
    {
    }

    public function store(UrlShortenerRequest $request): JsonResponse
    {
        {
            $urls = $request->validated();

            try {
                $shortUrl = $this->shortenerService->makeShortUrl($urls['url']);
                return new JsonResponse(
                    [
                        'message' => 'Short URL created successfully.',
                        'url' => $shortUrl
                    ]
                    , 201);
            } catch (RuntimeException $exception) {
                return new JsonResponse(['error' => $exception->getMessage()], 500);
            } catch (Throwable $exception) {
                Log::error($exception);
                return new JsonResponse(['error' => 'An unexpected error occurred.'], 500);
            }
        }
    }

    public function checkUrl(string $url): RedirectResponse|View
    {
        try {
            $isOriginalUrl = $this->shortenerService->isOriginalUrl($url);

            if(!$isOriginalUrl)
            {
                $originalUrl = $this->shortenerService->getOriginalUrl($url);
                return redirect($originalUrl);
            }
        } catch (Exception $exception) {
            Log::error($exception);
        }

        return view('url_template');
    }
}
