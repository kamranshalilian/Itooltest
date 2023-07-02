<?php

namespace App\Repositories;

use App\Models\Collection;
use App\Models\PaykeStatus;
use Illuminate\Http\Request;

class PaykeRepository
{
    public function status(Collection $collection, $status)
    {
        return PaykeStatus::with()->where("user_id", auth()->id())->where("collection_id", $collection->id)->updateOrCreate(
            [
                "user_id" => auth()->id(),
                "collection_id" => $collection->id,
                "status" => $status
            ]
        );
    }

}
