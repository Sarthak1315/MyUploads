
<?php
include "conn.php";

$user_name = $_SESSION["user_name"];
$_SESSION["log"]=1;
$obj=new con();
$con = $obj->c;
if(isset($_FILES["file"])){
    $data=$_FILES["file"];
    $code = $data["error"];
    if($code !== UPLOAD_ERR_OK){
        exit("Upload Error");
    }
    $done=1;
    if($data["size"] > 10){
        echo " <script>
                    user_alert('File Size Mustbe Less Than 10 MB','up_index.php');
            </script>";
    }
    $check ="SELECT * FROM `up_detail`";
    $result = $con->query($check);
    while($che=$result->fetch_array()){
        if($data["name"]==$che["file_name"]){
            $done=0;
        }
    }
    ?>
    <html lang="en">
<head>
    <title>File Upload</title>
    <link rel="stylesheet" href="loginstyle.css">
     <script src="./st.js"></script>
    <script src="./alert.js"></script>
</head>
<body>
<div class="hero">
    <?php
    if($done){
        $src =$data["tmp_name"];
        $dest =__DIR__."/uploads/".$user_name."/".$data["name"];

        move_uploaded_file($src,$dest);
        

        // echo "File Uploaded<br>".
        // "Size : ".$data["size"].
        // "<br>Type : ".$data["type"];

            $name = $_POST['name'];
            $filename=$data["name"];
            $filetmpname=$data["tmp_name"];
            $filetype = $data["type"];
            $filepath=$dest;

        // echo "<br>". $name."<br>".$filename."<br>".$filetmpname."<br>".$filepath."<br>".$filetype."<br>";
        
            $sql ="INSERT INTO `up_detail`(`user_name`,`name`, `file_name`, `file_type`, `file_path`, `file_tmp_name`) VALUES ('$user_name','$name','$filename','$filetype','$filepath','$filetmpname');";
            // echo $sql;
            if ($con->query($sql) == true) {
            ?>
                <script>
                success_msg("File Uploaded","up_index.php")
                // alert("File Uploaded.");
                // window.location= 'up_index.php';
            </script>
            <?php
            }
    }
    else{
        ?>
    
    <script>
        // alert("plz change File Name.");
        user_alert("File Name Already Exists","up_index.php");
        // alert("plz change File Name.");
        // window.location= 'up_index.php';
    </script>
    
    <?php

    }
    

}

?>
    </div>
</body>
</html>