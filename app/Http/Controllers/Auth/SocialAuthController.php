<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class SocialAuthController extends Controller
{
    public function index()
    {
        return view('auth.social-auth');
    }

    public function googleRedirect()
    {
        return Socialite::driver('google')->redirect();
    }

    public function googleCallback()
    {
        $user = Socialite::driver('google')->user();
        $this->createOrUpdateUser($user, 'google');
        return redirect()->route('dashboard');
    }

    public function naverRedirect()
    {
        return Socialite::driver('naver')->redirect();
    }

    public function naverCallback()
    {
        $user = Socialite::driver('naver')->user();
        $this->createOrUpdateUser($user, 'naver');
        return redirect()->route('dashboard');
    }

    private function createOrUpdateUser($data, $provider)
    {
        $user = User::where('email', $data->email)->first();

        if ($provider == "google") {
            if ($user) {
                $user->update([
                   'provider' => $provider,
                   'provider_id' => $data->id,
                   'avatar' => $data->avatar,
                ]);
            } else {
                $user=User::create([
                    'name' => $data->name,
                    'email' => $data->email,
                    'provider' => $provider,
                    'provider_id' => $data->id,
                    'avatar' => $data->avatar,
                ]);
            }
        } else if ($provider == "naver") {
            if ($user) {
                $user->update([
                   'name' => $data->name,
                    'email' => $data->email,
                    'provider' => $provider,
                    'provider_id' => $data->id,
                    'avatar' => $data->avatar,
                    'nickname' => $data->user['response']['nickname'],
                    'age' => $data->user['response']['age'],
                    'gender' => $data->user['response']['gender'],
                    'mobile' => $data->user['response']['mobile'],
                    'profile_image' => $data->user['response']['profile_image'],
                ]);
            } else {
                $user=User::create([
                    'name' => $data->name,
                    'email' => $data->email,
                    'provider' => $provider,
                    'provider_id' => $data->id,
                    'avatar' => $data->avatar,
                    'nickname' => $data->user['response']['nickname'],
                    'age' => $data->user['response']['age'],
                    'gender' => $data->user['response']['gender'],
                    'mobile' => $data->user['response']['mobile'],
                    'profile_image' => $data->user['response']['profile_image'],
                ]);
            }
        }


        Auth::login($user);
    }
}
