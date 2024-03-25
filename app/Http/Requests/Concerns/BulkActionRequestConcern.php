<?php

namespace App\Http\Requests\Concerns;

use Illuminate\Contracts\Validation\Validator as Validator;
use Illuminate\Validation\ValidationException;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\JsonResponse;

trait BulkActionRequestConcern
{
    protected function failedValidation(Validator $validator)
    {
      $errors = (new ValidationException($validator))->errors();

      throw new HttpResponseException(response()->json(
        [
          'error' => $errors,
          'status_code' => 422,
        ], JsonResponse::HTTP_UNPROCESSABLE_ENTITY));
    }
}
