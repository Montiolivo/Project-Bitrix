<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="with=device-width, user-scalable=no, initial-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="ie-edge">
    <title>Editar Empresa</title>
</head>
<body>
<form action="{{route('br.editCompany', ['company' => $company->result->ID])}}" method="post">

    @csrf
    <label for=""> Nome da Empresa: </label>
    <input type="text" name="nome" value="{{ $company->result->TITLE }}">


    <input type="submit" value="Editar usuário">

</form>

</body>
</html>
