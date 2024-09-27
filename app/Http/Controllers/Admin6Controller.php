<?php

namespace App\Http\Controllers;

use App\Models\Admin6;
use App\Http\Requests\StoreAdmin6Request;
use App\Http\Requests\UpdateAdmin6Request;
use Illuminate\Http\Response;

class Admin6Controller extends Controller
{
    public function index()
    {
        return Admin6::all();
    }

    public function store(StoreAdmin6Request $request)
    {
        return Admin6::create($request->validated());
    }

    public function show(Admin6 $Admin6)
    {
        return $Admin6;
    }

    public function update(UpdateAdmin6Request $request, Admin6 $Admin6)
    {
        $Admin6->update($request->validated());
        return $Admin6;
    }

    public function destroy(Admin6 $Admin6)
    {
        $Admin6->delete();
        return response(null, Response::HTTP_NO_CONTENT);
    }
}
