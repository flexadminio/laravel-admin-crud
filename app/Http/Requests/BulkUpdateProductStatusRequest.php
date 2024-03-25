<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Http\Requests\Concerns\BulkActionRequestConcern;

class BulkUpdateProductStatusRequest extends FormRequest
{
  use BulkActionRequestConcern;
  /**
   * Get the validation rules that apply to the request.
   *
   * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
   */
  public function rules(): array
  {
    return [
      'status_id' => 'required',
      'product_ids' => 'required'
    ];
  }

  public function messages()
  {
    return [
      'status_id.required'=> 'Status is Required',
      'product_ids.required'=> 'Please select at least 1 product to update'
    ];
  }
}
