<?php

namespace App\Domain\Front\Requests\Visitors;


use App\Domain\Front\Services\Visitors\VisitorService;
use App\Rules\UniqueEmail;
use Illuminate\Foundation\Http\FormRequest;

class VisitorCreateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'name' => 'required',
            'gender'=>'required',
            'phone'=>'required',
            'email'=>['required', 'email', new UniqueEmail(app(VisitorService::class))],
            'address'=>'required',
            'nationality'=>'required',
            'dob'=>'required',
            'education'=>'required',
            'contact_type'=>'required',
        ];
    }
}
