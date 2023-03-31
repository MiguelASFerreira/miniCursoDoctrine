<?php

require_once "./config.php";
require_once "./src/PessoaFisica.php";
require_once "./src/PessoaFisicaController.php";

$pessoaFisicaController = new PessoaFisicaController($entityManager);

// echo "Ainda não fez post";
if ($_POST) {
    $pessoaFisicaController->create(
        $_POST["nome"], 
        $_POST["cpf"], 
        $_POST["dataNascimento"]
);

$pessoas = $pessoaFisicaController->list();
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Pessoa</title>
    <style>
        body {
  background-color: #f6f8fa;
  color: #24292e;
  font-family: -apple-system,BlinkMacSystemFont,Segoe UI,Helvetica,Arial,sans-serif,Apple Color Emoji,Segoe UI Emoji;
}

h2 {
  color: #0366d6;
}

form {
  border: 1px solid #e1e4e8;
  padding: 16px;
  background-color: #fff;
}

label {
  display: block;
  margin-bottom: 8px;
  color: #24292e;
}

input[type="text"], input[type="date"], input[type="submit"] {
  border: 1px solid #e1e4e8;
  padding: 8px;
  border-radius: 6px;
  margin-bottom: 16px;
  width: 100%;
}

input[type="submit"] {
  background-color: #28a745;
  color: #fff;
  cursor: pointer;
}

table {
  border-collapse: collapse;
  margin-top: 16px;
  width: 100%;
}

th {
  background-color: #f6f8fa;
  border: 1px solid #e1e4e8;
  padding: 8px;
  text-align: left;
}

td {
  border: 1px solid #e1e4e8;
  padding: 8px;
}

    </style>
</head>
<body>
    <h2>Cadastro</h2>

    <form method="post">
        <Label for="nome">Nome</Label>
        <input type="text" name="nome">
        <Label for="cpf">CPF</Label>
        <input type="text" name="cpf">
        <label for="dataNascimento">Data de Nascimento</label>
        <input type="date" name="dataNascimento" id="">
        <input type="submit">
    </form>
    <h2>Consulta</h2>
    <table>
        <tr>
            <th>Id</th>
            <th>Nome</th>
            <th>CPF</th>
            <th>Data de Nascimento</th>
        </tr>
        <?php foreach($pessoas as $pessoa): ?>
            <tbody>
            <tr>
                <td><?=$pessoa->getId() ?></td>
           
                <td><?=$pessoa->getNome() ?></td>
            
                <td><?=$pessoa->getCpf() ?></td>
            
                <td><?=$pessoa->getDataNascimento()->format("d/m/Y") ?></td>
            </tr>
        </tbody>
        <?php  endforeach ?>
    </table>

</body>
</html>