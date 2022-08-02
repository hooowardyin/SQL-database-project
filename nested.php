<?php
include "connect.php";
$message="";
$flag=FALSE;
$error=TRUE;


?>



<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href = "style.css" rel="stylesheet">
    <title>Document</title>
</head>
<body>
    <h1>Hotel Front Desk System (nested)</h1>
    <?php include "navigator.php" ?>

    

<?php
if($flag){
    echo $message;
    ?>
    <a href="index.php">Home</a>
    <?php
}else{
    if($error){
        echo $message;
    }
?>


<form action = "nested.php" method="POST">

<br>


<table>
    <thead>
        <th>Building</th>
        <th>Number of Customers(count(*))</th>
    </thead>

    <tbody>
        <?php
            $sql = "SELECT Building, COUNT(*) from FrontDesk, customerCheckinOut
            WHERE FrontDesk.deskNum = customerCheckinOut.deskNum
            GROUP BY Building
            HAVING COUNT(*) >= ALL (SELECT COUNT(*) from FrontDesk, customerCheckinOut
            WHERE FrontDesk.deskNum = customerCheckinOut.deskNum
            GROUP BY Building)";
        
            $conn = OpenCon();
        
        
            $result = $conn->query($sql);
        
            if ($result) {
                // output data of each row
                while($row = $result->fetch_assoc()) {
                  echo "<tr>";
                  echo "<td>".$row['Building']."</td>";
                  echo "<td>".$row['COUNT(*)']."</td>";
                  echo "</tr>";
                }
              } else {
                echo "0 results";
              }

        ?>

    </tbody>

</table>
<br>
<br>
<card>find the most popular building( with the most customers check in) (nested)</card>


</form>
    <a href="index.php">Home</a>

<?php  } ?>

</body>
</html>