<?php

namespace App\Http\Controllers;

use App\Models\Hello2;
use Illuminate\Http\Request;

class Hello2Controller extends Controller
{
    public function index()
    {
        return Hello2::all();
    }

    public function store(Request $request)
    {
        $request->validate([
            // Validation rules
        ]);

        return Hello2::create($request->all());
    }

    public function show($id)
    {
        return Hello2::find($id);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            // Validation rules
        ]);

        $model = Hello2::findOrFail($id);
        $model->update($request->all());

        return $model;
    }

    public function destroy($id)
    {
        Hello2::destroy($id);

        return response()->noContent();
    }
}
