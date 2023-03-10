<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Sign Up</title>
    <link rel="website icon" type="png" href="logo.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/1ef1772957.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <link rel="stylesheet" href="style_sign_up.css" />
    <script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  </head>
  <body>
    <div class="animate__animated animate__zoomIn animate__faster">
      <div class="wrapper">
        <div class="form-wrapper sign-up">
          <div id="form-register">
            <a href="../FrontEnd/index.html" class="close"><h3>x</h3></a>
            <h2>Sign Up</h2>
            <div class="row mb-2">
              <div class="col-md-6">
                <div class="input-group">
                  <div class="form-float mb-3 mb-md-0">
                    <input type="text" required maxlength="20" id="first_name" />
                    <label for="">First Name</label>
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="input-group">
                  <div class="form-float mt-0">
                    <input type="text" required maxlength="20" id="last_name" />
                    <label for="">Last Name</label>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-12">
              <div class="input-group">
                <div class="form-label">
                  <input type="email" required maxlength="50" id="email" style="width: 470px;" />
                  <label for="email">Email</label>
                </div>
              </div>
            </div>
            <div class="row mb-2">
              <div class="col-md-6">
                <div class="input-group">
                  <div class="form-float mb-3 mb-md-0">
                    <input class="control" required id="password" type="password" maxlength="12" id="password" />
                    <label for="">Password</label>
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="input-group">
                  <div class="form-float mt-0">
                    <input class="control" required id="confirmpassword" type="password" maxlength="12" />
                    <label for="">Confirm Password</label>
                  </div>
                </div>
              </div>
            </div>

            <div class="remember">
              <label><input type="checkbox" id="checkbox" /> I agree to the terms & conditions</label>
            </div>
            <button class="btn" id="register">Sign Up</button>
            <div class="sign-link">
              <p>Already have an account? <a href="login.php" class="signIn-link">Sign In</a></p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>
  <script>
    $("#register").on("click", function () {
      if (
        $("#first_name").val() != "" &&
        $("#last_name").val() != "" &&
        $("#password").val() != "" &&
        $("#confirmpassword").val() != "" &&
        $("#email").val() != "" &&
        $("#password").val() == $("#confirmpassword").val() &&
        $("#checkbox").is(":checked")
      ) {
        $.ajax({
          url: "cek_login.php",
          type: "POST",
          data: { firstname: $("#first_name").val(), lastname: $("#last_name").val(), password: $("#password").val(), email: $("#email").val(), function: "register" },
          success: function (data) {
            Swal.fire({
              title: "Register",
              text: data,
              icon: "success",
              confirmButtonColor: "#3085d6",
              confirmButtonText: "OK",
            }).then((result) => {
              if (result.isConfirmed) {
                window.location.href = "login.php";
              }
            });
          },
          error: function (error) {
            alert(error);
          },
        });
      } else if ($("#first_name").val() == "") {
        Swal.fire({
          title: "WRONG",
          text: "First Name",
          icon: "warning",
          confirmButtonColor: "#3085d6",
          confirmButtonText: "OK",
        });
      } else if ($("#last_name").val() == "") {
        Swal.fire({
          title: "WRONG",
          text: "Last Name",
          icon: "warning",
          confirmButtonColor: "#3085d6",
          confirmButtonText: "OK",
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
      } else if ($("#confirmpassword").val() == "") {
        Swal.fire({
          title: "WRONG",
          text: "Confirm Password",
          icon: "warning",
          confirmButtonColor: "#3085d6",
          confirmButtonText: "OK",
        });
      } else if (!$("#checkbox").is(":checked")) {
        Swal.fire({
          title: "WRONG",
          text: "Check The Box",
          icon: "warning",
          confirmButtonColor: "#3085d6",
          confirmButtonText: "OK",
        });
      } else if ($("#confirmpassword").val() != $("#password").val()) {
        Swal.fire({
          title: "WRONG",
          text: "Confirm Password",
          icon: "warning",
          confirmButtonColor: "#3085d6",
          confirmButtonText: "OK",
        });
      }
    });
  </script>
</html>
