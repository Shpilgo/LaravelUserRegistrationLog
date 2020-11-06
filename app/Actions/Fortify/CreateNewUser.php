<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use App\Models\UserRegistrationLog;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array  $input
     * @return \App\Models\User
     */
    public function create(array $input)
    {
        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => $this->passwordRules(),
        ])->validate();

        $user_created = User::create([
            'name' => $input['name'],
            'email' => $input['email'],
            'password' => Hash::make($input['password']),
        ]);

        $this->add_to_log($user_created->getAttributes());

        return $user_created;
    }

    private function add_to_log(array $user_attributes)
    {
        if (gettype($user_attributes) === 'array'
            && isset($user_attributes['id'])
            && is_integer($user_attributes['id'])
            && isset($user_attributes['created_at'])
            && is_string($user_attributes['created_at'])
        ) {
            $log_record = new UserRegistrationLog;

            $log_record->user_id = $user_attributes['id'];
            $log_record->user_registration_date_time = $user_attributes['created_at'];

            $log_record->save();
        }
    }

}
