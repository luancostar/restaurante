<?php
// excluir.php

// Inclua seu código de conexão ao banco de dados aqui
$conexao = mysqli_connect("localhost", "root", "", "crud_produto");

if (!$conexao) {
    die("Erro na conexão: " . mysqli_connect_error());
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "DELETE FROM produtos WHERE id = $id";
    mysqli_query($conexao, $query);
}

header("Location: index.php");
?>
