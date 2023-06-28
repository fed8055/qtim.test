<?php

namespace App\Repositories;

use App\Contracts\Repositories\NewsRepositoryContract;
use App\Dto\NewsStoreDto;
use App\Dto\NewsUpdateDto;
use App\Models\News;
use Illuminate\Database\Eloquent\Collection;

class NewsRepository implements NewsRepositoryContract
{

    public function store(NewsStoreDto $dto): News
    {
        return News::query()->create([
            'text' => $dto->text,
            'header' => $dto->header,
            'user_id' => $dto->userId
        ]);
    }

    public function update(NewsUpdateDto $dto): void
    {
        News::query()
            ->where('id', $dto->id)
            ->update([
                'header' => $dto->header,
                'text' => $dto->text
            ]);
    }

    public function delete(int $id): void
    {
        News::query()
            ->where('id', $id)
            ->delete();
    }

    public function show(int $id): ?News
    {
        /** @var ?News $model */
        $model = News::query()
            ->where('id', $id)
            ->first();

        return $model;
    }

    public function list(): Collection
    {
        return News::all();
    }
}
