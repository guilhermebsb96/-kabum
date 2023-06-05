
<html>
    
<?php // PAGINA DE CADASTRO
    include('conexao.php');
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
        //NOTA* USEI A CRIPTOGRAFIA MD5 NO EXERCICIO NÃO PEDIU NADA, PORÉM SEI QUE MD5 NÃO É A CRIPTOGRAFIA INDICADA!
        if (count($erro) == 0){
            $senha =md5(md5($_SESSION['senha']));

            $sql_code = "INSERT INTO usuarios (
                nome, 
                sobrenome, 
                cpf, 
                rg, 
                data_nascimento, 
                email, 
                sexo, 
                rua, 
                bairro, 
                cidade, 
                uf, 
                senha)
                values(
                '$_SESSION[nome]',
                '$_SESSION[sobrenome]',
                '$_SESSION[cpf]',
                '$_SESSION[rg]',
                '$_SESSION[data_nascimento]',
                '$_SESSION[email]',
                '$_SESSION[sexo]',
                '$_SESSION[rua]',
                '$_SESSION[bairro]',
                '$_SESSION[cidade]',
                '$_SESSION[uf]',
                '$senha'
                )";

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

                echo " <script location.href='index.php?p=inicial'; </script>";

            } else 
                $erro[] = $confirmar;
        }
        
    }
?>

<p><h1>Cadastrar Usuário</h1></p>
    <?php
       // if(count($erro) >0) {
         //   echo "<div class='erro'>"; 
           //foreach($erro as $valor) 
           //echo "$valor <br>"; 
       //echo "</div>";
        //}

    ?>
    <p><a href="index.php?p=inicial">Voltar</a></p>
      <form action="index.php?p=cadastrar&usuario" method="POST">
    

        <Label for="nome">Nome</LAbel>
        <input name="nome" value="" required type="text">
        <p class=espaco></p>

        <Label for="sobrenome">Sobrenome</LAbel>
        <input name="sobrenome" value="" required type="text">
        <p class=espaco></p>

        <Label for="cpf">CPF</LAbel>
        <input name="cpf" value="" required type="text">
        <p class=espaco></p>

        <Label for="rg">RG</LAbel>
        <input name="rg" value="" required type="text">
        <p class=espaco></p>

        <Label for="data_nascimento">Data de nascimento</LAbel>
        <input name="data_nascimento" value="" required type="text">
        <p class=espaco></p>

        <Label for="email">Email</LAbel>
        <input name="email" value="" required type="text">
        <p class=espaco></p>

        <Label for="sexo">Sexo</LAbel>
        <select name="sexo" >
            <option value="">Selecione</option>
            <option value="1" >Masculino</option>
            <option value="2" >Feminino</option>
        </select>
        <p class=espaco></p>

        <Label for="rua">Rua</LAbel>
        <input name="rua" value="" required type="text">
        <p class=espaco></p>

        <Label for="bairro">Bairro</LAbel>
        <input name="bairro" value="" required type="text">
        <p class=espaco></p>

        <Label for="cidade">Cidade</LAbel>
        <input name="cidade" value="" required type="text">
        <p class=espaco></p>

        <Label for="uf">UF</LAbel>
        <input name="uf" value="" required type="text">
        <p class=espaco></p>        

        <Label for="senha">Senha</LAbel>
        A senha deve conter de 4 a 8 caracteres.
        <input name="senha" value="" required type="password">
        <p class=espaco></p>

        <Label for="rsenha">Repita a senha</LAbel>
        <input name="rsenha" value="" required type="password">
        <p class=espaco></p>
        
        <input value="Salvar" name="Confirmar" type="submit"> 
    </form>
</html>