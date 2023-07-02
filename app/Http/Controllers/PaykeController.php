<?php /** @noinspection ALL */

namespace App\Http\Controllers;

use App\Models\Collection;
use App\Repositories\CollectionRepository;
use App\Http\Requests\CollectionRequest;

class PaykeController
{
    public function __construct(protected CollectionRepository $collectionRepository, protected PaykeRepository $paykeRepository)
    {
        abort_if(!auth()->user()->tokenCan('carrier'), 403);
    }

    public function index()
    {
        return $this->collectionRepository->getAllCollection();
    }

    public function status(Collection $collection, string $status)
    {
        $this->collectionRepository->status($collection, $status);
        return $this->paykeRepository->status($collection, $status);
    }
}
