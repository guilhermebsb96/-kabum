<?php //Pagina de editar dados
    include('conexao.php');
   if(!isset($_GET['usuario']))
        echo "<script alert('Codigo invalido'); location:href='index.php?p=inicial'; </script>"; 
       else 
       { $usu_codigo = intval($_GET['usuario']);

            if (isset($_POST['confirmar'])){
                if(!isset($_SESSION))
                    session_start();

            foreach($_POST as $chave=>$valor)
                $_SESSION[$chave] = $mysqli->real_escape_string($valor);
            
            if(strlen($_SESSION['nome']) == 0)
                $erro[]= "Preencha o nome";

            if(strlen($_SESSION['sobronome']) == 0)
                $erro[]= "Preencha o Sobrenome";

            
            if(substr_count($_SESSION['email'], '@') !=1 || substr_count($_SESSION['email'], '.')<1 || substr_count($_SESSION['email'], '.')>2)
                $erro[]= "Preencha corretamente o Email";

            if(strlen($_SESSION['senha']) <4 || strlen($_SESSION['senha'])>8)
                $erro[]= "Preencha a senha corretamente";

            if (strcmp($_SESSION['senha'], $_SESSION['rsenha']) !=0) 
            $erro[]= "As senhas precisam ser iguais!";
        
        if (count($erro) == 0){
            $senha =md5(md5($_SESSION['senha']));
        // SQL para atualização de dados na tabela
            $sql_code = "UPDATE usuarios SET
                nome             = '$_SESSION[nome]',
                sobrenome        = '$_SESSION[sobrenome]', 
                cpf              = '$_SESSION[cpf]', 
                rg               = '$_SESSION[rg]', 
                data_nascimento  = '$_SESSION[data_nascimento]', 
                email            = '$_SESSION[email]', 
                sexo             = '$_SESSION[sexo]', 
                rua              = '$_SESSION[rua]', 
                bairro           = '$_SESSION[bairro]', 
                cidade           = '$_SESSION[cidade]', 
                uf               = '$_SESSION[uf]', 
                senha            = '$_SESSION[senha]'
                where codigo     = '$usu_codigo'";


            $confirmar = $mysqli->query($sql_code) or die ($mysqli->error);

            if($confirmar){

                unset(
                $_SESSION[nome],
                $_SESSION[sobrenome],
                $_SESSION[cpf],
                $_SESSION[rg],
                $_SESSION[data_nascimento],
                $_SESSION[email],
                $_SESSION[sexo],
                $_SESSION[rua],
                $_SESSION[bairro],
                $_SESSION[cidade],
                $_SESSION[uf],
                $_SESSION[senha]);

                echo " <script location.href='editar.php?p=inicial'; </script>";

            } else 
                $erro[] = $confirmar;
        }
            $sql_code = "SELECT * FROM usuarios where id = '$usu_codigo'";
            $sql_query = $mysqli-> query($sql_code) or die ($mysqli->error);
            $linha = $sql_query->fetch_assoc();
            
            if(!isset($_SESSION))
            session_start();

            $_SESSION[nome] = $linha['nome'];
            $_SESSION[sobrenome] = $linha['sobrenome'];
            $_SESSION[cpf] = $linha['cpf'];
            $_SESSION[rg] = $linha['rg'];
            $_SESSION[data_nascimento] = $linha['data_nascimento'];
            $_SESSION[email] = $linha['email'];
            $_SESSION[sexo] = $linha['sexo'];
            $_SESSION[rua] = $linha['rua'];
            $_SESSION[bairro] = $linha['bairro'];
            $_SESSION[cidade] = $linha['cidade'];
            $_SESSION[uf] = $linha['uf'];
            $_SESSION[senha] = $linha['senha'];

    }
}
?>

<html>
    <h1>Editar Usuário</h1>
    <?php
       // if(count($erro) >0) {
         //   echo "<div class='erro'>"; 
           //foreach($erro as $valor) 
           //echo "$valor <br>"; 
       //echo "</div>";
        //}

    ?>

    <p><a href="index.php?p=inicial">Voltar</a></p>
    <form action="index.php?p=editar&usuario<?php echo $usu_codigo;?>" method="POST">
        <Label for="nome">Nome</LAbel>
        <input name="nome" value="" type="text">
        <p class=espaco></p>

        <Label for="sobrenome">Sobrenome</LAbel>
        <input name="sobrenome" value="" type="text">
        <p class=espaco></p>

        <Label for="cpf">CPF</LAbel>
        <input name="cpf" value="" type="text">
        <p class=espaco></p>

        <Label for="rg">RG</LAbel>
        <input name="rg" value="" type="text">
        <p class=espaco></p>

        <Label for="data_nascimento">Data de nascimento</LAbel>
        <input name="data_nascimento" value="" type="text">
        <p class=espaco></p>

        <Label for="email">Email</LAbel>
        <input name="email" value="" type="text">
        <p class=espaco></p>

        <Label for="sexo">Sexo</LAbel>
        <select name="sexo" >
            <option value="">Selecione</option>
            <option value="1" >Masculino</option>
            <option value="2" >Feminino</option>
        </select>
        <p class=espaco></p>

        <Label for="rua">Rua</LAbel>
        <input name="rua" value="" type="text">
        <p class=espaco></p>

        <Label for="bairro">Bairro</LAbel>
        <input name="bairro" value="" type="text">
        <p class=espaco></p>

        <Label for="cidade">Cidade</LAbel>
        <input name="cidade" value="" type="text">
        <p class=espaco></p>

        <Label for="uf">UF</LAbel>
        <input name="uf" value="" type="text">
        <p class=espaco></p>        

        <Label for="senha">Senha</LAbel>
        A senha deve conter de 4 a 8 caracteres.
        <input name="senha" value="" type="password">
        <p class=espaco></p>

        <Label for="rsenha">Repita a senha</LAbel>
        <input name="rsenha" value="" type="password">
        <p class=espaco></p>
        
        <input value="Salvar" name="Confirmar" type="submit"> 
    </form>
 </html>