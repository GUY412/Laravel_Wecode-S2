@extends("base")

@section('title', 'Create')

@section('content')

<div class="max-w-lg-auto mt-10">
    <form method="POST" action="{{route('articles.store')}}" class="p-8" enctype="multipart/form-data">
        @csrf
        <div class="mb-6">
            <label for="title" class="text-gray-700 block mb-2 text-sm font-medium">
                Titre de l'article
            </label>
            <input type="text" id="title" name="title" value="{{old('title')}}" class="w-full px-3 py-2 border border-gray-300 
            rounded-md shadow-md">
        </div>

          <div class="mb-6">
            <label for="description" class="text-gray-700 block mb-2 text-sm font-medium">
                Description de l'article
            </label>
            <textarea type="text" id="description" name="description" value="{{old('description')}}" class="w-full px-3 py-2 border border-gray-300 
            rounded-md shadow-md"></textarea>
        </div>

          <div class="mb-6">
            <label for="category" class="text-gray-700 block mb-2 text-sm font-medium">
                Categorie de l'article
            </label>
            <input type="text"  name="category" value="{{old('category')}}" class="w-full px-3 py-2 border border-gray-300 
            rounded-md shadow-md">
        </div>

        <div class="mb-6">
            <label for="image" class="text-gray-700 block mb-2 text-sm font-medium">
                image de l'article
            </label>
            <input type="file" id="image" name="image" class="w-full px-3 py-2">
        </div>

         <div class="mb-6">
          <button type="submit" class="w-full py-2 px-4 bg-gray-500 text-white rounded-md
          hover:bg-gray-800">
          Creer un nouvel article
          </button>
        </div>
    </form>
</div>

@endsection

