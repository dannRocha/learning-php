<h1>Editar</h1>

<form action="/update" method="post">
    {{ csrf_field() }}
    <input type="hidden" name="id" value="{{$user['id']}}" />
    <label>Name:
        <input type="text" name="name" value="{{$user['name']}}"/>
    </label>
    <label>Last:
        <input type="text" name="last" value="{{$user['last']}}"/>
    </label>
    <button type="submit">Registrar</button>
</form>
<a href="/list">Voltar</a>
