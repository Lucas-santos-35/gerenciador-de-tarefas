<?php
session_start();
if (!isset($_SESSION['logado'])) {


    include("conexao.php");
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $email = mysqli_real_escape_string($conexao, $_POST['email']);
        $email = htmlspecialchars($email);

        $senha = mysqli_real_escape_string($conexao, $_POST['senha']);
        $senha = ($senha);

        $sql = "SELECT id, nome FROM usuarios WHERE email = '$email' and senha = '$senha'";
        $result = mysqli_query($conexao, $sql);


        $count = mysqli_num_rows($result);

        if ($count == 1) {
            echo "Login bem-sucedido";
            $row = mysqli_fetch_assoc($result);
            //echo var_dump($row);
            
            $_SESSION['logado'] = true;
            $_SESSION['ID-usuario'] = $row['id'];
            $_SESSION['nome-usuario'] = $row['nome'];
            

            
            // Adiciona um cabeçalho para redirecionar a página após 3 segundos
            header("Refresh: 3; url=tarefas.html");
        } else {
            echo "Seu email ou senha estão incorretos";
            // Adiciona um cabeçalho para redirecionar a página após 3 segundos
            header("Refresh: 3; url=login.html");
        }
    }
} else {
    session_start();
    // Adiciona um cabeçalho para redirecionar a página após 3 segundos
    header("Refresh: 3; url=tarefas.html");
}
