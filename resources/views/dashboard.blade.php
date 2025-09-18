@extends("base")

@section('title', 'Dashboard')

@section('content')

<div class="p-6">
<h1 class="txt-2xl font-bold upercase">Tableau de bord</h1>

<div class="flex items-center justify-between my-4">
    <a href="{{route('articles.create')}}"
    class="py-2 px-4 bg-green-500 hover:bg-green-700 text-white rounded-md">
    Créer un article
    </a>
    <form action="{{route('logout')}}" method="POST">
    @csrf
    <button type="submit" class="py-2 px-4 bg-red-500 hover:bg-red-700 text-white rounded-md">
        Déconnexion
    </button>
</form>
</div>
</div>

<ul class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
    @foreach($articles as $article )
        <li class="border border-gray-300 p-2 my-2">
            <img src="{{asset($article->image)}}" alt="{{$article->title}}" 
            class="w-full object-cover h-auto mb-4">
            <p> {{$article->title}} </p>
            <div class="flex items-center gap-2 w-full mt-6">
                <a href="{{route('articles.edit', $article->id)}}" class="text-white bg-yellow-500 hover:bg-yellow-600 px-4 py-1
                rounded-md">Modifier</a>
                <form action="{{route('articles.destroy', $article->id)}}"
                     method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="text-white bg-red-500 hover:bg-red-600 px-4 py-1
                rounded-md">
                Suprimer
                    </button>
                </form>
            </div>
        </li>
    @endforeach
</ul>

@endsection