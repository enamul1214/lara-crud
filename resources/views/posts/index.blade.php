<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laravel Crud</title>
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
</head>
<body>
    <div style="width: 990px" class="container max-w-full mx-auto pt-4 px-4">
        <h1 class="text-2xl font-bold text-gray-900">My Blog</h1>
        <div class="text-right mb-3">
            <a href="/posts/create" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Create Post</a>
        </div>
        @foreach ($posts as $post)
            <article class="mb-4 p-4 shadow sm:rounded-md sm:overflow-hidden bg-indigo-300 bg-opacity-25 hover:bg-indigo-300 hover:bg-opacity-40">
                <h2 class="text-xl font-bold text-gray-900">{{$post->title}}</h2></a>
                <p class="text-md text-gray-800">{{$post->content}}</p>

                <div class="action-wrapper flex mt-4">
                    <a href="/posts/{{ $post->id }}/edit" class="inline-flex justify-center py-2 px-4 mr-2 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">Edit</a>
                    <form action="/posts/{{ $post->id }}" method="post">
                        @csrf
                        @method('delete')
                        <button class="inline-flex justify-center py-2 px-4 mr-2 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">Delete</button>
                    </form>
                </div>
            </article>
        @endforeach
    </div>
</body>
</html>