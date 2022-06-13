<?php
$conn=mysqli_connect("localhost:3306","root","","dbhms");
if(!$conn){
die("Database Connect Error");
}

$date=$_POST['date'];
$time=$_POST['time'];
$username=$_POST['username'];
$doctorname=$_POST['doctor_name'];
$disease=$_POST['disease'];

$sql="INSERT INTO appointment (date,time,username,doctorname,disease) VALUES ('$date','$time','$username','$doctorname','$disease')";

if(mysqli_query($conn,$sql)){
    echo"<script type='text/javascript'>window.alert('successfully completed');window.location='patient_dashboard.php';</script>";
}
else{
    echo"<script type='text/javascript'>window.alert('Something Went Wrong,Please Try Again After Sometime!');window.location='patient_dashboard.php';</script>";
}
mysqli_close($conn);
?>



