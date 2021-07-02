

<h1>Registros</h1>
<table>
    <thead>
        <tr>
            <td>Nome</td>
            <td>SobreNome</td>
            <td>Modificar</td>
        </tr>
    </thead>
    <tbody>
        @foreach ($list as $item)
            <tr>
                <td style='border: 1px solid #000'>{{ $item['name'] }}</td>
                <td style='border: 1px solid #000'>{{ $item['last'] }}</td>
                <td style='border: 1px solid #000'>
                    <a href='/edit/{{$item["id"]}}'>editar</a> |
                    <a href='/delete/{{$item["id"]}}'>deletar</a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

<a href="/">Registrar</a>

