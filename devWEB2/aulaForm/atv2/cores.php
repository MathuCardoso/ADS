<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CORES</title>
</head>

<body style="display: flex; justify-content: center; align-items: center; height: 100vh;">

    <fieldset style="width: fit-content;">

        <legend>
            <h1>Formulário</h1>
        </legend>

        <form action="cores_exec.php" method="POST">

            <select name="cor">
                <option value="Tomato">Tomato</option>
                <option value="Orange">Orange</option>
                <option value="DodgerBlue">DodgerBlue</option>
                <option value="MediumSeaGreen">MediumSeaGreen</option>
                <option value="Gray">Gray</option>
                <option value="SlateBlue">SlateBlue</option>
                <option value="Violet">Violet</option>
                <option value="LightGray">LightGray</option>
            </select>
            <button type="submit">Enviar</button>
        </form>
    </fieldset>

</body>

</html>