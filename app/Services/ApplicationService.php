<?php
namespace App\Services;

abstract class ApplicationService
{
    protected function successResponse($message = null, $data = null)
    {
        return ['status' => true, 'errors' => null, 'message' => $message, 'data' => $data];
    }

    protected function errorResponse($errorMessage = null, $message = null, $data = null)
    {
        return ['status' => false, 'errors' => 'Error. '.$errorMessage, 'message' => $message, 'data' => $data];
    }
}
