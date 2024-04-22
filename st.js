
var x = document.getElementById("login");
var y = document.getElementById("register");
var z = document.getElementById("btn");
var s = document.getElementsByClassName("submit-btn");
var obj = new Object;
var u_r=0;
function register() {
    x.style.left = "-400px";
    y.style.left = "50px";
    z.style.left = "110px";
}

function login() {
    x.style.left = "50px";
    y.style.left = "450px";
    z.style.left = "0px";
}

const bt = document.getElementById('sub_btn');
function s_btn_t(){
bt.disabled = true;
}
function s_btn_f(){
bt.disabled = false;
}
// const ui = document.querySelectorAll('#u_i');
// ui.addEventListener('keyup',()=>{
//       console.log(ui.value);
// });
function SubmitEventLogin() {

    alert("Log in sacsessfully");
}

function SubmitEventR() {
    alert("resister sacsessfully");
}

function success_notify(str) {
    Swal.fire({
        position:"top-end",
        text: str + " Successfully",
        icon: "success",
        toast :true,
        showConfirmButton: false,
        timer:4000,
    })
}
function success_msg(str,path) {
    Swal.fire({
        title: "Good job!",
        text: str + " Successfully",
        icon: "success",
    }).then(function (result) {
        if (true) {
            window.location = path;
        }
    })
}
function fail_msg(str,path) {
    Swal.fire({
        title: "Oops...",
        text: str + " Failed",
        icon: "error",
       
    }).then(function (result) {
        if (true) {
            window.location = path;
        }
    })
}
function user_alert(str,path){
    Swal.fire({
        title: "Oops...",
        text: str,
        icon: "warning",
    }).then(function (result) {
        if (true) {
            window.location = path;
        }
    })
}
// function res_con(){
//     var ac = document.getElementById("accept");
//     if(ac!="yes"){
//         alert("Accept  terms & conditions");
//         window.location="index.php";
//     }
// }
// function verifyPassword() {  
//     var pw = document.getElementById("r_pass").value;  
//     //check empty password field  
//     if(pw == "") {  
//        document.getElementById("message").innerHTML = "**Fill the password please!";  
//        return false;  
//     }  
     
//    //minimum password length validation  
//     if(pw.length < 8) {  
//        document.getElementById("message").innerHTML = "**Password length must be atleast 8 characters";  
//        return false;  
//     }  
    
//   //maximum length of password validation  
//     if(pw.length > 15) {  
//        document.getElementById("message").innerHTML = "**Password length must not exceed 15 characters";  
//        return false;  
//     } else {  
//        alert("Password is correct");  
//     }  
//   }  

