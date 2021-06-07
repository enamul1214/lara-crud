<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laravel Crud - edit</title>
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
</head>
<body>
    <div style="width: 990px" class="container max-w-full mx-auto pt-4 px-4">
        <div class="text-right mb-3">
            <a href="/posts" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Post List</a>
        </div>
        <form method="POST" action="/posts/{{ $post->id }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf

            <div class="mb-4 p-4 shadow sm:rounded-md sm:overflow-hidden">
                <div class="mb-4">
                    <label for="title" class="font-bold text-gray-800">Title:</label>
                    <input name="title" class="block appearance-none placeholder-gray-500 border border-emerald-400 rounded-md w-full py-2 px-4 text-gray-700 leading-5 focus:outline-none focus:ring-2 focus:ring-emerald-200" value="{{ $post->title }}" type="text">
                </div>
                <div class="mb-4">
                    <label for="title" class="font-bold text-gray-800">Content:</label>
                    <textarea name="content" rows="3" class="py-2 px-4 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 mt-1 block w-full sm:text-sm border border-gray-300 rounded-md">{{ $post->content }}</textarea>
                </div>
                <div class="mb-4">
                    <label for="title" class="block font-bold text-gray-800">Image</label>
                    <input type="file" name="image">
                    <input type="hidden" name="old_image" value="{{ $post->image }}">
                    <img class="mt-3" src="{{ asset('uploads/'.$post->image) }}" alt="{{$post->title}}">
                </div>
                <div class="mb-4">
                    <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Update</button>
                    <a href="/posts" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-gray-600 hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500">Cancel</a>
                </div>
            </div>
        </form>
    </div>
</body>
</html>