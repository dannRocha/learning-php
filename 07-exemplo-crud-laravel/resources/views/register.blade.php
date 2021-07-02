<form action="/register" method="post">
    {{ csrf_field() }}
    <label>Name:
        <input type="text" name="name" />
    </label>
    <label>Last:
        <input type="text" name="last" />
    </label>
    <button type="submit">Registrar</button>
</form>
<a href="/list">Registros</a>
