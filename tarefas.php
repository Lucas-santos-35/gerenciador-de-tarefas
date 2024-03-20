<?php
session_start();

if (!isset($_SESSION['logado'])) {
    echo "Você precisa estar logado para acessar esta página";
    header("Refresh: 3; url=login.html");
    exit();
}

$host = "localhost"; // Endereço do servidor MySQL
$user = "root"; // Nome de usuário do MySQL
$password = ""; // Senha do MySQL
$database = "gerenciador-de-tarefas"; // Nome do banco de dados

$conn = new mysqli($host, $user, $password, $database);

if ($conn->connect_error) {
    die("Erro na conexão: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $titulo = $_POST["titulo"];
    $descricao = $_POST["descricao"];
    $prioridade = $_POST["prioridade"];
    $data_vencimento = $_POST["data_vencimento"];
    $categoria = $_POST["categoria"];
    $IDusuario = $_SESSION["ID-usuario"];

    $sql = "INSERT INTO tarefas(titulo, descricao,`data-vencimento`, categoria ,prioridade , `fk_usuario`) VALUES ('$titulo','$descricao', '$data_vencimento', '$categoria' ,'$prioridade','$IDusuario')";
    if ($conn->query($sql) === TRUE) {
        echo "Tarefa Cadastrada com sucesso!";
        header("Refresh: 3; url=tarefas.html");
    } else {
        echo "Erro ao inserir dados: " . $conn->error;
        header("Refresh: 3; url=tarefas.html");
    }
}
?>