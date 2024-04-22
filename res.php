

<?php
include "conn.php";
$obj=new con();
$con = $obj->c;
$auth=0;
    if(isset($_POST["res"])){
        if(isset($_SESSION["val_user"])){
            if($_SESSION["val_user"]){
                $_SESSION["r_user"]= $_POST["r_user"];
                $_SESSION["r_pass"]=$_POST["r_pass"];
                $_SESSION["r_email"]= $_POST["r_email"];
        
                $obj->send_otp($_SESSION["r_email"]);
            }else{
                echo "<script>alert('User Name Not Available');
                window.location ='index.php';
                </script>";
            }
        }
    }
        $a_email = $_SESSION["a_Email"][0];
        $a_otp = $_SESSION["a_Email"][1];
        // echo $a_email;
        // echo $a_otp;
        $email=$_SESSION["r_email"];
    if(isset($_POST["verify"])){
        if($email==$a_email){
            if($a_otp==$_POST["otp"]){
                $auth=1;
                $s=$obj->welcome_user($_SESSION["r_email"],$_SESSION["r_user"]);
            }
        }
    }
?>


<!DOCTYPE html>
<html>
<head>
    <title>Verify Email</title>
    <link rel="stylesheet" href="loginstyle.css">
    <script src="./st.js"></script>
    <script src="./alert.js"></script>
</head>
<body>
<?php
    if($auth==1){
            $inst=array($_SESSION["r_user"],$_SESSION["r_pass"],$_SESSION["r_email"]);
            mkdir("uploads/".$_SESSION["r_user"]);
            if($obj->new_res($inst)){
                
                ?>
                <script>
                    success_msg("Register","index.php");  
                </script>
            
            <?php
            }else{?>
                <script>
                    user_alert("wrong otp","index.php"); 
                </script>
            <?php
            } 
        }?>
    <div class="hero">
        <div class="form-box">
            <h1 class="head">Verify Email</h1>
            <form id="login" class="input-group" action="res.php" method="post" enctype="multipart/form-data" class="input-group">
                <label for="Name" class="lab">Enter OTP :</label>
                <input type="text" name="otp" placeholder="Enter OTP" class="input-field"><br><br>
                
                <button type="submit" class="submit-btn" name="verify">Submit</button><br>
                <u><a href="index.php" class="download">Log Out</a></u>

            </form>
            
        </div>
    </div>
</body>
</html>