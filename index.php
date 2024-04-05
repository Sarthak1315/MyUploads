<html>

<head>
    <title>Login</title>
    <link rel="stylesheet" href="loginstyle.css">
</head>

<body>
    <?php
    include "conn.php";
    $obj=new con();
    $obj->logout();
    ?>
    <div class="hero">
   <!-- <video autoplay muted loop id="myVideo">
  <source src="https://drive.google.com/file/d/1ddaEHkhTOqXhX4jiX4Da0NxU-3KAnYD3/view" type="video/mp4">
</video>-->
    <div class="techocean"><h1 class="ab">Welcome to Tech Ocean</h1></div>
        <div class="form-box">
            <div class="button-box">
                <div id="btn"></div>
                <button type="button" class="toggle-btn" onclick="login()">Log In</button>
                <button type="button" class="toggle-btn" onclick="register()">Register</button>

            </div>
            <form action="up_index.php" id="login" class="input-group" method="post">
            <br>
                <input type="text" class="input-field" name="luser" placeholder="User Name" required>
                <input type="password" class="input-field" name="lpass" placeholder="Enter Password" required>
                <input type="checkbox" class="check-box"><span class="rem">Remember Password</span>
                <a class="toggle-btn2" href="forgetpassword.html">Forget Password?</a>
                <input type="submit" value="Log In" class="submit-btn" name="log">
                <!-- <button type="submit" class="submit-btn" name="log">Log In</button> -->
            </form>
            <form action="res.php" method="post" id="register" class="input-group">
                <input type="text" class="input-field" name="r_user" placeholder="User Name" required>
                <input type="email" class="input-field" name="r_email" placeholder="Email Id" required>
                <input type="password" class="input-field" name="r_pass" placeholder="Enter Password" >
                <!-- <input type="text" class="input-field" name="re_r_pass" placeholder="Re-Enter Password"> -->
                <span id="message" class="download"></span>
                <input type="checkbox" class="check-box" id="accept" name="accept" value="yes"><span class="download">I agree to the terms &amp; conditions</span>
                <button type="submit" class="submit-btn" name="res">Register</button>
            </form>
        </div>
</div>
    <script src="./st.js">
    </script>
    
</body>

</html>