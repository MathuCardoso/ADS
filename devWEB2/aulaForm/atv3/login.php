<?php
$msg = "";
$validated = false;

if (isset($_POST['sub'])) {

    $login = isset($_POST['login']) ? $_POST['login'] : '';
    $senha = isset($_POST['senha']) ? $_POST['senha'] : '';

    if ($login == "ifpr" && $senha == "tads") {
        $validated = true;
        $msg = "Bem-vindo ao TADS";
    } else {
        $msg = "Login ou senha incorreto";
    }
}

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOGIN</title>
</head>

<body style="display: flex; justify-content: center; align-items: center; height: 100vh;">

    <fieldset style="width: fit-content;" <?php
                                            if ($validated == true)
                                                echo "hidden";
                                            ?>>

        <legend>
            <h1>Formulário</h1>
        </legend>

        <form action="" method="POST">

            <label for="login">Login</label>
            <br>
            <input id="login" name="login" type="text" placeholder="Informe o Login">

            <br><br>

            <label for="senha">Senha</label>
            <br>
            <input id="senha" name="senha" type="password" placeholder="Informe a Senha">
            <input name="sub" value="1" hidden>
            <br><br>
            <button type="submit">Enviar</button>
        </form>

    </fieldset>
    <br>
    <?php if ($msg != NULL): ?>
        <div>
            <h1><?= $msg ?></h1>
        </div>

    <?php endif; ?>

</body>

</html>