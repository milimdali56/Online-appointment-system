<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>User Panel</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="style.css">
    
</head>
<body>
    <div class="main">
        <h2>Online Appointment System</h2>
        <hr>
        <?php
        include('database.php');
        ?>
        <form action="" method="GET">
            <div class="form-group">
                <label>Appointment date</label>
                <input type="date" name="date" placeholder="" required/>
                <input type="submit" value="Check available mechanics">
            </div>
        </form>
        <br>
        <i style="color: rgb(190, 43, 68);">
            <h4> If a mechanic's appointment number is already 4 then you can't make an appointment with that mechanic.<br> 
            </h4>
        </i>
        <?php
        
        if(isset($_REQUEST['date'])){
            $date = stripslashes($_REQUEST['date']);
            $date = mysqli_real_escape_string($con,$date);
            // var_dump($date);
            $q = "SELECT * FROM `aCount` WHERE adate= '$date' ";
            $r= mysqli_query($con, $q);
            $i=0;
            // var_dump($r);
            // die;
            if ($r->num_rows> 0) {?>
            <div class="table">
                
                <table >
                        <tr>
                            <th>Name</th>
                            <th>Date</th>
                            <th>Appointments</th>
                        </tr>
                <?php
                while($row = mysqli_fetch_object($r)){
                    ?>
                        <tr>
                        <td><?php echo $row->mName;?></td>
                        <td><?php echo $row->adate;?></td>
                        <td><?php echo $row->appointmentNums;?></td>
                    
                    <?php
                    $i++;
                // $mechanic is already occupied on this date $date
                }
                if($i<4){
                    echo "Other mechanics are available on this day. <br>";
                } 
            }else{
                echo "<h3> All mechanics are available on $date.</h3>";
                }
                
            // form ta 
            ?>
            
            </tr>
            </table>
            </div>
            <br>
            <div class="form">
            <div class="title">
            <h3>Make your appointment</h3>
            <hr>
            </div>
             <form action="infosubmit.php" method="POST" class="mt-2">
            <div class="form-group">
                <label>Name</label>
                <input type="text"  class="form-control" name="name" placeholder="Name" required/>
            </div>
            <div class="form-group">
                <label>Address</label>
                <textarea type="text" class="form-control" name="address" size="10" rows="5" required></textarea>
            </div>
            <div class="form-group">
                <label>Phone Number</label>
                <input type="text" class="form-control" name="phone" required/>
            </div>
            <div class="form-group">
                <label>Car License Number</label>
                <input type="text" class="form-control" name="license" placeholder="" required/>
            </div>
            <div class="form-group">
                <label>Car Engine Number</label>
                <input type="text" class="form-control" name="engine" placeholder="" required/>
            </div>
            <div class="form-group">
                <label>Appointment date</label>
                <input type="date" class="form-control" name="date" placeholder="" required/>
            </div>
            <br>
            <div class="form-group">
                <label>Select mechanic</label>
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
            </div>

            <input type="submit" name="submit" value="Make Appointment"/>
        </form>
            <?php
        }
        ?>
        
    </div>
    </div>
</body>
</html>