<?php
if(isset($_POST["sub"])){
    $enc_pass=password_hash($_POST["pass"],PASSWORD_DEFAULT);
    echo $_POST["pass"]." = ".$enc_pass;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
</head>
<body>
    <form action="" method="post">
        Pass : <input type="password" name="pass">
        <input type="submit" value="s" name="sub">
    </form>
</body>
</html>