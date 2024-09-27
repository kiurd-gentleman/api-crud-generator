<?php

namespace App\Http\Controllers;

use App\Models\HrDepartment;
use App\Http\Requests\StoreHrDepartmentRequest;
use App\Http\Requests\UpdateHrDepartmentRequest;
use Illuminate\Http\Response;

class HrDepartmentController extends Controller
{
    public function index()
    {
        return HrDepartment::all();
    }

    public function store(StoreHrDepartmentRequest $request)
    {
        return HrDepartment::create($request->validated());
    }

    public function show(HrDepartment $HrDepartment)
    {
        return $HrDepartment;
    }

    public function update(UpdateHrDepartmentRequest $request, HrDepartment $HrDepartment)
    {
        $HrDepartment->update($request->validated());
        return $HrDepartment;
    }

    public function destroy(HrDepartment $HrDepartment)
    {
        $HrDepartment->delete();
        return response(null, Response::HTTP_NO_CONTENT);
    }
}
