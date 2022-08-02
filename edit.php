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
    <h1>Hotel Front Desk System (edit)</h1>
    <?php include "navigator.php" ?>
    
    <br>

<table>
    <thead>
        <th>customerCheckInNum</th>
        <th>deskNum</th>
        <th>dates</th>
        <th>paymentType</th>
        <th>customerName</th>
    </thead>


    <tbody>
        <?php
        $conn = OpenCon();
        $sql = "SELECT * FROM customerCheckinOut";
        $result = $conn->query($sql);

        if ($result) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
              echo "<tr>";
              echo "<td>".$row["customerID"]."</td>";
              echo "<td>".$row['deskNum']."</td>";
              echo "<td>".$row['dates']."</td>";
              echo "<td>".$row['paymentType']."</td>";
              echo "<td>".$row['customerName']."</td>";
              echo "<td>
                <a href='update.php?customerID=".$row['customerID']."'>Update</a><br>
                <a onclick='confirmDelete();' href='delete.php?customerID=".$row['customerID']."'>Delete</a><br>";
              echo "</tr>";
            }
          } else {
            echo "0 results";
          }

        ?>

    </tbody>
</table>
          <br>
          <a href="index.php">Home</a>

<script>
  let confirmDelete = ()=>{
    if(!confirm('Note: Not recoverable! Are you sure to delete?')){
      event.preventDefault();
    }
  }
</script>

</body>
</html>