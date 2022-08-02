<?php
include "connect.php";
$message="";
$flag=FALSE;
$error=TRUE;


if(isset($_GET['customerID'])){
     $customerID = $_GET['customerID'];
}


if(isset($_POST['submit'])){
    $customerID = $_POST['customerID'];
    $deskNum = $_POST['deskNum'];
    $dates = $_POST['dates'];
    $paymentType = $_POST['paymentType'];
    $customerName = $_POST['customerName'];

    $sql = "UPDATE customerCheckinOut 
    SET 
    deskNum = '$deskNum',
    dates = '$dates',
    paymentType = '$paymentType',
    customerName = '$customerName'
    WHERE customerID = '$customerID'";

    $conn = OpenCon();


    $result = $conn->query($sql);

    if($result){
        $message="successfully updated! \n";
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
    <h1>Hotel Front Desk System (update)</h1>
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



<form action = "update.php" method="POST">
<br>
<table>
    <thead>
        <th>customerID</th>
        <th>deskNum</th>
        <th>dates</th>
        <th>paymentType</th>
        <th>customerName</th>
    </thead>


    <tbody>
        <?php
            $sql = "SELECT * FROM customerCheckinOut
            WHERE  customerID = $customerID";
            $conn = OpenCon();
            $result = $conn->query($sql);
            if(!$result){
                die("Oops! something wrong!");
            }
            while($row = $result->fetch_assoc()){
        ?>
            <tr>
                <td><input hidden name = "customerID" value = "<?=$customerID?>">
                <?=$row['customerID']?>
                </td>
                <td><input name= "deskNum" value="<?=$row['deskNum']?>"></td>
                <td><input name= "dates" value="<?=$row['dates']?>"></td>
                <td><input name= "paymentType" value="<?=$row['paymentType']?>"></td>
                <td><input name= "customerName" value="<?=$row['customerName']?>"></td>
        
            </tr>

        <?php } ?>
    </tbody>
</table>
<br>
    <input type="submit" name="submit">

</form>
    <a href="index.php">Home</a>

<?php  } ?>

</body>
</html>