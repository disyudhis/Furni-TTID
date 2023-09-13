<?php

namespace App\Services\Auth;

use App\Models\Table\UserTable;
use App\Services\AppService;
use Illuminate\Support\Facades\Auth;
use Exception;
use Illuminate\Support\Facades\Hash;

class AuthService extends AppService {

    public function __construct(UserTable $model)
    {
        parent::__construct($model);
    }

    /**
     * Login user with email and password
     *
     * @param $data
     * @return object
     * @throws Exception
     */
    public function login($data)
    {
        if(!Auth::attempt(['email' => $data->email, 'password' => $data->password])) {
            throw new Exception('Credentials not match', 401);
        }

        $user = Auth::user();
        $user['token'] = $user->createToken('API Token')->plainTextToken;
        return $user;
    }

    /**
     * Register new user
     *
     * @param $data
     * @return object
     */
    public function register($data)
    {
        $user = UserTable::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);

        $user['token'] = $user->createToken('API Token')->plainTextToken;
        return $user;
    }

    /**
     * Get authenticated user
     *
     * @return object
     */
    public function profile()
    {
        return Auth::user();
    }

    /**
     * Update fcm token
     *
     * @return object
     */
    public function updateFcm($data)
    {
        $user = Auth::user();
        $user->update([
            'fcm_token' => $data->fcm_token,
        ]);
        return $user;
    }

}
