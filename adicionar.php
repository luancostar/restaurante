<?php

$conexao = mysqli_connect("localhost", "root", "", "crud_produto");

if (!$conexao) {
    die("Erro na conexão: " . mysqli_connect_error());
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = $_POST['nome'];
    $valor = $_POST['valor'];
    $query = "INSERT INTO produtos (nome, valor) VALUES ('$nome', '$valor')";
    mysqli_query($conexao, $query);
    header("Location: index.php");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Adicionar Produto</title>
</head>
<body>
    <h1>Adicionar Produto</h1>
    <form action="" method="post">
        <label for="nome">Nome do Produto:</label>
        <input type="text" name="nome" required>
        <label for="valor">Valor:</label>
        <input type="text" name="valor" required>
        <input type="submit" value="Adicionar">
    </form>
</body>
</html>
