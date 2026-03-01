<?php

namespace App\Services\Executive\Branches;

use App\Models\Branch;

class SaveClass
{
    public function service($request){
      
        $data = Branch::create($request->all());
        return [
            'data' => $data,
            'message' => 'Service creation was successful!',
            'info' => "You've successfully added new service."
        ];
    }
}
