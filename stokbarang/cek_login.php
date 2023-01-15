<?php
$conn = mysqli_connect("localhost", "root", "", "stokbarang");
if ($_POST['function'] == 'register') {
    $query = mysqli_query($conn, "insert into login (first_name, last_name, password, email) values('{$_POST['firstname']}','{$_POST['lastname']}','{$_POST['password']}','{$_POST['email']}')");
    if($query) {
        echo "SUCCESS";
    } else {
        echo "FAILED";
    }
}
if ($_POST['function'] == 'login') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    //mencocokan dengan database yang dibuat.... ada atau nggak tuh
    $cekdatabase = mysqli_query($conn, "SELECT * FROM login where email='{$email}' and password='{$password}'");
    //hitung jumlah data
    $hitung = mysqli_num_rows($cekdatabase);

    if ($hitung > 0) {
        session_start();
        $_SESSION['log'] = 'True';
        echo "SUCCESS";
    } else {
        echo "FAILED";
    };
}
?>