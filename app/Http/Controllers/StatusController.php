<?php

namespace App\Http\Controllers;

use App\Models\status;
use App\Http\Requests\StorestatusRequest;
use App\Http\Requests\UpdatestatusRequest;
use Illuminate\Http\Request;

class StatusController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:sanctum');
    }
    public function index(Request $request)
    {
        if($request->has('for')){
            return status::where('for', $request['for'])->get();
        }
        return status::all();
    }


    public function create()
    {
        //
    }


    public function store(StorestatusRequest $request)
    {
        //
    }


    public function show(status $status)
    {
        //
    }


    public function edit(status $status)
    {
        //
    }


    public function update(UpdatestatusRequest $request, status $status)
    {
        //
    }


    public function destroy(status $status)
    {
        //
    }
}
