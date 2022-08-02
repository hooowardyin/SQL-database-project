<?php
include "connect.php";
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
        <h1>Hotel Front Desk System (aggre)</h1>
        <?php include "navigator.php" ?>
        
        <br>
        <table>
            <thead>
                <th>roomNumer</th>
                <th>floorNumer</th>
                <th>Size</th>
                <th>Price</th>
            </thead>


            <tbody>
                <?php
                    $conn = OpenCon();

                    $sql = "SELECT * FROM hotelRoom
                    where Price = (SELECT MAX(Price) FROM hotelRoom)";
                    $result = $conn->query($sql);

         

                    if ($result->num_rows > 0) {
                        // output data of each row
                        while($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>".$row["roomNumber"]."</td>";
                            echo "<td>".$row['Floor']."</td>";
                            echo "<td>".$row['Size']."</td>";
                            echo "<td>".$row['Price']."</td>";
                            // echo "<td>
                            //   <a href='update.php?customerID=".$row['customerID']."'>Update</a><br>
                            //   <a onclick='confirmDelete();' href='Delete.php?customerID=".$row['customerID']."'>Delete</a><br>";
                            echo "</tr>";
                        }
                    } 
                    else {
                        echo "0 results";
                    }

                ?>

            </tbody>
        </table>

<br><br>
<card>find the record of the most expensive room</card>
<br><br>
        <a href="index.php">Home</a>
    </body>
</html>