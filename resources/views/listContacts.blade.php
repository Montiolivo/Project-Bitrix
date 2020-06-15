<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="with=device-width, user-scalable=no, initial-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="ie-edge">
    <title>Listagem de Contatos</title>
</head>
<body>
<table>
    <tr>
        <td>Nome Contato: </td>

    </tr>

    @foreach($contact->result  as $contact)
        <tr>
            <td>{{ $contact->NAME }}</td>




            <td>
                <form action="{{ route('br.formEditContact', ['contact' => $contact->ID]) }}" method="post">
                    @csrf
                    <input type="hidden" name="contact" value="{{$contact->ID}}">
                    <input type="submit" value="Editar">
                </form>
                <form action="{{ route('br.delete', ['contact' => $contact->ID]) }}" method="post">
                    @csrf

                    <input type="hidden" name="contact" value="{{$contact->ID}}">
                    <input type="submit" value="Remover">
                </form>

            </td>
        </tr>
    @endforeach

</table>

</body>
</html>
