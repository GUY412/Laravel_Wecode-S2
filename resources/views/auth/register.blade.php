@extends('base')

@section('title', 'Inscription')

@section('content')

    <div class="max-w-lg mx-auto p-6 bg-white rounded-md shadow-md mt-6">
        @if (session('success'))
            <div class="bg-green-100 text-green-500 border-green-500 px-4 py-3 rounded relative">
                <p class="font-bold">Inscription réussie !</p>
                <p class="text-sm">{{ session('success') }}</p>
            </div>
        @endif
        <form action="{{ route('registration.register') }}" class="mt-4" method="POST">
            @csrf
            <div class="m-4">
                <label for="name" class="block" text-sm font-medium text-gray-700>Nom :</label>
                <input type="text" id="name" name="name"
                    class="mt-1 p-3 block w-full border border-gray-300 rounded-md shadow-md">
                @error('name')
                    <p class="bg-red-100 text-red-500 p-3 font-bold">{{ $message }}</p>
                @enderror
            </div>

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

            <div class="m-4">
                <label for="password_confirmation" class="block" text-sm font-medium text-gray-700>Confirmez le mot de
                    passe :</label>
                <input type="password" id="password_confirmation" name="password_confirmation"
                    class="mt-1 p-3 block w-full border border-gray-300 rounded-md shadow-md">
            </div>

            <button type="submit"
                class="w-full py-2 px-4 bg-gray-500 hover:bg-gray-900 text-white rounded-md">S'inscrire</button>

            <p class="my-2">Deja un compte ?<a href="{{ route('login') }}" class="text-blue-500"> Se connecter</a></p>
        </form>
    </div>
@endsection
