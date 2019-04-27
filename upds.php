<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Update</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="style.css">
    <script src="main.js"></script>
</head>
<body>
<?php
include ('database.php');
if(isset($_POST['update'])){
    // var_dump ($_POST);
    // die;
    $carRegNum = $_POST['id'];
    $clientName = $_POST['user'];
    $phone = $_POST['phone'];
    $appDate = $_POST['date'];
    $mech = $_POST['mechanic'];

    $checkMec = "SELECT * FROM `aCount` WHERE mName = '$mech' and adate ='$appdate' " ;
    $r2 = mysqli_query($con,$checkMec);

    if($r2->num_rows>0){
        $a = mysqli_fetch_object($r2);
        $count = $a->appointmentNums;
        $m = $a->mName;
        $d = $a->adate;

        if($count<4){
            $enter= "UPDATE `appointment` SET `appoint_date`='$appDate',`mechanic`='$mech' WHERE name ='$clientName' and a_id='$carRegNum' ";
            $r3 = mysqli_query($con,$enter);
            
            if($r3){
                echo "<div class='done'>
                <h4>Appointment date and mechanic is changed sucessfully.</h4><br>
                </div>";
            }else{
                echo "<div class='fail'>
                <h4>Appointment date and mechanic is not made.</h4><br>
                </div>";
            }
            $count = $count+1;
            // appointment num insrease for mec
            $i = "UPDATE `aCount` SET `appointmentNums`='$count' WHERE mName = '$mech' and adate ='$appDate' ";
            $r4 = mysqli_query($con,$i);

            if($r4){
                echo "<div class='done'>
                <h4>Appointment is updated</h4><br>
                ";
            }else{
                echo "<div class='fail'>
                <h4>Appointment is not updated</h4><br>
                </div>";
            }
        }else{
            echo "<div class='info'>".$mech." is booked for ".$appDate.". Select another appointment date for ".$mech." or just make appointment with another mechanic. </div>";
        }
    }
  
    
}
?>




</body>
</html>