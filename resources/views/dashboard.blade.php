@extends("base")

@section('title', 'Dashboard')

@section('content')

<div class="p-6">
<h1 class="txt-2xl font-bold upercase">Tableau de bord</h1>

<div class="flex items-center justify-between my-4">
    <a href="{{route('articles.create')}}"
    class="py-2 px-4 bg-blue-500 hover:bg-green-700 text-white rounded-md">
    Créer un article
    </a>
    <div class="p-6">
    <form action="{{route('logout')}}" method="POST">
    @csrf
    <button type="submit" class="py-2 px-4 bg-red-500 hover:bg-red-700 text-white rounded-md">
        Déconnexion
    </button>
</form>
</div>
  <div class="p-6">
    @csrf
    <a class="py-2 px-4 bg-gray-500 hover:bg-gray-700 text-white rounded-md"
    href="{{route('profile')}}">
        Profile
  </a>
</div>
</div>

@if (session('success'))
    <div class="bg-green-100 text-green-500 p-3">
        {{session('success')}}
    </div>
    @elseif (session('update'))
    <div class="bg-blue-100 text-blue-500 p-3">
        {{session('success')}}
    </div>
      @elseif (session('delete'))
    <div class="bg-red-100 text-red-500 p-3">
        {{session('success')}}
    </div>
@endif


<ul class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
    @foreach($articles as $article )
    @if ($article->autor_id == Auth::id())
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
                <a href="{{route('articles.show',$article->id)}}" class="text-white bg-blue-500 hover:bg-blue-800 px-4
            py-1 rounded-md">Lire l'article</a>
        </li>
            </div>
        </li>
        @endif
    @endforeach
</ul>
</div>

@endsection