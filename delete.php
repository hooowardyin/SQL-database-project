<?php
include "connect.php";
$message="";
$flag=FALSE;
$error=TRUE;


if(isset($_GET['customerID'])){
     $customerID = $_GET['customerID'];
     $sql = "DELETE FROM customerCheckinOut WHERE customerID = '$customerID'";

    $conn = OpenCon();
    $result = $conn->query($sql);

    if($result){
        $message="successfully delete! \n";
        $flag=TRUE;
    }
    else{
        $message="Oops! something wrong!";
        $error = TRUE;
        echo $message;
    }
}
else{
    $message = "Oops. Please <a href='select.php'>SELECT</a> a customer to delete.";
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
    <h1>Hotel System (update)</h1>
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




    <a href="index.php">Home</a>

<?php  } ?>

</body>
</html>