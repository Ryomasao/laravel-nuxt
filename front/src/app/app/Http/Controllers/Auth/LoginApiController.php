<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Socialite;
use App\User;

class LoginApiController extends Controller
{
    private $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

     /**
     * GitHubの認証ページヘユーザーをリダイレクト
     *
     * @return \Illuminate\Http\Response
     */
    public function redirectToProvider()
    {
        return [
            'url' => Socialite::driver('github')->stateless()->redirect()->getTargetUrl(),
        ];
    }

    /**
     * GitHubからユーザー情報を取得
     *
     * @return \Illuminate\Http\Response
     */
    public function handleProviderCallback()
    {
        $user = Socialite::driver('github')->stateless()->user();
        $user = $this->findOrCreateUser($user->nickname, $user->email);
        $token = \JWTAuth::fromUser($user);
        return [
            'token' => $token
        ];
    }

    private function findOrCreateUser(string $name, string $email)
    {
        if($user = $this->user->where('email', $email)->first()){
            return $user;
        }

        return $this->user->create([
            'name' => $name,
            'email' => $email,
            'password' => 'hoge',
        ]);
    }
}
