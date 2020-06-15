
<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="with=device-width, user-scalable=no, initial-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="ie-edge">
    <title>Cadastro de Usuário</title>
</head>
<body>

<form action="{{route('br.send')}}" method="post">
    @csrf
    <div >
        <label for=""> Nome : </label>
        <input type="text" name="nome">
        <span  data-placeholder="NAME"></span>
    </div>
    <div>
        <label for=""> Telefone : </label>
        <input type="tel" name="telefone">
    </div>
    <div >
        <label for=""> E-mail : </label>
        <input type="email" name="email">
    </div>
    <div >
        <label for=""> CPF : </label>
        <input type="number" name="cpf">
    </div>
    <div >
        <label for=""> Nome da empresa: </label>
        <input type="text" name="nome_empresa">
    </div>
    <div >
    <div >
        <label for=""> CNPJ : </label>
        <input type="number" name="cnpj">
    </div>

    <input type="submit" value="Cadastrar usuário">

</form>

</body>
</html>
