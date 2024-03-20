<?php
include("conexao.php");

$id = $_POST['id'];

$sql = "DELETE FROM tarefas WHERE id=$id";

if (mysqli_query($conexao, $sql)) {
    echo "Registro deletado com sucesso";
    header("Refresh: 1; url=agenda.php");
} else {
    echo "Erro ao deletar registro: " . mysqli_error($conexao);
    header("Refresh: 1; url=agenda.php");
}

mysqli_close($conexao);
?>