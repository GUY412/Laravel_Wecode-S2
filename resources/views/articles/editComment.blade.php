@extends('base')

@section('title', 'Create')

@section('content')

    <div class="w-full px-3 my-2">
        <textarea
            class="bg-gray-100 rounded border border-gray-400 leading-normal resize-none w-full h-20 py-2 px-3 font-medium placeholder-gray-700 focus:outline-none focus:bg-white"
            name="body" placeholder='Ajoutez un commentaire' required>{{ old('body') }}</textarea>
        <input type="hidden" name="article_id" value="{{ $article->id }}">
    </div>
    <div class=" flex justify-end px-3">
        <input type='submit' class="px-2.5 py-1.5 rounded-md text-white text-sm bg-indigo-500" value='Postez maintenant'>
    </div>

@endsection
