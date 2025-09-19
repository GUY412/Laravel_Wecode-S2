@extends("base")

@section('title', 'articles')

@section('content')



<div class="p-6">
<div class="p-4">
    <h1 class="mt-6 font-bold text-6xl upercase mb-6">{{$article->title}}</h1>
    <img src="{{asset($article->image)}}" alt="{{$article->title}}" 
    class="w-full object-cover h-auto mb-4">
    <p> {{$article->description}} </p>
    <p class="italic">CREER par: <strong>{{$article->autor->name}}</strong></p>
</div>
</div>
<div class=" bg-white rounded-lg border p-2 my-4 mx-6">
        <h3 class="font-bold">Discussion</h3>
       
            
            <div class="flex flex-col">
                 @foreach ($article->comments()->latest()->get() as $comment)
                <div class="border rounded-md p-3 ml-3 my-3">
                    <div class="flex gap-3 items-center">
                        <h3 class="font-bold">
                            {{$comment->user->name}}
                        </h3>
                        {{$comment->created_at->diffForHumans()}}
                    </div>
                    <p class="text-gray-600 mt-2">
                        {{$comment->body}}
                    </p>
                </div>
                <form action="{{route('comment.delete', $comment->id)}}"
                     method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="text-white bg-red-500 hover:bg-red-600 px-4 py-1
                rounded-md">
                Suprimer
                    </button>
                </form>
                @endforeach
            </div>
             <form action="{{route ("commentaire",$article->id)}}" method="POST">
            @csrf
            <div class="w-full px-3 my-2">
                <textarea
                    class="bg-gray-100 rounded border border-gray-400 leading-normal resize-none w-full h-20 py-2 px-3 font-medium placeholder-gray-700 focus:outline-none focus:bg-white"
                    name="body" placeholder='Ajoutez un commentaire' required>{{old('body')}}</textarea>
                <input type="hidden" name="article_id" value="{{$article->id}}">
            </div>
            <div class=" flex justify-end px-3">
                <input type='submit' class="px-2.5 py-1.5 rounded-md text-white text-sm bg-indigo-500" value='Postez maintenant'>
            </div>
        </form>
    </div>
@endsection

