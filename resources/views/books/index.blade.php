<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>List of books</title>
</head>
<body>
    <ul>
        @foreach ($books as $book)
            <li>
                <a href="{{route("books.show", $book->id)}}">
                    {{$book->title}}
                </a>
            </li>
        @endforeach

    </ul>
</body>
</html>
