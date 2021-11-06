<?php

namespace App\Repositories;

use App\Http\Requests\EmployeeStoreRequest;
use App\Http\Requests\EmployeeUpdateRequest;
use App\Models\Employee;
use App\Repositories\Interfaces\EmployeeRepositoryInterface;
use phpDocumentor\Reflection\PseudoTypes\NonEmptyLowercaseString;

class EmployeeRepository implements EmployeeRepositoryInterface
{
    public function __construct()
    {
        //
    }

    public function getALlEmployee()
    {
        return Employee::all()->map(function ($employee) {
            return [
                'id' => $employee->id,
                'first_name' => $employee->first_name,
                'last_name' => $employee->last_name,
                'phone' => $employee->phone,
                'email' => $employee->email,
                'work_hours'=> $employee->work_hours,
                'hourly_rate'=> $employee->hourly_rate,
                'salary_type' => $employee->salary_type,
                'salary' => $employee->salary,
                'salary_calculate' => $this->calculateSalary($employee),
                'department' => $employee->department,
            ];
        });
    }

    public function deleteEmployee($idEmployee)
    {
        $employee = Employee::findOrFail($idEmployee);
        $employee->delete();
    }

    public function updateEmployee($idEmployee, EmployeeUpdateRequest $request)
    {
        $employee = Employee::findOrFail($idEmployee);
        $employee->first_name = $request->first_name;
        $employee->last_name = $request->last_name;
        $employee->phone = $request->phone;
        $employee->email = $request->email;
        $employee->work_hours = $request->work_hours;
        $employee->hourly_rate = $request->hourly_rate;
        $employee->salary = $request->salary;
        $employee->save();

        return $this->getEmployeeById($employee->id);
    }

    private function getEmployeeById($employeeId): array
    {
        $employee = Employee::findOrFail($employeeId);
        return [
            'id' => $employee->id,
            'first_name' => $employee->first_name,
            'last_name' => $employee->last_name,
            'phone' => $employee->phone,
            'email' => $employee->email,
            'work_hours'=> $employee->work_hours,
            'hourly_rate'=> $employee->hourly_rate,
            'salary_type' => $employee->salary_type,
            'salary' => $employee->salary,
            'salary_calculate' => $this->calculateSalary($employee),
            'department' => $employee->department,
        ];
    }

    public function addEmployee(EmployeeStoreRequest $request)
    {
        $employee = new Employee();
        $employee->first_name = $request->first_name;
        $employee->last_name = $request->last_name;
        $employee->phone = $request->phone;
        $employee->email = $request->email;
        $employee->work_hours = $request->work_hours;
        $employee->hourly_rate = $request->hourly_rate;
        $employee->salary_type = $request->salary_type;
        $employee->salary = $request->salary;
        $employee->department = $request->department;
        $employee->save();

        return $this->getEmployeeById($employee->id);

    }

    private function calculateSalary($employee)
    {
        if ($employee->salary_type === 1) {
            return $employee->hourly_rate * $employee->work_hours;
        } elseif ($employee->salary_type === 2) {
            return $employee->salary;
        } else {
            if ($employee->work_hours >= 100) {
                return $employee->hourly_rate * $employee->work_hours;
            } else {
                return ($employee->hourly_rate * 0.75) * $employee->work_hours;
            }
        }
    }
}
