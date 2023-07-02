<?php

namespace App\Repositories;

use App\Models\Collection;
use Illuminate\Http\Request;

class CollectionRepository
{

    public function getAll()
    {
        return Collection::where("user_id", auth()->id())->get();
    }

    public function create(Request $request)
    {
        $collection = new Collection();
        $collection->pickup_longitude = $request->input('pickup_longitude');
        $collection->pickup_latitude = $request->input('pickup_latitude');
        $collection->pickup_address = $request->input('pickup_address');
        $collection->pickup_name = $request->input('pickup_name');
        $collection->pickup_phone = $request->input('pickup_phone');
        $collection->deliver_longitude = $request->input('deliver_longitude');
        $collection->deliver_latitude = $request->input('deliver_latitude');
        $collection->deliver_address = $request->input('deliver_address');
        $collection->deliver_name = $request->input('deliver_name');
        $collection->deliver_phone = $request->input('deliver_phone');
        $collection->status = "pending";
        $collection->user_id = auth()->id();
        $collection->save();

        return $collection;
    }

    public function update(Request $request, Collection $collection)
    {
        $collection->pickup_longitude = $request->input('pickup_longitude');
        $collection->pickup_latitude = $request->input('pickup_latitude');
        $collection->pickup_address = $request->input('pickup_address');
        $collection->pickup_name = $request->input('pickup_name');
        $collection->pickup_phone = $request->input('pickup_phone');
        $collection->deliver_longitude = $request->input('deliver_longitude');
        $collection->deliver_latitude = $request->input('deliver_latitude');
        $collection->deliver_address = $request->input('deliver_address');
        $collection->deliver_name = $request->input('deliver_name');
        $collection->deliver_phone = $request->input('deliver_phone');
        $collection->user_id = auth()->id();
        $collection->save();

        return $collection;
    }

    public function delete(Collection $collection)
    {
        return $collection->delete();
    }

    public function cancel(Collection $collection)
    {
        if ($collection->status == "pending" || $collection->status == "pickling") {
            $collection->status = "cancel";
            $collection->save();
            return ["message" => "collection is cancel"];
        }

        return ["message" => "you can't cancel collection"];
    }

}
