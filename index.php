<?php
$conexao = mysqli_connect("localhost", "root", "", "crud_produto");

if (!$conexao) {
    die("Erro na conexão: " . mysqli_connect_error());
}

 $query = "SELECT * FROM produtos";
$result = mysqli_query($conexao, $query);
?>

<!DOCTYPE html>
<html>
<head>
    <title>TAKE AWAY BURGER - ESTOQUE</title>
    <link href="css/style.css" rel="stylesheet">
</head>
<body>
<div class="content-logo">
            <img src="img/burger-logo.png" alt="">
        </div>
    <div class="container">
      
        <div class="head-content">
    <h1>Estoque de Produtos:</h1>
    <h2>Adicionar Produto</h2>
    
    <form action="adicionar.php" method="post">
        <label for="nome">Nome do Produto:</label>
        <input type="text" name="nome" required>
        <label for="valor">Valor:</label>
        <input type="number" name="valor" required>
        <input class="add-btn" type="submit" value="Adicionar">
    </form>
    <div class="content-table">
    <table>
        <tr>
            <th>ID</th>
            <th>Nome do Produto</th>
            <th>Valor</th>
            <th>Ações</th>
        </tr>
        <?php while ($row = mysqli_fetch_assoc($result)) { ?>
            <tr>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo $row['nome']; ?></td>
                <td>R$ <?php echo $row['valor']; ?></td>
                <td>
                    <a class="edit-btn" href="editar.php?id=<?php echo $row['id']; ?>">Editar</a>
                    <a class="delete-btn" href="excluir.php?id=<?php echo $row['id']; ?>">Excluir</a>
                </td>
            </tr>
        <?php } ?>
    </table>
    </div>
    </div>
    </div>
</body>
</html>
