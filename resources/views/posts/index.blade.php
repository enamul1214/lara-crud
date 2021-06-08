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
        <div class="md:flex">
            <div class="mb-4 md:mb-0 md:w-1/2"><h1 class="text-2xl font-bold text-gray-900">My Blog</h1></div>
            <div class="mb-4 md:mb-0 md:w-1/2">
                <div class="md:text-right mb-3">
                    <a href="/posts/create" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Create Post</a>
                </div>
            </div>
        </div>
        <?php // foreach ($posts as $post){ //dump(json_decode($post)); ?>
        @foreach ($posts as $post)            
            <article class="mb-4 p-4 shadow sm:rounded-md sm:overflow-hidden bg-indigo-300 bg-opacity-25">
                <div class="md:flex">
                    <div class="md:flex-shrink-0">
                        <div class="bg-white rounded-lg">
                            <img class="rounded-lg md:w-56" src="{{ asset('uploads/'.$post->image) }}" alt="{{$post->title}}" width="448" height="299">
                        </div>
                    </div>
                    <div class="mt-4 md:mt-0 md:ml-6">
                        <div class="uppercase tracking-wide text-2xl text-indigo-600 font-bold">{{$post->title}}</div>
                        <p class="mt-2 text-gray-600">{{$post->content}}</p>
                        @if(json_decode($post->vehicles))
                            <div class="mt-2">
                                <label class="block font-bold">Vehicles</label>
                                <ul class="list-disc list-inside">
                                    @foreach (json_decode($post->vehicles) as $vehicle)
                                        <li>I have a {{ $vehicle }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        @if ($post->gender)
                        <div class="mt-2">
                            <label class="block font-bold">Gender</label>
                            <p>{{ $post->gender }}</p>
                        </div>
                        @endif

                        @if ($post->country)
                        <div class="mt-2">
                            <label class="block font-bold">Country</label>
                            <p>{{ $post->country }}</p>
                        </div>
                        @endif
                        <hr class="my-4">
                        <div class="mb-4">
                            <label for="content" class="block font-bold text-gray-800">Comment</label>
                            <form method="POST" action="/posts">
                                @csrf
                                <input type="text" name="article_id" value="{{$post->id}}" hidden>
                                <textarea name="content" rows="3" class="py-2 px-4 shadow-sm focus:ring-green-500 focus:border-green-500 mt-1 block w-full sm:text-sm border border-gray-300 rounded-md mb-2"></textarea>
                                <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="action-wrapper flex mt-4 justify-end">
                    <a href="/posts/{{ $post->id }}/edit" class="inline-flex justify-center py-2 px-4 ml-2 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">Edit</a>
                    <form action="/posts/{{ $post->id }}" method="post">
                        @csrf
                        @method('delete')
                        <button class="inline-flex justify-center py-2 px-4 ml-2 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">Delete</button>
                    </form>
                </div>
            </article>
        @endforeach
        <?php // } ?>
    </div>
</body>
</html>