@extends('layouts.auth')

@section('content')
<div class="justify-center items-center w-full card lg:flex max-w-md ">

    <div class="w-full card-body">
        <a href="../" class="py-4 block">
            <img src="../assets/images/logos/logo-light.svg" alt="" class="mx-auto" />
        </a>
        <p class="mb-4 text-gray-400 text-sm text-center">SMK Assalaam Bandung</p>

        <!-- FORM LOGIN -->
        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Email -->
            <div class="mb-4">
                <label for="email" class="block text-sm mb-2 text-gray-400">Email</label>
                <input type="email" id="email" name="email" value="{{ old('email') }}"
                    class="py-3 px-4 block w-full border-gray-200 rounded-sm text-sm focus:border-blue-600 focus:ring-0 @error('email') border-red-500 @enderror"
                    required autofocus>

                @error('email')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Password -->
            <div class="mb-6">
                <label for="password" class="block text-sm mb-2 text-gray-400">Password</label>
                <input type="password" id="password" name="password"
                    class="py-3 px-4 block w-full border-gray-200 rounded-sm text-sm focus:border-blue-600 focus:ring-0 @error('password') border-red-500 @enderror"
                    required>

                @error('password')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Remember me & Forgot password -->
            <div class="flex justify-between mb-4">
                <div class="flex items-center">
                    <input type="checkbox" name="remember" id="remember"
                        class="shrink-0 mt-0.5 border-gray-200 rounded-[4px] text-blue-600 focus:ring-blue-500"
                        {{ old('remember') ? 'checked' : '' }}>
                    <label for="remember" class="text-sm text-gray-500 ms-2">Remember this device</label>
                </div>
                @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}"
                        class="text-sm font-semibold text-blue-600 hover:text-blue-700">Forgot Password?</a>
                @endif
            </div>

            <!-- Tombol Login -->
            <div class="grid my-6">
                <button type="submit"
                    class="btn py-[10px] text-base text-white font-medium bg-blue-600 hover:bg-blue-700">Sign In</button>
            </div>
            
        </form>
    </div>

</div>
@endsection
