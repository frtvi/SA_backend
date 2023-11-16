<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$filename = 'nicknames.txt';

// Lógica para adicionar nickname
if (isset($_POST['add_button']) && isset($_POST['add_nickname'])) {
    $nickname = $_POST['add_nickname'];

    // Carrega o conteúdo atual do arquivo TXT
    $nicknames = file_get_contents($filename);

    // Adiciona o novo nickname ao conteúdo
    $nicknames .= $nickname . PHP_EOL;

    // Salva o conteúdo atualizado no arquivo TXT
    file_put_contents($filename, $nicknames);

    echo "Nickname adicionado com sucesso.";
    
    header('Location: Contas.html');
    exit(); // Certifique-se de sair após o redirecionamento
}

// Lógica para excluir nickname
if (isset($_POST['delete_button']) && isset($_POST['delete_nickname'])) {
    $nicknameToDelete = $_POST['delete_nickname'];

    // Carrega o conteúdo atual do arquivo TXT
    $nicknames = file_get_contents($filename);

    // Remove o nickname especificado do conteúdo
    $nicknames = str_replace($nicknameToDelete . PHP_EOL, '', $nicknames);

    // Salva o conteúdo atualizado no arquivo TXT
    file_put_contents($filename, $nicknames);

    echo "Nickname excluído com sucesso.";
    
    header('Location: Contas.html');
    exit(); // Certifique-se de sair após o redirecionamento
    
}

// Exibir nicknames
$nicknames = file_get_contents($filename);

if (!empty($nicknames)) {
    $nicknamesArray = explode(PHP_EOL, trim($nicknames));

    foreach ($nicknamesArray as $index => $nickname) {
        echo "<tr><td>" . ($index + 1) . "</td><td>" . $nickname . "</td></tr>";
    }
} else {
    echo "<tr><td colspan='2'>Nenhum nickname registrado.</td></tr>";
}
?>
