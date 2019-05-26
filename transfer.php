<?php
       require_once('dbconnect.php');
$name = $_GET['name'];
$query = "select * from userdetails where name='" . $name . "'";
$result = mysqli_query($conn,$query);
$row = mysqli_fetch_array($result);
?>
<html>
<head>
<title>user</title>
<style>
a{
    display:block;
    width:115px;
    height:25px;
    padding:10px;
    text-align:center;
    border-radius:5px;
    background: #49E647;
    text-decoration:none;
    font-weight:bold;
}

</style>
</head>
<body>
<center>
       <?php
    echo "<h1> Welcome " .$name."</h1>";  
    echo "<h4> Your current credits are " .$row['currentcredit']."<h4>";
    echo "<h4> email id is " .$row['email']."<h4>";
    echo "<a href=transfercred.php?name=" . $name. ">Transfer credits</a>";
    ?>
    <br>
    <br>
    <a href="transtable.php">Transfer deatils</a>
    </center>
    
    </body>
</html>