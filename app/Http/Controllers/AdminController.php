<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        return Admin::all();
    }

    public function store(Request $request)
    {
        $request->validate([
            // Validation rules
        ]);

        return Admin::create($request->all());
    }

    public function show($id)
    {
        return Admin::find($id);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            // Validation rules
        ]);

        $model = Admin::findOrFail($id);
        $model->update($request->all());

        return $model;
    }

    public function destroy($id)
    {
        Admin::destroy($id);

        return response()->noContent();
    }
}
