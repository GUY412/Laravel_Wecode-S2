@extends("base")

@section('title', 'articles')

@section('content')

<div class="p-6">
<div class="p-4">
    <h1 class="mt-6 font-bold text-6xl upercase mb-6">{{$article->title}}</h1>
    <img src="{{asset($article->image)}}" alt="{{$article->title}}" 
    class="w-full object-cover h-auto mb-4">
    <p> {{$article->description}} </p>
    <p class="italic">Ecrit par: <strong>{{$article->autor->name}}</strong></p>
</div>
</div>
@endsection