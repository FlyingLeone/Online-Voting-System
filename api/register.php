<?php

include("connect.php");

$name = $_POST['name'];
$mobile = $_POST['mobile'];
$password = $_POST['password'];
$cpassword = $_POST['cpassword'];
$Address = $_POST['Address'];
$image = $_FILES['photo']['name'];
$tmp_name = $_FILES['photo']['tmp_name'];
$role = $_POST['role'];

if ($password== $cpassword) {
    move_uploaded_file($tmp_name, "../uploads/$image");
    $insert = mysqli_query($connect, "INSERT INTO user (name, mobile, password, Address, photo, role, status, votes) 
    VALUES ('$name', '$mobile', '$password', '$Address', '$image', '$role', 0, 0)");

    if ($insert) {
        echo '
          <script>
             alert("Registration Successfull");
             window.location = "../";
          </script>
         ';
    }
    else {
        echo '
          <script>
             alert("Sorry! It seems some error has occured!");
             window.location = "../routes/register.html";
          </script>
         ';
    }
}
else {
    echo '
          <script>
             alert("password & confirm password does not match");
             window.location = "../routes/register.html";
          </script>
         ';

}


?>