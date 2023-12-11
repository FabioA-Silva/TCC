<?php
// buscar_preco.php

// Verifique se o nome_procedimento está sendo recebido corretamente
if (isset($_POST['nome_procedimento'])) {
    // Conexão com o banco de dados - ajuste as credenciais conforme necessário
    $conexao = mysqli_connect('localhost', 'root', '', 'tcc');

    if (!$conexao) {
        die("Conexão falhou: " . mysqli_connect_error());
    }

    $nome_procedimento = $_POST['nome_procedimento'];

    // Consulta para buscar o preço do procedimento pelo nome
    $query = "SELECT preco FROM procedimento_clinico WHERE nome_procedimento = '$nome_procedimento'";
    $result = mysqli_query($conexao, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        // Se houver resultado, captura o preço
        $row = mysqli_fetch_assoc($result);
        $preco = $row['preco'];

        // Retorna o preço como resposta para a requisição AJAX
        echo $preco;
    } else {
        echo "Preço não encontrado para o procedimento selecionado.";
    }

    // Fecha a conexão com o banco de dados
    mysqli_close($conexao);
} else {
    echo "Nome do procedimento não recebido";
}
?>