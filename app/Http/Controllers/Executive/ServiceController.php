<?php

namespace App\Http\Controllers\Executive;

use App\Services\DropdownClass;
use App\Traits\HandlesTransaction;
use App\Services\Executive\Services\SaveClass;
use App\Services\Executive\Services\ViewClass;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Executive\ServiceRequest;

class ServiceController extends Controller
{
    use HandlesTransaction;

    public $view,$save,$dropdown;

    public function __construct(SaveClass $save, ViewClass $view, DropdownClass $dropdown){
        $this->view = $view;
        $this->save = $save;
        $this->dropdown = $dropdown;
    }

    public function index(Request $request){
        switch($request->option){
            case 'list':
                return $this->view->list($request);
            break;
            default:
                return inertia('Executive/Services/Index',[
                    'dropdowns' => [
                        'categories' => $this->dropdown->datas('Category'),
                        'cars' => $this->dropdown->datas('Car'),
                        'motorcycle' => $this->dropdown->datas('Motorcycle'),
                        'types' => $this->dropdown->datas('Type')
                    ]
                ]);
        }
    }

    public function store(ServiceRequest $request){
        $result = $this->handleTransaction(function () use ($request) {
            return $this->save->service($request);
        });

        return back()->with([
            'data' => $result['data'],
            'message' => $result['message'],
            'info' => $result['info'],
            'status' => $result['status'],
        ]);
    }
}
