<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\Http;

class Turnstile implements Rule
{
    public function passes($attribute, $value)
    {
        $response = Http::post('https://challenges.cloudflare.com/turnstile/v0/siteverify', [
            'secret' => config('services.cloudflare.turnstile.secret_key'),
            'response' => $value,
            'ip' => request()->ip(),
        ]);

        return $response->json('success');
    }

    public function message()
    {
        return 'The CAPTCHA verification failed. Please try again.';
    }
}