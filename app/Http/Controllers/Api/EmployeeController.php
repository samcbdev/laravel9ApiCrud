<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\API\BaseController as BaseController;
use Illuminate\Http\Request;
use App\Models\Employee;
use Illuminate\Support\Facades\Auth;
use Validator;

class EmployeeController extends BaseController
{
    /**
    * register api.
    *
    * @return \Illuminate\Http\Response
    */
    public function index(Request $request) {
        
        $query = Employee::paginate(10);

        return $this->sendResponse($query, 'result success');
    }

    public function create(Request $request) {
        $query = Employee::create($request->all());

        return $this->sendResponse($request->all(), 'result success');
    }

    public function detail($id) {
        $query = Employee::where('id', $id)->first();

        return $this->sendResponse($query, 'result success');
    }

    public function update($id, Request $request) {
        $query = Employee::where('id', $id)->update($request->all());

        return $this->sendResponse($query, 'update success');
    }

    public function delete($id) {
        $query = Employee::where('id', $id)->delete();

        return $this->sendResponse($query, 'delete success');
    }
}
