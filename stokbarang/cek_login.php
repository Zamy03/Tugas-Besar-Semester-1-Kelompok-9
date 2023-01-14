<?php
$conn = mysqli_connect("localhost", "root", "", "stokbarang");
$query = mysqli_query($conn, "insert into login (first_name, last_name, password, email) values('{$_POST['firstname']}','{$_POST['lastname']}','{$_POST['password']}','{$_POST['email']}')");
if($query) {
    echo "SUCCESS";
} else {
    echo "FAILED";
}
?>