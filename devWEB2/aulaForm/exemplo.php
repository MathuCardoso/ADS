<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ENVIO DE FORMULÁRIOS</title>
</head>

<body style="display: flex; justify-content: center; align-items: center; height: 100vh;">

    <fieldset style="width: fit-content;">

        <legend>
            <h1>Formulário</h1>
        </legend>

        <form action="processa.php" method="POST">

            <input type="text" name="nome" placeholder="Informe o nome">
            <br><br>
            <input type="number" name="idade" placeholder="Informe a idade">
            <br><br>
            <button type="submit">Enviar</button>
        </form>
    </fieldset>

</body>

</html>