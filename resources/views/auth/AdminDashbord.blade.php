@extends('base')

@section('title', 'Inscription')

@section('content')

    <div class="mx-auto">
        <h1>User liste</h1>
    </div>
    <table class="w-full border-collapse border border-blue-500 max-w-xl mt-4 mx-auto">
        <thead>
            <tr class="bg-blue-500 text-white">
                <th class="py-2 px-4 text-left">Nom de l'utilisateur</th>
                <th class="py-2 px-4 text-left">Email</th>
                <th class="py-2 px-4 text-left">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr class="bg-white border-b border-blue-500">
                    <td class="py-2 px-4">{{ $user->name }}</td>
                    <td class="py-2 px-4">{{ $user->email }}</td>
                    <td class="py-2 px-4">
                        <form action="{{ route('users.delete', $user->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="text-white bg-red-500 hover:bg-red-600 px-4 py-1
                rounded-md">
                                Suprimer
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="mx-auto">
        <h1>article liste</h1>
    </div>
    <table class="w-full border-collapse border border-blue-500 max-w-xl mt-4 mx-auto">
        <thead>
            <tr class="bg-blue-500 text-white">
                <th class="py-2 px-4 text-left">Nom de l'article</th>
                <th class="py-2 px-4 text-left">idcategorie de l'article</th>
                <th class="py-2 px-4 text-left">Description de l'article</th>
                <th class="py-2 px-4 text-left">aperçu de l'article</th>
                <th class="py-2 px-4 text-left">Action</th>

            </tr>
        </thead>
        <tbody>
            @foreach ($articles as $article)
                <tr class="bg-white border-b border-blue-500">
                    <td class="py-2 px-4">{{ $article->title }}</td>
                    <td class="py-2 px-4">{{ $article->category_id }}</td>
                    <td class="py-2 px-4">{{ $article->description }}</td>
                    <td><img src="{{ asset($article->image) }}" alt="{{ $article->title }}" width="50" height="50">
                    </td>
                    <td class="py-2 px-4">
                        <form action="{{ route('articles.destroy', $article->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="text-white bg-red-500 hover:bg-red-600 px-4 py-1
                rounded-md">
                                Suprimer
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

@endsection