@extends("layouts.app")

@section("title", "Zabudnuté heslo")

@section("content")

<guest-layout>
    <auth-card>
        <slot name="logo">
            <a href="/">
                <application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </slot>

        <div class="mb-4 text-sm text-gray-600">
            {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
        </div>

        <!-- Session Status -->
        <auth-session-status class="mb-4" status="{{session('status')}}" />

        <!-- Validation Errors -->
        <auth-validation-errors class="mb-4" errors="{{$errors}}" />

        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <!-- Email Address -->
            <div>
                <label for="email">Email</label>

                <input id="email" class="block mt-1 w-full" type="email" name="email" value="{{old('email')}}" required autofocus />
            </div>

            <div class="flex items-center justify-end mt-4">
                <button>
                    {{ __('Email Password Reset Link') }}
                </button>
            </div>
        </form>
    </auth-card>
</guest-layout>

@endsection
