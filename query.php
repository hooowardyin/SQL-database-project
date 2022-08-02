<?php
include 'connect.php';
$conn = OpenCon();
$sql = "SELECT *
FROM customerCheckinOut";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
     echo "<table><tr><th class='border-class'>customerID</th>
     <th class='border-class'>deskNum</th>
     <th class='border-class'>dates</th>
     <th class='border-class'>paymentType</th>
     <th class='border-class'>customerName</th></tr>";

     // output data of each row
     while($row = $result->fetch_assoc()) { echo
     "<tr><td class='border-
class'>".$row["customerID"]."</td><td
class='border-
class'>".$row["deskNum"]."</td><td
class='border-
class'>".$row["dates"]."</td><td
class='border-
class'>".$row["paymentType"]."</td><td
class='border-
class'>".$row["customerName"]."</td></tr>";
}
     echo "</table>";
} else {
echo "0 results"; }
CloseCon($conn);
?>