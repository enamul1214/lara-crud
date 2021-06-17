<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laravel Crud - Create Category</title>
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
</head>
<body>
    <div style="width: 990px" class="container max-w-full mx-auto pt-4 px-4">
        <div class="md:flex">
            <div class="mb-4 md:mb-0 md:w-1/2"><h1 class="text-2xl font-bold text-gray-900"><a href="/">My Blog</a></h1></div>
            <div class="mb-4 md:mb-0 md:w-1/2">
                <div class="md:text-right mb-3">
                    <a href="/categories" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Category List</a>
                </div>
            </div>
        </div>

        <div class="mb-4 p-4 shadow sm:rounded-md sm:overflow-hidden">
            <form method="POST" action="/categories" enctype="multipart/form-data">
                @csrf

                <div class="mb-4">
                    <label for="category_title" class="font-bold text-gray-800">Category Title:</label>
                    <input name="category_title" class="block appearance-none placeholder-gray-500 border border-emerald-400 rounded-md w-full py-2 px-4 text-gray-700 leading-5 focus:outline-none focus:ring-2 focus:ring-emerald-200" type="text">
                    @error('category_title')
                        <div class="text-red-500">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-4">
                    <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Save</button>
                    <a href="/categories" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-gray-600 hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500">Cancel</a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
