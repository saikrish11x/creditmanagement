<?php
       require_once('dbconnect.php');
$name = $_GET['name'];
$query = "select * from userdetails where name='" . $name . "'";
$result = mysqli_query($conn,$query);
$row = mysqli_fetch_array($result);

$query = "select name from userdetails where name<>'" . $row['name'] . "'";
$result = mysqli_query($conn,$query);

if(isset($_POST['trans']))
{
    if($_POST['credits_trans']>$row['currentcredit'])
        echo " credits exceeded than your balance credit ".$row['currentcredit']."<br>";
    
    else{
        $sql="update userdetails set currentcredit=currentcredit-'".$_POST['credits_trans']."' 
        where name='".$row['name']."'";
        mysqli_query($conn,$sql);
        $sql="update userdetails set currentcredit=currentcredit+'".$_POST['credits_trans']."' where name='".$_POST['to_user']."'";
        mysqli_query($conn,$sql);
        $sql="insert into transfer values('" .$row['name']."','".$_POST['to_user']."',".$_POST['credits_trans'].")";
        mysqli_query($conn,$sql);
        header("Location:users.php");
    }
}
?>
<html>
<head>
<title>transfer credits</title>
</head>
<body>
    <a href="users.php">&lt Back</a>
    <?php
    echo "<h1> Welcome " .$name."</h1>";  
    echo "<h4> Your current credits are " .$row['currentcredit']."<h4>";
    ?>
    <h2>Tranfer credits</h2>
    <form action="#" method="post">
        credits <input type="number" name="credits_trans" min=0 required >
        <br><br>
        Transfer to:
        <select name="to_user" required>
        <option value =""></option>

        <?php
    while($rows =$result->fetch_assoc()){  
        echo "<option value='" . $rows['name'] . "'>" . $rows['name'] . "</option>";

    }
    ?>
      </select>
    <br>
    <br>
        <input type="submit" name="trans" value="Transfer">
    </form>
</body>
</html>