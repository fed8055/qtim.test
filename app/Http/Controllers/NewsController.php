<?php

namespace App\Http\Controllers;

use App\Contracts\Services\NewsServiceContract;
use App\Http\Requests\NewsCreateRequest;
use App\Http\Requests\NewsUpdateRequest;
use App\Http\Resources\NewsResource;
use App\Http\Response\Response;
use JsonException;

class NewsController extends Controller
{
    /**
     * @throws JsonException
     */
    public function create(NewsCreateRequest $request, NewsServiceContract $newsService): Response
    {
        $response = new Response(NewsResource::make($newsService->store($request->toDto())));
        return $response->format();
    }

    /**
     * @throws JsonException
     */
    public function show(int $id, NewsServiceContract $newsService): Response
    {
        $response = new Response(NewsResource::make($newsService->show($id)));
        return $response->format();
    }

    /**
     * @throws JsonException
     */
    public function list(NewsServiceContract $newsService): Response
    {
        $response = new Response(NewsResource::collection($newsService->list()));
        return $response->format();
    }

    /**
     * @throws JsonException
     */
    public function update(NewsUpdateRequest $request, NewsServiceContract $newsService): Response
    {
        $newsService->update($request->toDto());

        return (new Response())->format();
    }

    /**
     * @throws JsonException
     */
    public function delete(int $id, NewsServiceContract $newsService): Response
    {
        $newsService->delete($id);

        return (new Response())->format();
    }
}
