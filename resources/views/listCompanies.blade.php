<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="with=device-width, user-scalable=no, initial-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="ie-edge">
    <title>Listagem das empresas</title>
</head>
<body>
<table>
    <tr>
        <td>Nome da empresa: </td>

    </tr>

    @foreach($company->result  as $company)
        <tr>
            <td>{{ $company->TITLE }}</td>


            <td>
                <form action="{{ route('br.formEditCompany', ['company' => $company->ID]) }}" method="post">
                    @csrf
                    <input type="hidden" name="company" value="{{$company->ID}}">
                    <input type="submit" value="Editar">
                </form>
                <form action="{{ route('br.deleteCompany', ['company' => $company->ID]) }}" method="post">
                    @csrf

                    <input type="hidden" name="company" value="{{$company->ID}}">
                    <input type="submit" value="Remover">
                </form>

            </td>
        </tr>
    @endforeach

</table>

</body>
</html>
