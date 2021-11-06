<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\EmployeeStoreRequest;
use App\Http\Requests\EmployeeUpdateRequest;
use App\Services\EmployeeService;

class EmployeeController extends Controller
{


    /*
     * Get All Data
     */
    public function getAll(EmployeeService $employeeService): \Illuminate\Http\JsonResponse
    {
        return response()->json($employeeService->getAllEmployee());
    }

    /*
     * Store data into database
     */
    public function store(EmployeeStoreRequest $request, EmployeeService $service): \Illuminate\Http\JsonResponse
    {
        $request->validated();

        return response()->json($service->addEmployee($request));
    }

    /*
     * Update Data into database with given id
     */
    public function update($employeeId, EmployeeUpdateRequest $request, EmployeeService $service): \Illuminate\Http\JsonResponse
    {
        $request->validated();

        return response()->json($service->updateEmployee($employeeId, $request));

    }

    public function destroy($employeeId, EmployeeService $service): \Illuminate\Http\JsonResponse
    {
        return response()->json($service->deleteEmployee($employeeId));
    }
}
