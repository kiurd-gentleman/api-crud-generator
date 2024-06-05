<?php

namespace App\Http\Controllers;

use App\Models\Admin5;
use App\Http\Requests\StoreAdmin5Request;
use App\Http\Requests\UpdateAdmin5Request;
use Illuminate\Http\Response;

class Admin5Controller extends Controller
{
    public function index()
    {
        return Admin5::all();
    }

    public function store(StoreAdmin5Request $request)
    {
        return Admin5::create($request->validated());
    }

    public function show(Admin5 $Admin5)
    {
        return $Admin5;
    }

    public function update(UpdateAdmin5Request $request, Admin5 $Admin5)
    {
        $Admin5->update($request->validated());
        return $Admin5;
    }

    public function destroy(Admin5 $Admin5)
    {
        $Admin5->delete();
        return response(null, Response::HTTP_NO_CONTENT);
    }
}
