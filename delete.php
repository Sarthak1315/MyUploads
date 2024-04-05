<?php
include "conn.php";
$user_name = $_SESSION["user_name"];
$_SESSION['user_name']=$user_name;
$obj = new con();
$con = $obj->c;
$sql = "SELECT * FROM `up_detail` WHERE user_name = '$user_name';";
$r = $con->query($sql);
$_SESSION["log"]=1;
// $data=$r->fetch_assoc();

// if (isset($_POST["s"])) {
//     $n = $_POST["s"];
//     $sql_r = "SELECT * FROM `up_detail` WHERE `file_name` ='$n';";
//     $rs = $con->query($sql_r);
//     // echo $sql_r;
//     $fp = $rs->fetch_array();
//     // print_r($fp);
//     // $fp["file_ name"];

//     echo "Download your File hear<br><br>";
//     echo $fp["file_name"] . ' <br>';
//     echo '<a href = "./uploads/' . $fp["file_name"] . '" Download = "">
//            <button type = "button"> Download </button>
//         </a><br><br>';
//     // echo '<br><br>'.$_POST["s"];
// }
// if(isset($_POST["del"])){
//     $del= $_POST["del"];
//     echo $del;
// }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="loginstyle.css">
    <title>Delete File</title>
</head>
<script>
function download(str) {
  if (str == "") {
    document.getElementById("d").innerHTML = "Select the Option..";
    return;
  } else {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("d").innerHTML = this.responseText;
      }
    };
    xmlhttp.open("GET","del_ajax.php?q="+str,true);
    xmlhttp.send();
  }
}
</script>

<body>

    <div class="hero">
        <div class="form-box">
        <?php
        if(isset($_SESSION["del"])){
          $del= $_SESSION["del"];
          echo "<h1>$del</h1>";
        }
    
    
    ?>
            <h1 class="head_delete">Delete File</h1>
            <form id="login" class="input-group" action="download.php" method="post" class="input-group">
                <label for="Name" class="lab">User Name :</label>
                <input type="text" name="name" class="input-field" value="<?php echo $user_name; ?>" readonly><br><br>
                <label for="file" class="lab">Select Your File : </label>
                <select name="s" class="sel" onchange="download(this.value)">
                <option value="">--Select--<option>
                    <?php
                    while ($data = $r->fetch_assoc()) {
                        echo '<option>' . $data["file_name"] . '</option>';
                    }
                    ?>
                </select><br>
                <div id="d" class ="download">Select the Option..</div><br>
                <u><a href="up_index.php" class="download">Go To Upload.</a></u><br><br>
                <u><a href="index.php" class="download">Log Out</a></u>
            </form>

        </div>
    </div>
</body>

</html>