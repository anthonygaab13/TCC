<?php
    session_start();

    if (!empty($_POST)) {
        $conn = new PDO('mysql:host=localhost; port=3306; dbname=id17990716_cadastro', 'root', '');

        $usuario = $_POST['username'];
        $senha = sha1($_POST['password']);

        $sql = "SELECT * FROM usuario WHERE username = '{$usuario}' AND password = '{$senha}' ";

        $result = $conn->query($sql);

        if ($row = $result->fetch(PDO::FETCH_ASSOC)) {
            //usuario correto. Guardamos os valores em variáveis de sessão
            header('Location: formAdm.html');
            $_SESSION['id'] = $row['id'];
            $_SESSION['username'] = $row['username'];

            exit();
        }else {
            $_SESSION['recusa'] = true;
            header('Location: loginAdm.php');
            exit();
        }
    }
?>