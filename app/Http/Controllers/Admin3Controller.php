<?php

namespace App\Http\Controllers;

use App\Models\Admin3;
use App\Http\Requests\StoreAdmin3Request;
use App\Http\Requests\UpdateAdmin3Request;
use Illuminate\Http\Response;

class Admin3Controller extends Controller
{
    public function index()
    {
        return Admin3::all();
    }

    public function store(StoreAdmin3Request $request)
    {
        return Admin3::create($request->validated());
    }

    public function show(Admin3 $Admin3)
    {
        return $Admin3;
    }

    public function update(UpdateAdmin3Request $request, Admin3 $Admin3)
    {
        $Admin3->update($request->validated());
        return $Admin3;
    }

    public function destroy(Admin3 $Admin3)
    {
        $Admin3->delete();
        return response(null, Response::HTTP_NO_CONTENT);
    }
}
