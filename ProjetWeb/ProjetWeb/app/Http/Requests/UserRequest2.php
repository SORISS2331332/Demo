<?php
namespace App\Http\Requests;
use Illuminate\Foundation\Http\FormRequest;
class UserRequest2 extends FormRequest
{
    public function authorize()
    {
        return true;
    }
    public function rules()
    {
        return [
            'email' => 'email',
            'role' => 'required|string|in:utilisateur,admin,visiteur',
        ];
    }
}