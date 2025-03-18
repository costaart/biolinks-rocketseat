<?php

namespace App\Http\Requests;
use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Password;

class RegisterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string'],
            'email' => ['required', 'email', 'confirmed', 'unique:users'], //esse users é o nome da tabela
            'password' => ['required', Password::min(4)], //tem inumeras regras mas para esse projeto nao eh necessario
        ];
    }

    public function tryToRegister(): bool
    {
        $user = User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => $this->password, //Como no model eu botei senha como hashed, nao precisa usar o hash() aqui;
        ]);

        Auth::login($user); // Use the Auth facade to login the user
        
        return true;
    }
}
