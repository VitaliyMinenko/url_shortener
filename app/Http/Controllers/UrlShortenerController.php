<?php

namespace App\Http\Controllers;

use App\Http\Requests\UrlShortenerRequest;
use App\Services\UrlShortenerService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class UrlShortenerController extends Controller
{

    public function __construct(private UrlShortenerService $shortenerService)
    {
    }

    public function store(UrlShortenerRequest $request): JsonResponse
    {
        $urls = $request->validated();
        dd($urls);
        $this->shortenerService->makeShortUrl($urls->url);
        return new JsonResponse('Ok');
    }
}
