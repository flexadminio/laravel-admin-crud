<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Http\Requests\Concerns\BulkActionRequestConcern;

class BulkDeleteResourceRequest extends FormRequest
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
      'resource_type' => 'required',
      'resource_ids' => 'required'
    ];
  }

  public function messages()
  {
    return [
      'resource_type.required'=> 'Resource Type is Required',
      'resource_ids.required'=> 'Please select at least 1 data item to delete'
    ];
  }
}
