<?php

namespace App\Services;

use App\Http\Requests\EmployeeStoreRequest;
use App\Http\Requests\EmployeeUpdateRequest;
use App\Repositories\Interfaces\EmployeeRepositoryInterface;
use App\Repositories\Interfaces\EmployeeSalaryRepositoryInterface;
use Illuminate\Support\Facades\DB;

class EmployeeService extends ApplicationService
{

    private $employeeRepository;


    public function __construct(EmployeeRepositoryInterface $employeeRepository)
    {
        $this->employeeRepository = $employeeRepository;
    }

    public function getAllEmployee(): array
    {
        return $this->successResponse(
          "Success get data",
            $this->employeeRepository->getALlEmployee()
        );
    }

    public function addEmployee(EmployeeStoreRequest $request) {
        DB::beginTransaction();
        try {
            $data = $this->employeeRepository->addEmployee($request);

            DB::commit();

            return $this->successResponse("Success add data employee", $data);
        } catch (\Exception $exception) {
            DB::rollBack();
            return $this->errorResponse("Failed add data employee", $exception);
        }

    }

    public function updateEmployee($idEmployee, EmployeeUpdateRequest $request): array
    {
        DB::beginTransaction();
        try {
            $data = $this->employeeRepository->updateEmployee($idEmployee, $request);

            DB::commit();

            return $this->successResponse("Success updated data employee", $data);
        } catch (\Exception $exception) {
            DB::rollBack();
            return $this->errorResponse("Failed updated data employee", $exception);
        }
    }

    public function deleteEmployee($idEmployee) {
        DB::beginTransaction();
        try {
            $this->employeeRepository->deleteEmployee($idEmployee);

            DB::commit();

            return $this->successResponse("Success delete data employee");
        } catch (\Exception $exception) {
            DB::rollBack();
            return $this->errorResponse("Failed delete data employee", $exception);
        }
    }
}
