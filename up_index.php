<?php
include "conn.php";
$obj=new con();
$con = $obj->c;

// $user=$_POST["luser"];
// $pass=$_POST["lpass"];
$f_log=0;
$log=0;
if(isset($_SESSION["log"])){
    $log=$_SESSION["log"];
}
if(isset($_SESSION['user_name']) && isset($_SESSION['pass'])){
    $user_name = $_SESSION['user_name'];
    $pass = $_SESSION['pass'];
}
    if(isset($_POST["log"])){
        $user=$_POST["luser"];
        $pass=$_POST["lpass"];
        $sql="select * from login";
        $result = $con->query($sql);
        // $data=$result->fetch_assoc();
        // print_r($data);
        while($data=$result->fetch_assoc()){

            if(($user == $data["user_name"]) && (password_verify($pass,$data["password"]))){
                $f_log=1;
                $log=1;
                $user_name= $data["user_name"];
                $_SESSION['user_name']=$user_name;
                $_SESSION['pass']=$pass;
                
            }
        }
    }
    if(isset($_POST["res"])){
        $log=0;
    }
    
?>
<!DOCTYPE html>

<head>
    <title>Upload File</title>
    <link rel="stylesheet" href="loginstyle.css">
    <script src="./st.js"></script>
    <script src="./alert.js"></script>
</head>

<body>
<?php 
    if($f_log){?>
        <script>
        success_notify("Log in ");
        // alert("you are not valid user,Try Again......");   
    </script>
    <?php
    }
?>
<?php
        if($log){
    ?>
     
    <div class="hero">
        <div class="form-box">
            <h1 class="head">Upload File</h1>
            <form id="login" class="input-group" action="up.php" method="post" enctype="multipart/form-data" class="input-group">
                <label for="Name" class="lab">Name :</label>
                <input type="text" name="name" placeholder="Enter name" class="input-field"><br><br>
                <label for="file" class="lab">Select Your File : </label><br><br>
                <input type="file" name="file" id="up"><br><br>
                <button type="submit" class="submit-btn">Upload</button><br>
                <span class="download">Are You Want To </span><u><a href="download.php" class="download">Download Your File.</a></u>
                <span class="download">Are You Want To </span><u><a href="delete.php" class="download">Delete Your File.</a></u><br><br>
                <u><a href="index.php" class="download">Log Out</a></u>
            </form>
            
        </div>
    </div>
    <?php  }
    
    else{?>
    <script>
        fail_msg("you are not valid user,Log in ","index.php");
        // alert("you are not valid user,Try Again......");   
    </script>
    <?php

   }?>
</body>
</html>