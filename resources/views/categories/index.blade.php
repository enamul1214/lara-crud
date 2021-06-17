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
            <div class="mb-4 md:mb-0 md:w-1/2"><h1 class="text-2xl font-bold text-gray-900"><a href="/">My Blog</a></h1></div>
            <div class="mb-4 md:mb-0 md:w-1/2">
                <div class="md:text-right mb-3">
                    <a href="/categories/create" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Create Category</a>
                </div>
            </div>
        </div>

        <div class="text-gray-900 bg-gray-200">
            <div class="p-4 flex">
                <h1 class="text-3xl">
                    All Categories
                </h1>
            </div>
            <div class="px-3 py-4 flex justify-center">
                <table class="w-full text-md bg-white shadow-md rounded mb-4">
                    <tbody>
                        <tr class="border-b">
                            <th class="w-3 text-left p-3 px-5">ID</th>
                            <th class="text-left p-3 px-5">Category Name</th>
                            <th class="text-left p-3 px-5">Created Date</th>
                            <th class="w-10 text-center p-3 px-5">Action</th>
                        </tr>
                        @foreach ($categories as $number=>$category)
                            <tr class="border-b hover:bg-orange-100 <?php if(($number % 2) == '0'){ echo 'bg-gray-100'; }else{echo ''; } ?> ">
                                <td class="p-3 px-5">{{ $number+1 }}</td>
                                <td class="p-3 px-5">{{ $category->category_title }}</td>
                                <td class="p-3 px-5">{{ $category->created_at->diffForHumans() }}</td>
                                <td class="p-3 px-5 flex justify-end">
                                    <a href="/categories/{{ $category->id }}/edit/" class="mr-3 text-sm bg-blue-500 hover:bg-blue-700 text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline">Edit</a>
                                    <form action="/categories/{{ $category->id }}" method="post">
                                        @csrf
                                        @method('delete')
                                        <button class="text-sm bg-red-500 hover:bg-red-700 text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>
