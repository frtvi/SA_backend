<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
// Mostra os erros, se houver algum.

// Verifica se o formulário foi submetido.
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Inserção dos dados do BD para conexão.
    $servername = "srv1079.hstgr.io";
    $username = "u368907112_admin";
    $password = "Victor270377@";
    $dbname = "u368907112_smurfarena";

    $conn = new mysqli($servername, $username, $password, $dbname);

    // Verifica a conexão.
    if ($conn->connect_error) {
        die("Conexão falhou: " . $conn->connect_error);
    }

    // Coleta os dados do formulário através do método POST.
    $nome = $_POST["nome"];
    $email = $_POST["email"];
    $telefone = $_POST["telefone"];
    $idade = $_POST["idade"];
    $endereco = $_POST["endereco"];
    $cidade = $_POST["cidade"];
    $idlol = $_POST["idlol"];
    $containte = $_POST["containte"];

    // Insere os dados no banco de dados.
    $sql = "INSERT INTO formulario (nome, email, telefone, idade, endereco, cidade, idlol, containte) VALUES ('$nome', '$email', '$telefone', '$idade', '$endereco', '$cidade', '$idlol', '$containte')";

    if ($conn->query($sql) === TRUE) {
        echo "Dados inseridos com sucesso!";
            header('Location: contato.html');
            exit(); // Recarrega a página após o fim da operação.
    } else {
        echo "Erro ao inserir dados: " . $conn->error;
            header('Location: contato.html');
            exit(); // Recarrega a página após o fim da operação.
    }

    // Fecha a conexão com o banco de dados.
    $conn->close();
}
?>
