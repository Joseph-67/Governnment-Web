<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Jetstream;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array<string, string>  $input
     */
    public function create(array $input): User
    {
        Validator::make($input, [
            'first_name' => ['required', 'string', 'min:4', 'max:255'],
            'last_name' => ['required', 'string', 'min:4', 'max:255'],
            'other_name' => ['nullable', 'string', 'min:4', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'min:4', 'max:255', 'unique:users'],
            'password' => $this->passwordRules(),
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['accepted', 'required'] : '',
            'mobile_number' => ['nullable', 'numeric', 'min:12']
        ])->validate();

        return User::create([
            'first_name' => $input['first_name'],
            'last_name' =>  $input['last_name'],
            'other_name' =>  $input['other_name'],
            'email' => $input['email'],
            'password' => Hash::make($input['password']),
            'terms' => $input['terms'],
            'mobile_number' => $input['mobile_number']
        ]);
    }
}
