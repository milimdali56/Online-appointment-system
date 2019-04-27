<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Appointment Submit</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="style.css">
    
</head>
<body>
<div class="res">
    <div class="header">
    <h2>Online Appointment System</h2>
    <hr>
    </div>
<?php
include('database.php');

if(isset($_POST['name'])){
    $uname = $_POST['name'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];
    $lnum = $_POST['license'];
    $enum = $_POST['engine'];
    $date = $_POST['date'];
    $mec = $_POST['mechanic'];
    // echo $uname." ".$address." ".$phone." ".$lnum." ".$enum." ".$date." ".$mec;
    $appCheck = "SELECT * FROM `appointment` WHERE name = '$uname' and appoint_date = '$date' ";
    $r1= mysqli_query($con,$appCheck);

    if($r1->num_rows>0){
        ?>
        <div class="warning">
            <h4><?php echo $uname." already have an appointment on ".$date;?></h4>
        </div>
        <?php
    }else{
        $checkMec = "SELECT * FROM `aCount` WHERE mName = '$mec' and adate ='$date' " ;
        $r2 = mysqli_query($con,$checkMec);

        if($r2->num_rows>0){
            $a = mysqli_fetch_object($r2);
            $count = $a->appointmentNums;
            $m = $a->mName;
            $d = $a->adate;

            // echo $m." already has ".$count." appoint on ".$d.".<br>";
            if($count<4){
                $enter= "INSERT INTO `appointment`(`name`, `address`, `phone_num`, `license_num`, `eng_num`, `appoint_date`, `mechanic`) 
                VALUES ('$uname','$address','$phone','$lnum','$enum','$date','$mec')";
                $r3 = mysqli_query($con,$enter);
                // var_dump($r3);
                // data entered??
                if($r3){
                    echo "<div class='done'>
                    <h4>Appointment is made sucessfully.</h4><br>
                    </div>";
                }else{
                    echo "<div class='fail'>
                    <h4>Appointment is not made.</h4><br>
                    </div>";
                }
                $count = $count+1;
                // appointment num insrease for mec
                $i = "UPDATE `aCount` SET `appointmentNums`='$count' WHERE mName = '$mec' and adate ='$date' ";
                $r4 = mysqli_query($con,$i);

                if($r4){
                    echo "<div class='done'>
                    <h4>Appointment number is inscreased</h4><br>
                    ";
                }else{
                    echo "<div class='fail'>
                    <h4>Appointment number is not inscreased</h4><br>
                    </div>";
                }
                // mech appointment<4 ??
            }else{
                echo "<div class='info'>".$mec." is booked for today. Select another appointment date for ".$mec." or just make appointment with another mechanic. </div>";
            }
        }else{ 
            $enter= "INSERT INTO `appointment`(`name`, `address`, `phone_num`, `license_num`, `eng_num`, `appoint_date`, `mechanic`) 
                VALUES ('$uname','$address','$phone','$lnum','$enum','$date','$mec')";
                $r3 = mysqli_query($con,$enter);

                // data entered??
                if($r3){
                    echo "<div class='done'>
                    <h4>Appointment is made sucessfully.</h4><br>
                    </div>";
                }else{
                    echo "<div class='fail'>
                    <h4>Appointment is not made.</h4><br>
                    </div>";
                }
                $count = 1;
                // echo "Current appoint num = ".$count."<br>";
                // appointment num insrease for mec
                $i = "INSERT INTO `aCount`(`mName`, `adate`, `appointmentNums`) 
                VALUES ('$mec','$date','$count')";
                $r4 = mysqli_query($con,$i);

                if($r4){
                    echo "<div class='done'>
                    <h4>1st appointment for ".$mec.".</h4><br>
                    </div>";
                }else{
                    echo "<div class='fail'>
                    <h4>Appointment not placed.</h4><br>
                    </div>";
                }
        }//on that date mech has no appointment
    }



}
?>
 
    <a href="index.php"><button>Make new Appointment</button> </a>
       
    
    </div>
    
</body>
</html>