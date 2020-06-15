<!doctype html>
<html>
<head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="with=device-width, user-scalable=no, initial-scalable=no">
        <meta http-equiv="X-UA-Compatible" content="ie-edge">
        <title>Listagem de Usuários</title>
</head>
<body>
<table>
    <tr>
            <td>#ID</td>
            <td>Nome:</td>
            <td>E-mail:</td>
            <td>Ações</td>
    </tr>
    @foreach($users as $user)
        <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>
                    <a href="">Ver Usuário</a>
                    <form action="{{ route('users.destroy', ['user' => $user->id]) }}" method="post">
                        @csrf
                        @method('delete')
                        <input type="hidden" name="user" value="{{ $user->id }}">
                        <input type="submit" value="Remover">
                    </form>

                </td>
        </tr>
    @endforeach

</table>

</body>
</html>
