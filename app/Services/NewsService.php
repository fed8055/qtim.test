<?php

namespace App\Services;

use App\Contracts\Repositories\NewsRepositoryContract;
use App\Contracts\Services\NewsServiceContract;
use App\Dto\NewsStoreDto;
use App\Dto\NewsUpdateDto;
use App\Exceptions\ModelDeleteException;
use App\Exceptions\ModelStoreException;
use App\Exceptions\ModelUpdateException;
use App\Models\News;
use Illuminate\Database\Eloquent\Collection;
use Throwable;

class NewsService implements NewsServiceContract
{
    public function __construct(
        private readonly NewsRepositoryContract $newsRepository
    )
    {
    }

    /**
     * @throws ModelStoreException
     */
    public function store(NewsStoreDto $dto): News
    {
        try {
            return $this->newsRepository->store($dto);
        } catch (Throwable $exception) {
            throw new ModelStoreException(message:'Not able to save news', previous: $exception);
        }
    }

    /**
     * @throws ModelUpdateException
     */
    public function update(NewsUpdateDto $dto): void
    {
        try {
            $this->newsRepository->update($dto);
        } catch (Throwable $exception) {
            throw new ModelUpdateException(message:'Not able to update news', previous: $exception);
        }
    }

    /**
     * @throws ModelDeleteException
     */
    public function delete(int $id): void
    {
        try {
            $this->newsRepository->delete($id);
        } catch (Throwable $exception) {
            throw new ModelDeleteException(message:'Not able to delete news', previous: $exception);
        }
    }

    public function show(int $id): ?News
    {
        return $this->newsRepository->show($id);
    }

    public function list(): Collection
    {
        return $this->newsRepository->list();
    }
}
