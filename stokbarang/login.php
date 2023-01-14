<?php
require 'function.php';


// cek login, terdaftar atau tidak
if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    //mencocokan dengan database yang dibuat.... ada atau nggak tuh
    $cekdatabase = mysqli_query($conn, "SELECT * FROM login where email='$email' and password='$password'");
    //hitung jumlah data
    $hitung = mysqli_num_rows($cekdatabase);
    if ($hitung > 0) {
        $_SESSION['log'] = 'True';
        header('location:index.php');
    } else {
        header('location:login.php');
    };
};

if (!isset($_SESSION['log'])) {
} else {
    header('location:index.php');
}

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/1ef1772957.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <link rel="stylesheet" href="style_sign_in.css" />
    <script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  </head>
 
  <body>
    <div class="animate__animated animate__zoomIn animate__faster">
      <div class="wrapper">
        <div class="form-wrapper sign-in">
          <div id="login">
            <a href="../FrontEnd/index.html" class="close"><h3>x</h3></a>
            <h2>Sign In</h2>
            <div class="col-lg-6">
                <div class="input-group">
                  <div class="form-float mb-3 mb-md-0">
                    <input type="email" maxlength="50" id="email" required/>
                    <label for="">Email</label>
                  </div>
                </div>
              </div>
              <div class="col-lg-6">
                <div class="input-group">
                  <div class="form-float mb-3 mb-md-0">
                    <input type="password" required id="password"  maxlength="12" />
                    <label for="">Password</label>
                  </div>
                </div>
              </div>
            <!-- <div class="input-group">
              <input type="email" required maxlength="50" />
              <label for="">Email</label>
            </div>
             
            <div class="input-group">
              <input class="control" id="password" type="password" required maxlength="12" />
              <label for="">Password</label>
            </div> -->

            <button class="btn" id="login">Sign In</button>
            <div class="sign-link">
              <p>Don't have an account?<a href="register.html" class="signUp-link">Sign Up</a></p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>
  <script>
    $("#login").on("click", function () {
      if (
        $("#email").val() != "" && $("#password").val() != "" 
        ) {
        $.ajax({
          url: "cek.php",
          type: "POST",
          data: {email: $("#email").val(), password: $("#password").val() },
          success: function (data) {
                window.location.href = "index.php";
              
          },
          error: function (error) {
            alert(error);
          },
        });
      } else if ($("#email").val() == "") {
        Swal.fire({
          title: "WRONG",
          text: "Email",
          icon: "warning",
          confirmButtonColor: "#3085d6",
          confirmButtonText: "OK",
        });
      } else if ($("#password").val() == "") {
        Swal.fire({
          title: "WRONG",
          text: "Password",
          icon: "warning",
          confirmButtonColor: "#3085d6",
          confirmButtonText: "OK",
        });
      } 
    });

    // $("#register").on("click", function () {
    //   if (
    //     $("#password").val() != "" &&
    //     $("#email").val() != "" &&
    //   ) {

      // $.ajax({
      //   url: "cek_login.php",
      //   type: "POST",
      //   data: { firstname: $("#first_name").val(), lastname: $("#last_name").val(), password: $("#password").val(), email: $("#email").val() },
      //   success: function (data) {
      //     window.location.href = "login.php";
      //     // Swal.fire({
      //     //   title: "Register",
      //     //   text: data,
      //     //   icon: "success",

      //     //   confirmButtonColor: "#3085d6",

      //     //   confirmButtonText: "Ok",
      //     // }).then((result) => {
      //     //   if (result.isConfirmed) {
      //     //     window.location.href = "login.php";
      //     //   }
      //     // });
      //   });
      //   },
      //   error: function (error) {
      //     alert(error);
      //   },
      // }
    // });
  </script>
</html> 
