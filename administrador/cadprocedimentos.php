<?php

    include '../conexao.php';

    $nome_procedimento = $_POST['nome_procedimento'];
    $preco = $_POST['preco'];


    $query = $conexao -> query("SELECT * FROM procedimento_clinico WHERE   nome_procedimento = '$nome_procedimento'");

    if (mysqli_num_rows($query)> 0){
        echo "<script language= 'javascript' type='text/javascript'>
                alert ('Procedimento já cadastrado  window.location.href='procedimentos.php';
            </script>";
        exit();
    } else{
        $sql = "INSERT INTO procedimento_clinico (nome_procedimento,preco) VALUES ('$nome_procedimento', '$preco')";
        if( mysqli_query($conexao,$sql)){
            echo "<script language= 'javascript' type='text/javascript'>
            window.location.href='procedimentos.php';
        </script>";
        exit();
        }
        else{
            echo "<script language= 'javascript' type='text/javascript'>
            window.location.href='procedimentos.php';
        </script>";
        exit();
        }
    }
