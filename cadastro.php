<?php
     
    $nome = $_POST["nome"];
    $sobrenome = $_POST["sobrenome"];
    $email = trim($_POST["email"]);
    $senha = $_POST["senha"];
    $nascimento = $_POST["nascimento"];
    $resposta["status"] = "";
    $resposta["mensagem"] = "";

    $data_nasc = new DateTime($nascimento);
    $data_atual = new DateTime();
    $idade = $data_atual->diff($data_nasc)->y;

    if (empty($nome) || empty($sobrenome) || empty($email) || empty($senha) || empty($nascimento)) {
        $resposta["status"] = "ERRO";
        $resposta["mensagem"] = "Preencha todos os campos.";
    }
    elseif (strlen($senha) < 10) {
        $resposta["status"] = "ERRO";
        $resposta["mensagem"] = "Deve gravar uma senha forte.";
    }
    elseif ($idade < 18) {
        $resposta["status"] = "ERRO";
        $resposta["mensagem"] = "Usuário deve ter mais do que 18 anos.";
    }
    elseif (!preg_match('/(@pucpr\.br|@pucpr\.edu\.br)$/', $email)) {
        $resposta["status"] = "ERRO";
        $resposta["mensagem"] = "Somente é permitido cadastrar um e-mail institucional da PUCPR";
    }
    else {
        $resposta["status"] = "OK";
        $resposta["mensagem"] = "Gravado com sucesso.";
    }

    echo (json_encode(($resposta)));
?>