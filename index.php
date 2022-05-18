<?php
    require 'functions.php';

    $user = query("SELECT * FROM users WHERE username = $_POST[username]");
    var_dump($user);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php if($user["username"] == "arga") : ?>
        <h1>Masuk admin</h1>
    <?php else : ?>
        <h1>Masuk user</h1>
    <?php endif; ?>
    
</body>
</html>