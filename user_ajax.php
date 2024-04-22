<html>

<head>
    <link rel="stylesheet" href="loginstyle.css">
    </head>
<body>
<?php
include "conn.php";
$obj = new con();
$con = $obj->c;
$str = $_GET["q"];

    $sql_r = "SELECT count(*) FROM `login` WHERE `user_name` = '$str';";
    $rs = $con->query($sql_r);
    // echo $sql_r;
    $fp = $rs->fetch_array();
    // print_r($fp[0]);
    if($fp[0]){
        $_SESSION["val_user"] = 0;
        echo "<div id='d' style='color:red;margin-top:10px'>User Name Not Available</div>";
    }else{
        $_SESSION["val_user"] = 1;
        echo '<div id="d" style="color:green;margin-top:10px">User Name Available</div><input type="email" class="input-field" name="r_email" placeholder="Email Id" required>
                <input type="password" class="input-field" name="r_pass" placeholder="Enter Password" >
                <!-- <input type="text" class="input-field" name="re_r_pass" placeholder="Re-Enter Password"> -->
                <span id="message" class ="download"></span>
                <input type="checkbox" class="check-box" id="accept" name="accept" value="yes"><span class="download">I agree to the terms &amp; conditions</span>
                <button id="sub_btn" class="submit-btn" name="res">Register</button>';
    }
    // $fp["file_ name"];
    
    
     // echo '<br><br>'.$_POST["s"];


?>
</body>
<script src="./st.js"></script>
</html>