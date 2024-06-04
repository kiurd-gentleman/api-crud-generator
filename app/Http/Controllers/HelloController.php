<?php

namespace App\Http\Controllers;

use App\Models\Hello;
use Illuminate\Http\Request;

class HelloController extends Controller
{
    public function index()
    {
        return Hello::all();
    }

    public function store(Request $request)
    {
        $request->validate([
            // Validation rules
        ]);

        return Hello::create($request->all());
    }

    public function show($id)
    {
        return Hello::find($id);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            // Validation rules
        ]);

        $model = Hello::findOrFail($id);
        $model->update($request->all());

        return $model;
    }

    public function destroy($id)
    {
        Hello::destroy($id);

        return response()->noContent();
    }
}
