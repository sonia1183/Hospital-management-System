<?php

$conn=mysqli_connect("localhost:3306", "root", "", "dbhms");
if (!$conn) {
    die("Database Connect Error");
}
$name=$_POST['name'];
$dob=$_POST['dob'];
$mail=$_POST['mail'];
$uname=$_POST['uname'];
$pass=$_POST['pass'];
$rpass=$_POST['repass'];
// $role=$_POST['n1'];
if ($pass==$rpass) {
    $sql="INSERT INTO patient (name,dob,mail,uname,password) VALUES ('$name','$dob','$mail','$uname','$pass')";

    if (mysqli_query($conn, $sql)) {
        echo"<script type='text/javascript'>window.alert('Successfully Completed');window.location='/Hospital-Management-System/index.html';</script>";
    } else {
        echo"<script type='text/javascript'>window.alert('Something went wrong,Please try again after some time');window.location='/Hospital-Management-System/signup/SignUpAsPatient.html';</script>";
    }
} else {
    echo"<script type='text/javascript'>window.alert('Password Does Not Match,Please Try Again');window.location='/Hospital-Management-System/signup/SignUpAsPatient.html';</script>";
}
mysqli_close($conn);
?>



