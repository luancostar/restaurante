<?php
 
 $conexao = mysqli_connect("localhost", "root", "", "crud_produto");

if (!$conexao) {
    die("Erro na conexão: " . mysqli_connect_error());
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "SELECT * FROM produtos WHERE id = $id";
    $result = mysqli_query($conexao, $query);
    $produto = mysqli_fetch_assoc($result);
} else {
    header("Location: index.php");
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = $_POST['nome'];
    $valor = $_POST['valor'];
    $query = "UPDATE produtos SET nome = '$nome', valor = '$valor' WHERE id = $id";
    mysqli_query($conexao, $query);
    header("Location: index.php");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Editar Produto</title>
    <link href="css/style.css" rel="stylesheet">

</head>
<body class="edit-body">
<div class="content-logo">
            <img src="img/burger-logo.png" alt="">
        </div>
        <div class="head-content">
        <div style="display: flex; align-items: center; justify-content: center;">
    <h1>Editar Produto</h1> 
    <a style="margin-left: 10px;" class="delete-btn" href="index.php">Voltar</a>
        </div>
    <form action="" method="post">
        <label for="nome">Nome do Produto:</label>
        <input type="text" name="nome" value="<?php echo $produto['nome']; ?>" required>
        <label for="valor">Valor:</label>
        <input type="text" name="valor" value="<?php echo $produto['valor']; ?>" required>
        <input class="edit-btn" type="submit" value="Salvar">
    </form>
    </div>
</body>
</html>
