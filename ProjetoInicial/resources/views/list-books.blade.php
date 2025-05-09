<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">

    <title>{{config('app.name')}}</title>
</head>
<body>

    <table class="table table-striped">
        <tr>
            <th>
                Id
            </th>
            <th>
                Titulo
            </th>
            <th>
                Descrição
            </th>
            <th>
                Autor
            </th>
            <th>
                Categorias
            </th>
            <th>
                Visualizar
            </th>
            <th>
                Ações
            </th>
        </tr>
            @foreach ($books as $book)
                <tr>
                    <td>
                        {{$book->id}}

                    </td>
                    <td>
                        {{$book->title}}

                    </td>
                    <td>
                        {{$book->description}}

                    </td>
                    <td>
                        {{ $book->author->nome ?? '' }}
                    </td>
                    <td>
                        @foreach ($book->category as $category)
                            {{$category->nome}}
                        @endforeach
                    </td>
                    
                    <td>
                        <a href="">Ver</a>
                    </td>
                    <td>
                        <a href="{{route('books.edit', [$book->id])}}">Editar</a>
                        <form action="">
                            <button>Excluir</button>
                        </form>
                    </td>

                </tr>
                
                    
            @endforeach
            

    </table>

    {{$books->links('Partials.pagination')}}

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
    
</body>
</html>