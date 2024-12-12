<?php
session_start();
if (!isset($_SESSION["user_name"])) {
    header("Location: exercices2.php");
    exit;
}
if($_SERVER["REQUEST_METHOD"] == "POST"){


if (isset($_POST["logout"])){
        session_destroy();
        header("Location: exercices2.php");
        exit;
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Bienvenue!!!!</h1>
    <p> 
        Vous êtes connectés tant que : 
        <?php echo htmlspecialchars($_SESSION["user_name"]); ?>
    </p>
    <form method="post">
        <button type="submit" name="logout">Page de déconnexion</button>
    </form>
</body>
</html>
