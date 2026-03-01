<?php

namespace App\Http\Controllers\Executive;

use App\Services\DropdownClass;
use App\Traits\HandlesTransaction;
use App\Services\Executive\Branches\SaveClass;
use App\Services\Executive\Branches\ViewClass;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Executive\BranchRequest;

class BranchController extends Controller
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
                return inertia('Executive/Branches/Index',[
                    'dropdowns' => [
                        'regions' => $this->dropdown->regions()
                    ]
                ]);
        }
    }

    public function store(BranchRequest $request){
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
