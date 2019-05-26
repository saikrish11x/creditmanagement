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
<style>
body{
      font-family: sans-serif;
        font-size: 20pt;

}

a{
    display:block;
    width:466px;
    height:25px;
    padding:10px;
    text-align:center;
    border-radius:20px;
    border-style: solid;
    background: #49E647;
    border: 5px;
    text-decoration:none;
    font-weight:bold;
    font-size:15px;
} 
#temp{
    border-radius:5px;
    height:20pt;
    border-style: solid;
}
#temp2{
    height:20pt;
    border-style: solid;
}
</style>
</head>
<body>

<center>
<?php
    echo"<h2>Hello ".$name."</h2>";
    ?>    
<h2>Tranfer credits</h2>
    <form action="#" method="post">
        
        Transfer to:
        <select name="to_user" required>
        <option value ="" selected disable hidden>choose here</option>

        <?php
    while($rows =$result->fetch_assoc()){  
        echo "<option value='" . $rows['name'] . "'>" . $rows['name'] . "</option>";

    }
    ?>
      </select>
    <br>
    <br>
    credits <input type="number" name="credits_trans" id="temp" min=0 required >
        <br><br>
        <input type="submit" name="trans" value="Transfer" id="temp2">
    </form>
    
    </body>
    </html>