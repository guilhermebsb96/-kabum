<?php
    include('conexao.php');
    $usu_codigo = intval($_GET['usuario']);

    $sql_code = "DELETE FROM usuarios where id = '$usu_codigo'";
    $sql_query = $mysqli->query($sql_code) or die ($mysqli->error);

    if($sql_query) 
        echo "<script> location.href='index.php?p=inicial';</script>";
        else
        echo "<script> alert('Não foi possivel deletar o usuario.'); location.href='index.php?p=inicial'; </script>";

?>