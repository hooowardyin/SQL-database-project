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
    <h1>Hotel Front Desk System (division)</h1>
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
        <th>customerCheckInNum</th>
        <th>customerName</th>
    </thead>

    <tbody>
        <?php
            $sql = "SELECT customerID, customerName from customerCheckinOut
            WHERE customerID = 
            (SELECT DISTINCT customerID FROM visit as sx
            WHERE NOT EXISTS (
            (SELECT Name FROM amenities as p )
            EXCEPT
            (SELECT amenityName FROM visit as sp WHERE sp.customerID = sx.customerID ) ));";
        
            $conn = OpenCon();
        
        
            $result = $conn->query($sql);
        
            if ($result) {
                // output data of each row
                while($row = $result->fetch_assoc()) {
                  echo "<tr>";
                  echo "<td>".$row['customerID']."</td>";
                  echo "<td>".$row['customerName']."</td>";
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
<card>find the customer who visited all the amenities (division)</card>


</form>
    <a href="index.php">Home</a>

<?php  } ?>

</body>
</html>