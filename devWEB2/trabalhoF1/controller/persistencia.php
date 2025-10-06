<?php
define("BASE_URL", "/MyProjects/tads/devWEB2/trabalhof1");
define("DIR_ARQUIVO", __DIR__ . "/../arquivos/");
define("DIR_ARQUIVOS_LOGOS", __DIR__ . '/../arquivos/imgs/');


function salvarDados($array, $arquivo)
{
    $json = json_encode($array, JSON_PRETTY_PRINT);

    file_put_contents(DIR_ARQUIVO . $arquivo, $json);
    header('location: ../view/equipes.php');
}

function buscarDados($path)
{

    if (file_exists($path)) {
        $json = file_get_contents($path);
        $dados = json_decode($json, true);


        return $dados;
    }
}

function salvarArquivo($nome, $arquivo, $tipo)
{
    $arquivoLogo = explode('.', $arquivo['name']);
    $arquivoExtensao = $arquivoLogo[count($arquivoLogo) - 1];

    $nomeArquivoSalvar = "{$nome}{$tipo}.{$arquivoExtensao}";
    $nomeArquivoSalvar = str_replace(" ", "", $nomeArquivoSalvar);

    if (move_uploaded_file($arquivo["tmp_name"], DIR_ARQUIVOS_LOGOS . $nomeArquivoSalvar)) {
        return $nomeArquivoSalvar;
    } else {
        return null;
    }
}
