<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="with=device-width, user-scalable=no, initial-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="ie-edge">
    <title>Editar Contato</title>
</head>
<body>
<form action="{{route('br.edit', ['contact' => $contact->result->ID])}}" method="post">

    @csrf
    <label for=""> Nome do contato: </label>
    <input type="text" name="nome" value="{{ $contact->result->NAME }}">


    <input type="submit" value="Editar usuário">

</form>

</body>
</html>
