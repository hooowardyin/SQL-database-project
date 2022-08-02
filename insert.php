<?php
include "connect.php";
$message="";
$flag=FALSE;
$error=TRUE;



if(isset($_POST['submit'])){
    $customerID = $_POST['customerID'];
    $deskNum = $_POST['deskNum'];
    $dates = $_POST['dates'];
    $paymentType = $_POST['paymentType'];
    $customerName = $_POST['customerName'];

    $sql = "INSERT INTO customerCheckinOut 
    VALUES ('$customerID','$deskNum','$dates','$paymentType','$customerName')
    ";

    $conn = OpenCon();


    $result = $conn->query($sql);

    if($result){
        $message="successfully inserted! \n";
        $flag=TRUE;
    }else{
        $message="Oops! something wrong!";
        $error = TRUE;
        echo $message;
    }

}


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
    <h1>Hotel Front Desk System (insert)</h1>
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



<form action = "insert.php" method="POST">
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
        <tr>
            <td><input name= "customerID":></td>
            <td><input name= "deskNum":></td>
            <td><input name= "dates":></td>
            <td><input name= "paymentType":></td>
            <td><input name= "customerName":></td>
      
        </tr>
    </tbody>
</table>
<br>
<input type="submit" name="submit">
</form>
    <a href="index.php">Home</a>

<?php  } ?>

</body>
</html>