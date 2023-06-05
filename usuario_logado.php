<?php
    include('conexao.php');
    include('protecao.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <p>Bem vindo ao Painel, <?php echo $_SESSION['nome']; ?></p>
    <p>
        <button>
            <a href="inicial.php?p=cadastrar">Consultar Usuarios</a>
        </button>
    </p>
    <p>
            <a href="logout.php">Sair</a>
    </p>
    
</body>
</html>