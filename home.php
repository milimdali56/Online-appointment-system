<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>admin panel</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="style.css">
</head>
<body>
<?php
include('database.php');
?>
<div class="container-fluid">
 <div>
  <h1>Appointment record</h1>
  <br>
  <table id="t01">
  <tr>
    <th>Client Name</th>
    <th>Phone Number</th> 
    <th>Car registration number</th>
    <th>Appointment date</th>
    <th>Mechanic Name</th>
    <th>Edit</th>
  </tr>
<?php
$q="SELECT * FROM `appointment` ";
$r=mysqli_query($con,$q);

if(mysqli_num_rows($r)>0){
    while($a = mysqli_fetch_object($r)){
        ?>
        <tr>
            <td><?php echo $a->name; ?></td>
            <td><?php echo $a->phone_num; ?></td>
            <td><?php echo $a->a_id; ?></td>
            <td><?php echo $a->appoint_date; ?></td>
            <td><?php echo $a->mechanic; ?></td>
            <td>
                <form action ="update.php" method="POST"> 
                    <input type="hidden" name="name" value= "<?php echo $a->name; ?>">
                    <input type="hidden" name="mech" value= "<?php echo $a->mechanic; ?>">
                    <input type="hidden" name="date" value= "<?php echo $a->appoint_date; ?>">                    
                    <input type="submit" value="Edit">
                </form>
            </td>

        </tr>
        <?php
    }
}
?>
</table>

</body>
</html>