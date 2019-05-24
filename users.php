<html>
<head>
<title>users</title>
</head>    
<body>
    <a href="home.php">&lt; Back</a> 
 <center>
 <h1>list of users</h1>
 <br><br>

        <table border=5 >
        <thead>
        <tr>
        <th>s.no</th>
        <th>name</th>
        <th>email</th>
        <th>credits</th>
        </tr>
        </thead> 
    <?php
        
           require_once('dbconnect.php'); 

           $sql="select * from userdetails order by name";
           $result=mysqli_query($conn,$sql);

                $i=1;
                while($row = mysqli_fetch_array($result)) {
                    echo "<tr>";
                    echo "<td>" . $i . "</td>";
                    echo "<td><a href=transfer.php?name=" . $row['name'] . ">". $row['name'] ."</a></td>";
                    echo "<td>" . $row['email'] . "</td>";
                    echo "<td>" . $row['currentcredit'] . "</td>";
                    echo "</tr>";
                    ++$i;
                }
            ?>
        
        <a href="transtable.php">transfer deatils</a>
        
        </table>
 </center>
</body>
</html>