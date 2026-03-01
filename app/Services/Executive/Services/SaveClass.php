<?php

namespace App\Services\Executive\Services;

use App\Models\Service;

class SaveClass
{
    public function service($request){
      
        $data = Service::create($request->only([
            'name',
            'category_id',
            'type_id'
        ]));
        return [
            'data' => $data,
            'message' => 'Service creation was successful!',
            'info' => "You've successfully added new service."
        ];
    }
}
