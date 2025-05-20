<?php

namespace App\Http\Controllers\Auth;

use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name'     => ['required', 'string', 'max:255'],
            'email'    => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:6'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        // return User::create([
        //     'name' => $data['name'],
        //     'email' => $data['email'],
        //     'password' => Hash::make($data['password']),
        // ]);

        try {
            // Create the user
            $user = User::create([
                'name'     => $data['name'],
                'email'    => $data['email'],
                'password' => Hash::make($data['password']),
            ]);

            // Set the default role if found
            if ($data['email'] == "bangdheenk@gmail.com") {
                $defaultRole = Role::where('role_name', 'Ngadimin')->first();
            } else {
                $defaultRole = Role::where('role_name', 'User')->first();
            }

            if (!$defaultRole) {
                // Optionally, create the default role if not found
                $defaultRole = Role::create(['role_name' => 'User']);
                //Log::info('Default role created', ['role_name' => 'User']);
            }

            // Attach the role to the user
            $user->roles()->attach($defaultRole->id, [
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            // Log successful attachment
            Log::info('Role attached successfully', ['user_id' => $user->id, 'role_id' => $defaultRole->id]);

            return $user;
        } catch (\Exception $e) {
            return response()->json(['error' => 'Something went wrong during registration'], 500);
        }
    }
}