<html>
<head>
<title>tranfer records</title>
<style>
table{
    width:50%;
    height:60%;
    font-size: 15pt;
    text-align:center;
}
th{
    background:#FF862B;
}

</style>
</head>
<body>
<center>
    <h1>transfer log details</h1>
    <br>
    <br>
    <table border=1>
    <thead>
    <tr>
    <th>s.no</th>
    <th>from user</th>
    <th>to user</th>
    <th>credits transfered</th>
    </tr>
    </thead>
    <?php
    require_once('dbconnect.php');
    $sql="select * from transfer ";
    $result=mysqli_query($conn,$sql);
    $i=1;
    while($row=mysqli_fetch_array($result))
    {
        echo "<tr>";
        echo "<td>" . $i . "</td>";
        echo "<td>" . $row['from_user'] . "</td>";
        echo "<td>" . $row['to_user'] . "</td>";
        echo "<td>" . $row['credit_tran'] . "</td>";
        echo "</tr>";
        ++$i;
    }
    ?>
    </table>
    </center>
</body>
</html>