<?php
    include("conexao.php");
    include('protecao.php');

    $sql_code = "SELECT * from usuarios";
    $sql_query = $mysqli->query($sql_code) or die ($mysqli->error);
    $linha = $sql_query->fetch_assoc();

    $sexo[1] = "Masculino";
    $sexo[2] = "Feminino";
?>


<h1>Lista de Usuarios</h1>  
    <html>
        <body>
            Bem vindo ao Painel, <?php echo $_SESSION['nome']; ?>
        </body>
    </html>

    <p>

        <a href="logout.php">Sair</a>
    </p>
    


<table border=1 cellpadding=10>
    <tr class=titulo>
        <td>ID</td>
        <td>Nome</td>
        <td>Sobrenome</td>
        <td>CPF</td>
        <td>RG</td>
        <td>Sexo</td>
        <td>Email</td>
        <td>Telefone</td>
        <td>Endereço</td>
        <td>Bairro</td>
        <td>Cidade</td>
        <td>UF</td>
        <td>Data de Nascimento</td>

            <?php
                do{
            ?>
            
    </tr>
    <tr>
        <td> <?php echo $linha['id'];?> </td>
        <td> <?php echo $linha['nome'];?> </td>
        <td> <?php echo $linha['sobrenome'];?></td>
        <td> <?php echo $linha['cpf'];?></td>
        <td> <?php echo $linha['rg'];?></td>
        <td> <?php echo $linha['sexo'];?></td>
        <td> <?php echo $linha['email'];?></td>
        <td> <?php echo $linha['telefone'];?></td>
        <td> <?php echo $linha['rua'];?></td>
        <td> <?php echo $linha['bairro'];?></td>
        <td> <?php echo $linha['cidade'];?></td>
        <td> <?php echo $linha['estado'];?></td>
        <td> <?php 
         $d = explode(" ", $linha['data_nascimento']);
         $data = explode("-", $d[0]);
        
        echo "$data[2]/$data[1]/$data[0]";
        ?>
        </td>
            <td>
                <a href="editar.php?p=editar&usuario=<?php echo $linha['id']; ?>">Editar</a>
                <a href="deletar.php?p=editar&usuario=<?php echo $linha['id']; ?>">Deletar usuario</a>

            </td>

    </tr>

        <?php } while($linha = $sql_query->fetch_assoc()); ?>

</table>