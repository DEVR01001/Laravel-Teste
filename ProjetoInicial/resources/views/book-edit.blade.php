<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ config('app.name')}}</title>
</head>
<body>


    <form method='POST' action="{{route('books.update', ['book' => $book->id])}}">

        @csrf 
        @method('PUT')

        
        <label for="">Titulo</label>
        <input name='title' type="text" value="{{old('title', $book->title)}}">
        <label for="">Descrição</label>
        <textarea name="description" id="" cols="30" rows="10">{{old('description', $book->description)}}</textarea>
        <label for="">Autor</label>
        <input name='author' type="text" value="{{old('author', $book->author)}}">

        <button type='submit'>Enviar</button>
    </form>

</body>
</html>