<?php

namespace App\Services\Executive\Branches;

use App\Models\Branch;
use App\Http\Resources\DefaultResource;

class ViewClass
{
    public function list($request){
        $plans = Branch::with('region','province','municipality','barangay')->paginate(10);
        return DefaultResource::collection($plans);
    }
}
