<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <title>Categorías</title>
</head>
<body>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Opcional</th>
                <th>Obligatorio</th>
                <th>Editado en</th>
                <th>Creado en</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($Categories as $c)
                <tr>
                    <td>{{$c->id}}</td>
                    <td>{{$c->name_optional}}</td>
                    <td>{{$c->name_required}}</td>
                    <td>{{$c->updated_at}}</td>
                    <td>{{$c->created_at}}</td>
                </tr>
            @endforeach 
        </tbody>
    </table>
    <br>
    {{$Categories->links()}}
    <br>
</body>
</html>