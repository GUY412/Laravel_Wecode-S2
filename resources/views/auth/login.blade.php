@extends('base')

@section('title', 'Se connecter')

@section('content')

    <div class="max-w-lg mx-auto p-6 bg-white rounded-md shadow-md mt-6">
        @if ($errors->any())
            <div class="bg-red-100 text-green-500 border-red-500 px-4 py-3 rounded relative " role="alert">
                <p class="font-bold">Errors !</p>
                <span class="text-sm">{{ $errors->first() }}</span>
            </div>
        @endif
        <form action="{{ route('login.submit') }}" class="mt-4" method="POST">
            @csrf

            <div class="m-4">
                <label for="email" class="block" text-sm font-medium text-gray-700>E-mail :</label>
                <input type="email" id="email" name="email"
                    class="mt-1 p-3 block w-full border border-gray-300 rounded-md shadow-md">
                @error('email')
                    <p class="bg-red-100 text-red-500 p-3 font-bold">{{ $message }}</p>
                @enderror
            </div>

            <div class="m-4">
                <label for="password" class="block" text-sm font-medium text-gray-700>Mot de passe :</label>
                <input type="password" id="password" name="password"
                    class="mt-1 p-3 block w-full border border-gray-300 rounded-md shadow-md">
                @error('password')
                    <p class="bg-red-100 text-red-500 p-3 font-bold">{{ $message }}</p>
                @enderror
            </div>

            <button type="submit" class="w-full py-2 px-4 bg-gray-500 hover:bg-gray-900 text-white rounded-md">Se
                connecter</button>

            <p class="my-2">Deja un compte ?<a href="{{ route('register') }}" class="text-blue-500">S'inscrire</a></p>
        </form>
    </div>
@endsection
