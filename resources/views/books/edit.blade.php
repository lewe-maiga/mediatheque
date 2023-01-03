<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Create Book</title>
    @vite('resources/js/books/create.tsx')
</head>
<body class="p-8 h-screen relative">
    <form autocomplete="off" class="flex flex-col w-full absolute top-2/3 left-1/2 -translate-x-1/2 -translate-y-1/2 p-8 sm:max-w-[600px] gap-6 border rounded" action="{{route("books.update", $book->id)}}" method="POST">
            <legend class="border-b pb-4 mb-4 text-green-800 font-semibold text-xl border-green-800">Modifier un livre</legend>
            @csrf
            @method("PUT")
            <div class="flex flex-col sm:flex-row w-full gap-4">
                <div class="flex flex-col w-full">
                    <label for="title" class="mb-2">Titre</label>
                    <input placeholder="ex: Harry Potter" class="w-full rounded border border-gray-300 py-2 px-4" type="text" name="title" id="title" value="{{$book->title}}" required />
                </div>
                <div class="flex flex-col w-full gap">
                    <label for="address" class="mb-2">Adresse</label>
                    <input class="w-full rounded border border-gray-300 py-2 px-4" type="text" name="address" id="address" placeholder="ex: D1" value="{{$book->address}}" required /></div>
            </div>
            <div class="w-full flex flex-col">
                <label for="category" class="mb-2">Categorie</label>
                <input class="w-full rounded border border-gray-300" type="text" name="category" id="category" placeholder="ex: Roman" value ="{{$book->category}}" required />
            </div>
                
            <div class="w-full flex flex-col">
                <label for="summary" class="mb-2">Resumé</label>
                <textarea placeholder="ex: inspiré de l'histoire de ..."class="w-full h-52 rounded border border-gray-300 p-4" type="text" name="summary" id="summary"  required>{{$book->summary}}</textarea>
            </div>

            <div class="flex items-center">
                <label class="w-max" for="special">Livre special</label>
                <input {{$book->special ? "checked": ""}} type="checkbox" name="special" id="special" class="rounded ml-2">
            </div>
            
            <div class="w-full flex flex-col">
                <label for="author" class="mb-2">Auteur</label>
                <div id="autocomplete" class="w-full relative inline-block" data-authors="{{json_encode($authors)}}">
                    <input placeholder="ex: Napoleon Hill" id="author" name="author" class="w-full rounded border border-gray-300 py-2 px-4" value ="{{$book->author->name}}" required>
                </div>
            </div>
                
            @if (!$book->microfilm_id)
                <div class="microfilms"></div>
            @else
            <label class="mb-2" for="duration">
                Durée (en minute)
            </label>
            <input
                id="duration"
                name="duration"
                placeholder="ex: 180"
                type="number"
                value="{{$book->microfilm->duration}}"
                required
                class="w-full rounded border border-gray-300 py-2 px-4"
            />
            @endif
            
            <button class="w-full bg-green-800 rounded text-white hover:bg-green-900 flex items-center justify-center p-2">
                <span class="uppercase font-semibold text-sm">
                    Envoyer
                </span>
                <svg width="32" height="32" viewBox="0 0 16 16"><path fill="currentColor" d="M1.724 1.053a.5.5 0 0 0-.714.545l1.403 4.85a.5.5 0 0 0 .397.354l5.69.953c.268.053.268.437 0 .49l-5.69.953a.5.5 0 0 0-.397.354l-1.403 4.85a.5.5 0 0 0 .714.545l13-6.5a.5.5 0 0 0 0-.894l-13-6.5Z"/>
                    
                </svg>
            </button>
    </form>
</body>
</html>