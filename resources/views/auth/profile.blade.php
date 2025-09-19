@extends("base")

@section('title', 'Blog')

@section('content')

<h1>Hello</h1>

<div class="flex justify-center mt-20 px-8">
    <form class="max-w-2xl" method="POST" action="{{route('edit-profile')}}">
        @csrf
        @method('PUT')
        <div class="flex flex-wrap border shadow rounded-lg p-3 dark:bg-gray-600">
            <h2 class="text-xl text-gray-600 dark:text-gray-300 pb-2">
               <strong>MON PROFILE:</strong></h2>

            <div class="flex flex-col gap-2 w-full border-gray-400">

                <div>
                    <label class="text-gray-600 dark:text-gray-400">User
                        name
                    </label>
                    <input
                        class="w-full py-3 border border-slate-200 rounded-lg px-3 focus:outline-none focus:border-slate-500 hover:shadow dark:bg-gray-600 dark:text-gray-100"
                        type="text" value="{{Auth::user()->name}}" name="name">
                </div>

                <div>
                    <label class="text-gray-600 dark:text-gray-400">Email</label>
                    <input
                        class="w-full py-3 border border-slate-200 rounded-lg px-3 focus:outline-none focus:border-slate-500 hover:shadow dark:bg-gray-600 dark:text-gray-100"
                        type="text" name="email" value="{{Auth::user()->email}}">
                </div>

                 <div>
                    <label class="text-gray-600 dark:text-gray-400">
                        Ancien mot de passe
                    </label>
                    <input
                        class="w-full py-3 border border-slate-200 rounded-lg px-3 focus:outline-none focus:border-slate-500 hover:shadow dark:bg-gray-600 dark:text-gray-100"
                        type="password" name="old-password" required>
                </div>

                 <div>
                    <label class="text-gray-600 dark:text-gray-400">
                        Nouveau mot de passe
                    </label>
                    <input
                        class="w-full py-3 border border-slate-200 rounded-lg px-3 focus:outline-none focus:border-slate-500 hover:shadow dark:bg-gray-600 dark:text-gray-100"
                        type="password" name="new-password">
                </div>

                    <div>
                    <label class="text-gray-600 dark:text-gray-400">
                       Confirmez nouveau mot de passe
                    </label>
                    <input
                        class="w-full py-3 border border-slate-200 rounded-lg px-3 focus:outline-none focus:border-slate-500 hover:shadow dark:bg-gray-600 dark:text-gray-100"
                        type="password" name="cofirm-new-password">
                </div>
               
                <div class="flex justify-end">
                    <button
                        class="py-1.5 px-3 m-1 text-center bg-violet-700 border rounded-md text-white  hover:bg-violet-500 hover:text-gray-100 dark:text-gray-200 dark:bg-violet-700"
                        type="submit">Mettre à jour</button>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection