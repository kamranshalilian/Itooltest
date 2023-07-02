<?php /** @noinspection ALL */

namespace App\Http\Controllers;

use App\Models\Collection;
use App\Repositories\CollectionRepository;
use App\Http\Requests\CollectionRequest;

class CollectionController
{
    public function __construct(protected CollectionRepository $collectionRepository)
    {
        abort_if(!auth()->user()->tokenCan('user'), 403);
    }

    public function index()
    {
        return $this->collectionRepository->getAll();
    }

    public function store(CollectionRequest $request)
    {
        return $this->collectionRepository->create($request);
    }

    public function show(Collection $collection)
    {
        return $collection;
    }

    public function update(CollectionRequest $request, Collection $collection)
    {
        return $this->collectionRepository->update($request, $collection);;
    }

    public function destroy(Collection $collection)
    {
        return $this->collectionRepository->delete($collection);
    }

    public function cancel(Collection $collection)
    {
        return $this->collectionRepository->cancel($collection);
    }
}
