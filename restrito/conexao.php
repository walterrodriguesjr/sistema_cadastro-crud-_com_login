<?php

/* configurando o servidor de acesso, o usuario, a senha e o banco a ser acessado */
$server = "localhost";
$user = "root";
$pass = "";   /* sem senha de acesso */
$bd = "empresa";

/* conexão com mysql e passando como parametro os dados acima */
if ($conn = mysqli_connect($server, $user, $pass, $bd)) {   /* condicional que mostral na tela se a conexão obteve êxito */
    /* echo "Conectado"; */
} else {
    echo "Erro!";
}

function mensagem($texto, $tipo)
{
    echo "<div class='alert alert-$tipo' role='alert'>
    $texto
  </div>";
}

function mostra_data($data)
{
    $d = explode('-', $data);
    $escreve = $d[2] . "/" . $d[1] . "/" .$d[0];
    return $escreve;
}

function mover_foto($vetor_foto)
{
    $vtipo = explode("/", $vetor_foto['type']);
    $tipo = $vtipo[0];
    $extensao = "." .$vtipo[1] ?? ''; /* erro aqui, tirar o ponto de concatenação */
    if((!$vetor_foto['error']) and ($vetor_foto['size'] <= 500000) and ($tipo == "image")) {
        $nome_arquivo = date('Ymdhms') .$extensao;
        move_uploaded_file($vetor_foto['tmp_name'], "img/".$nome_arquivo);
        return $nome_arquivo;
    }else{
        return 0;
    }
}
?>
