<?php

namespace App\Contracts\Services;

use App\Dto\NewsStoreDto;
use App\Dto\NewsUpdateDto;
use App\Models\News;
use Illuminate\Database\Eloquent\Collection;

interface NewsServiceContract
{
    public function store(NewsStoreDto $dto): News;

    public function update(NewsUpdateDto $dto): void;

    public function delete(int $id): void;

    public function show(int $id): ?News;

    public function list(): Collection;
}
