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
    <h1>Hotel Front Desk System (join)</h1>
    <?php include "navigator.php" ?>
    

    <h3>Building_FrontDesk</3>
<table>

    <thead>
        <th>building</th>
        <th>Floor</th>
    </thead>


    <tbody>
        <?php
        $conn = OpenCon();
        $sql = "SELECT * FROM buildingFrontdesk";
        $result = $conn->query($sql);

        if ($result) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
              echo "<tr>";
              echo "<td>".$row["Building"]."</td>";
              echo "<td>".$row["Floor"]."</td>";
              // echo "<td>
              //   <a href='update.php?customerID=".$row['customerID']."'>Update</a><br>
              //   <a onclick='confirmDelete();' href='Delete.php?customerID=".$row['customerID']."'>Delete</a><br>";
              echo "</tr>";
            }
          } else {
            echo "0 results";
          }

        ?>

    </tbody>
</table>

<h3>FrontDesk</3>
<table>
    
    <thead>
        <th>deskNum</th>
        <th>building</th>
    </thead>


    <tbody>
        <?php
        $conn = OpenCon();
        $sql = "SELECT * FROM FrontDesk";
        $result = $conn->query($sql);

        if ($result) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
              echo "<tr>";
              echo "<td>".$row["deskNum"]."</td>";
              echo "<td>".$row['Building']."</td>";
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

    <h4></h4>
    <?php
        if(isset($_POST['button'])){
            $sql = "SELECT FrontDesk.Building,FrontDesk.deskNum, buildingFrontdesk.Floor
            FROM FrontDesk
            INNER JOIN buildingFrontdesk ON FrontDesk.Building = buildingFrontdesk.Building";

            $conn = OpenCon();
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                echo "<table><tr><th class='border-class'>building</th>
                <th class='border-class'>deskNum</th>
                <th class='border-class'>Floor</th>";

           
                // output data of each row
                while($row = $result->fetch_assoc()) { echo
                "<tr><td class='border-
           class'>".$row["Building"]."</td><td
           class='border-
           class'>".$row["deskNum"]."</td><td
           class='border-
           class'>".$row["Floor"]."</td></tr>";
           }
                echo "</table>";
           } else {
           echo "0 results"; }
           CloseCon($conn);
        }
    ?>

    <form method="post">
        <br>
        <card>show the height of the buildings where each front_dest located</card>
        <br><br>
        <input type="submit" name="button"
            value="join"/>
    </form>

    <a href="index.php">Home</a>



</body>
</html>