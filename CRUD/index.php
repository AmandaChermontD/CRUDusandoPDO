<?php

$conexao = mysqli_connect("localhost", "root", "", "exemplocrud");

if (!$conexao) {
    die('Erro ao conectar ao banco de dados: ' . mysqli_connect_error());
}

if (isset($_POST['nome']) && isset($_POST['email']) && isset($_POST['telefone'])) {
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];

    $sql = "INSERT INTO contatos (nome, email, telefone) VALUES ('$nome', '$email', '$telefone')";
    if (!mysqli_query($conexao, $sql)) {
        echo 'Erro ao inserir contato: ' . mysqli_error($conexao);
    }
}

if (isset($_POST['id_editar']) && isset($_POST['nome_editar']) && isset($_POST['email_editar']) && isset($_POST['telefone_editar'])) {
    $id = $_POST['id_editar'];
    $nome = $_POST['nome_editar'];
    $email = $_POST['email_editar'];
    $telefone = $_POST['telefone_editar'];

    $sql = "UPDATE contatos SET nome='$nome', email='$email', telefone='$telefone' WHERE id=$id";
    if (!mysqli_query($conexao, $sql)) {
        echo 'Erro ao atualizar contato: ' . mysqli_error($conexao);
    }
}

if (isset($_POST['id_excluir'])) {
    $id = $_POST['id_excluir'];

    $sql = "DELETE FROM contatos WHERE id=$id";
    if (!mysqli_query($conexao, $sql)) {
        echo 'Erro ao excluir contato: ' . mysqli_error($conexao);
    }
}

$sql = "SELECT * FROM contatos";
$resultado = mysqli_query($conexao, $sql);
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Exemplo de CRUD em PHP</title>
</head>
<body>
    <h1>Contatos</h1>

    <h2>Adicionar contato</h2>
    <form method="post">
        <label for="nome">Nome:</label>
        <input type="text" name="nome" id="nome">
        <br>
        <label for="email">E-mail:</label>
        <input type="email" name="email" id="email">
        <br>
        <label for="telefone">Telefone:</label>
        <input type="text" name="telefone" id="telefone">
        <br>
        <button type="submit">Adicionar</button>
    </form>

    <h2>Lista de contatos</h2>
    <table>
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>E-mail</th>
            <th>Telefone</th>
        </tr>
        <?php while ($contato = mysqli_fetch_assoc($resultado)) : ?>
            <tr>
                <td><?php echo $contato['ID']; ?></td>
                <td><?php echo $contato['NOME']; ?></td>
                <td><?php echo $contato['EMAIL']; ?></td>
                <td><?php echo $contato['TELEFONE']; ?></td>
            </tr>
        <?php endwhile; ?>
    </table>
</body>
</html>