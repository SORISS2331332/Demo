<?php
namespace App\Http\Requests;
use Illuminate\Foundation\Http\FormRequest;
class RegisterRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }
    public function rules()
    {
        return [
            'prenom' => 'required|string|max:10',
            'nom' => 'required|string|max:10',
            'email' => 'required|email',
            'adresse' => 'required|string',
            'mdp' => 'required|string',
        ];
    }
}