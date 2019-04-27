<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Update</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="style.css">
</head>
<body>
<?php
include ('database.php');

$userName = $_POST['name'] ;
$pmech = $_POST['mech'] ;
$pdate = $_POST['date'] ;
// echo $pmech." ".$pdate;

$m ="SELECT * FROM `aCount` WHERE mName = '$pmech' and adate ='$pdate'";
$r5 = mysqli_query($con,$m);

$row1 = mysqli_num_rows($r5);

    if($row1>0){
        $a1 = mysqli_fetch_object($r5);
        $count1 = $a1->appointmentNums;
        // echo $count1;
        $count1 = $count1-1;
        $upd = "UPDATE `aCount` SET `appointmentNums`='$count1' WHERE mName = '$pmech' and adate ='$pdate' ";
        $r6 = mysqli_query($con,$upd);
        // if $r5
        if($r6){
        echo "<div class='alertp'>
        <h4>Previous appointment is updated</h4><br>
        ";
        }else{
            echo "<div class='alertd'>
            <h4>Previous appointment is not updated</h4><br>
                </div>";
                
            }
        // if $r5
    }

?>

<?php
if(isset($_POST['update'])){
    $carRegNum = $_POST['id'];
    $clientName = $_POST['user'];
    $phone = $_POST['phone'];
    $appDate = $_POST['date'];
    $mech = $_POST['mechanic'];

    $checkMec = "SELECT * FROM `aCount` WHERE mName = '$mech' and adate ='$appDate' " ;
    $r2 = mysqli_query($con,$checkMec);

    $row = mysqli_num_rows($r2);
    // var_dump($row);

    if($row>0){
        $a = mysqli_fetch_object($r2);
        $count = $a->appointmentNums;

        if($count<4){
            $enter= "UPDATE `appointment` SET `appoint_date`='$appDate',`mechanic`='$mech' WHERE name ='$clientName' and a_id='$carRegNum' ";
            $r3 = mysqli_query($con,$enter);
            // if $r3
            if($r3){
                echo "<div class='done'>
                <h4>Appointment date and mechanic is changed sucessfully.</h4><br>
                </div>";
            }else{
                echo "<div class='fail'>
                <h4>Appointment date and mechanic is not made.</h4><br>
                </div>";
            } 
            // if $r3

            $count = $count+1;
            // appointment num insrease for mec
            $i = "UPDATE `aCount` SET `appointmentNums`='$count' WHERE mName = '$mech' and adate ='$appDate' ";
            $r4 = mysqli_query($con,$i);
            // if $r4
            if($r4){
                echo "<div class='done'>
                <h4>Appointment is updated</h4><br>
                </div>";
                ?>
            <a href="home.php">Appointments</a>
            <?php
            die;
            }else{
                echo "<div class='fail'>
                <h4>Appointment is not updated</h4><br>
                </div>";
                ?>
            <a href="home.php">Appointments</a>
            <?php
            die;
            }
            // if $r4
            

            
        }else{
            echo "<div class='info'>".$mech." is booked for ".$appDate.". Select another appointment date for ".$mech." or just make appointment with another mechanic. </div>";
            ?>
            <a href="home.php">Appointments</a>
            <?php
            die;
        }
    }else{
        $e= "UPDATE `appointment` SET `appoint_date`='$appDate',`mechanic`='$mech' WHERE name ='$clientName' and a_id='$carRegNum' ";
        $r7 = mysqli_query($con,$e);
        // if $r7
        if($r7){
            echo "<div class='done'>
            <h4>Appointment date and mechanic is changed sucessfully.</h4><br>
            </div>";
        }else{
            echo "<div class='fail'>
            <h4>Appointment date and mechanic is not made.</h4><br>
            </div>";
        } 
        // if $r7

        $new = "INSERT INTO `aCount`(`mName`, `adate`, `appointmentNums`)VALUES ('$mech','$appDate',1)";
        $r5 = mysqli_query($con,$new);

        if($r5){
            echo "<div class='done'>
                <h4>Mechanic's appointment table is updated sucessfully.</h4><br>
                </div>";
                ?>
        <a href="home.php">Appointments</a>
        <?php
        die;
            }else{
                echo "<div class='fail'>
                <h4>Mechanic's appointment table is not updated sucessfully.</h4><br>
                </div>";
                ?>
            <a href="home.php">Appointments</a>
            <?php
            die;
        }
    }
    // $row>0
  
    
}
?>
   <div class="container">     
        <div class="head">
           <b> <h2>Edit appointment info</h2> </b>        
        </div>
        <div class="edit">    
            <?php
            $q = " SELECT * FROM `appointment` WHERE name ='$userName' ";
            $result = mysqli_query($con, $q);
            $rows = mysqli_num_rows($result);

            if($rows > 0){
                while($app = mysqli_fetch_array($result)){
            ?> 
            <form action="update.php" method="POST" >
            <tr >
                <td> Car registration number </td><br>
                <td><input type="text" name="id" value="<?php echo $app['a_id'] ;?>" readonly> </td><br>
                <td> Client Name </td><br>
                <td><input type="text" name="user" value="<?php echo $app['name'] ;?>" readonly> </td><br>
                <td> Phone Number </td><br>
                <td><input type="text" name="phone" value="<?php echo $app['phone_num'] ;?>" readonly> </td><br>
                <td>Appointment date</td><br>
                <td><input type="date" name="date" value="<?php echo $app['appoint_date'] ;?>"> </td><br>
                <td>Mechanic</td><br>
                <td>
                <?php
                $q = "SELECT * FROM `mechanic` order by id asc";
                $res = mysqli_query($con, $q);
    
                $row = mysqli_num_rows($res);
    
                $opt = "<select class='form-control' name='mechanic' >";

                        if($row > 0){
                            while($appoint = mysqli_fetch_array($res)){
                            $opt.=" <option value='{$appoint['name']}' > {$appoint['name']} </option>";
                            }
                        }
                        $opt .= "</select>";
                        echo $opt 
                        ?> 
                        </td>
                <br>
                <br>

                    <tr>
                        <td><input type="submit" name="update" value="Update"></td>
                    </tr>
                    </tr>
                </form>
                        <?php
                }
            }
                        ?>
        </div>
        <div class="mech">
            
        </div>

</div>
</body>
</html>