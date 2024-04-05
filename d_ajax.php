<?php
include "conn.php";
$user_name = $_SESSION["user_name"];
$_SESSION['user_name']=$user_name;
$obj = new con();
$con = $obj->c;
$str = $_GET["q"];

    $sql_r = "SELECT * FROM `up_detail` WHERE `file_name` ='$str' AND user_name = '$user_name';";
    $rs = $con->query($sql_r);
    // echo $sql_r;
    $fp = $rs->fetch_array();
    // print_r($fp);
    // $fp["file_ name"];
                    
     // echo '<span class="download">Download your File hear</span><br>';
    echo '<span class="download">File Name : '.$fp["file_name"].'</span><br><br>';
    echo '<a href = "./uploads/'.$fp["user_name"]."/" . $fp["file_name"] . '" Download = "">
    <button type = "button" class="submit-btn"> Download </button>
    </a><br>';
     // echo '<br><br>'.$_POST["s"];


?>