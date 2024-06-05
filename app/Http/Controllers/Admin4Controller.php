<?php

namespace App\Http\Controllers;

use App\Models\Admin4;
use App\Http\Requests\StoreAdmin4Request;
use App\Http\Requests\UpdateAdmin4Request;
use Illuminate\Http\Response;

class Admin4Controller extends Controller
{
    public function index()
    {
        return Admin4::all();
    }

    public function store(StoreAdmin4Request $request)
    {
        return Admin4::create($request->validated());
    }

    public function show(Admin4 $Admin4)
    {
        return $Admin4;
    }

    public function update(UpdateAdmin4Request $request, Admin4 $Admin4)
    {
        $Admin4->update($request->validated());
        return $Admin4;
    }

    public function destroy(Admin4 $Admin4)
    {
        $Admin4->delete();
        return response(null, Response::HTTP_NO_CONTENT);
    }
}
