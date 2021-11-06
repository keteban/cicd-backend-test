<?php

namespace App\Repositories\Interfaces;

use App\Http\Requests\EmployeeStoreRequest;
use App\Http\Requests\EmployeeUpdateRequest;

interface EmployeeRepositoryInterface
{

    public function getALlEmployee();

    public function deleteEmployee($idEmployee);

    public function updateEmployee($idEmployee, EmployeeUpdateRequest $request);

    public function addEmployee(EmployeeStoreRequest $request);

}
