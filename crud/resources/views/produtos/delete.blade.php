<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Excluir um produto</title>
</head>
<body>
    <form action="{{ route('excluir_produto',['id' => $produto->id])}}" method="POST">
        @csrf
        <label for="">Tem certeza que deseja excluir este produto?</label> <br />
        <input type="text" name="nome" value="{{ $produto->nome }}"> <br/>
        <button>Sim</button>
    </form>
</body>
</html>