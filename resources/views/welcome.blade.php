<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
        <title>Laravel</title>
    </head>
    <body class="bg-gray-200 py-10">
        <div class="max-w-lg bg-white mx-auto p-5 rounded shadow">
            @if ($errors->any())
                <ul class="list-none bg-red-100 text-red-500 p-4 mb-4">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            @endif
            <form action="{{ route('tags.store') }}" method="POST" class="flex mb-4">
                @csrf
                <input type="text" name="name" placeholder="Tag name" class="rounded-l bg-gray-200 p-2 w-full">
                <input type="submit" value="Add" class="px-8 rounded-r bg-blue-500 hover:bg-blue-800 text-white cursor-pointer">
            </form>
            <h4 class="text-lg text-center mb-2">Tags list</h4>
            <table>
                @forelse ($tags as $tag)
                    <tr>
                        <td class="border px-4 py-2">{{ $tag->name }}</td>
                        <td class="border px-4 py-2">{{ $tag->slug }}</td>
                        <td class="border px-4 py-2">
                            <form action="{{ route('tags.destroy', $tag->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <input type="submit" value="Delete" class="px-4 rounded bg-red-500 hover:bg-red-800 cursor-pointer text-white">
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td>
                            <p>There are no tags</p>
                        </td>
                    </tr>
                @endforelse
            </table>
        </div>
    </body>
</html>
