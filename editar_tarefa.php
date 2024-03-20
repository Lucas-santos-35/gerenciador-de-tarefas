<?php
$host = "localhost"; // Endereço do servidor MySQL
$user = "root"; // Nome de usuário do MySQL
$password = ""; // Senha do MySQL
$database = "gerenciador-de-tarefas"; // Nome do banco de dados

$conn = new mysqli($host, $user, $password, $database);

if ($conn->connect_error) {
    die("Erro na conexão: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $id = $_POST["id"];
    $titulo = $_POST["titulo"];
    $descricao = $_POST["descricao"];
    $prioridade = $_POST["prioridade"];
    $data_vencimento = $_POST["data-vencimento"];
    $categoria = $_POST["categoria"];

    $sql = "UPDATE tarefas SET titulo='$titulo', descricao='$descricao', `data-vencimento`='$data_vencimento', categoria='$categoria', prioridade='$prioridade' WHERE id=$id";
    if ($conn->query($sql) === TRUE) {
        echo "Tarefa atualizada com sucesso!";
        header("Refresh: 3; url=agenda.php");
    } else {
        echo "Erro ao atualizar dados: " . $conn->error;
        header("Refresh: 3; url=agenda.php");
    }
}
?>
