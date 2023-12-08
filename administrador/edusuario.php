<?php
include '../conexao.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_GET['idusuario'];
    $nome_usuario = $_POST['nome_usuario'];
    $senha = $_POST['senha'];

    if ($conexao->connect_error) {
        die("Conexão falhou: " . $conexao->connect_error);
    }

    // Consulta para atualizar o nome do usuário na tabela 'usuarios'
    $sqlUpdateUsuario = "UPDATE usuarios SET nome_usuario = ?, senha = ? WHERE idusuario = ?";
    $stmtUpdateUsuario = $conexao->prepare($sqlUpdateUsuario);
    $stmtUpdateUsuario->bind_param('ssi', $nome_usuario, $senha, $id);

    // Verifique se a atualização do nome do usuário foi bem-sucedida
    if ($stmtUpdateUsuario->execute()) {
        $stmtUpdateUsuario->close();
        
        // Atualize o nome do odontologista associado (se houver)
        $sqlUpdateOdontologo = "UPDATE odontologos
            LEFT JOIN usuarios ON usuarios.idodontologo = odontologos.idodontologo
            SET odontologos.nome_odontologo = ?
            WHERE usuarios.idusuario = ?";
        $stmtUpdateOdontologo = $conexao->prepare($sqlUpdateOdontologo);
        $stmtUpdateOdontologo->bind_param('si', $nome_usuario, $id);

        // Verifique se a atualização do nome do odontologista foi bem-sucedida
        if ($stmtUpdateOdontologo->execute()) {
            $stmtUpdateOdontologo->close();
        } else {
            echo "Erro na atualização do nome do odontologista: " . $stmtUpdateOdontologo->error;
        }
        
        header("Location: usuarios.php#tabs-4");
    } else {
        echo "Erro na atualização do nome de usuário: " . $stmtUpdateUsuario->error;
    }

    // Feche a conexão com o banco de dados
    $conexao->close();
}
?>
