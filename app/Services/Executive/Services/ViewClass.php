<?php

namespace App\Services\Executive\Services;

use App\Models\Service;
use App\Http\Resources\DefaultResource;

class ViewClass
{
    public function list($request){
        $plans = Service::with('category','type')->paginate(10);
        return DefaultResource::collection($plans);
    }
}
