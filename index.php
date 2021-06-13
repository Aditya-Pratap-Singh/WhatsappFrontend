
<?php
if(isset($_POST['name'])){
  $server = "localhost";
  $username = "root";
  $password = "";

  $con = mysqli_connect($server, $username,$password);
  if(!$con){
    die("Connection to this database failed due to" . mysqli_connect_error());
  }
  //echo "Success connecting to db";
/*
    $fileName='C:\Users\Dell\Downloads\FormData (2).csv';
    $fw = fopen($fileName, 'a');
    $cells = array($_POST['name'], $_POST['number']);
    $row = join(",", $cells);
    fwrite($fw, $row."\n");
    fclose($fw);
    header('Location: C:\Users\Dell\Desktop\Tech Tomatoes\WhatsappSenderFrontend\index.html');
*/
$name = $_POST['name'];
$phone= $_POST['phone'];
$sql = "INSERT INTO `contacts`.`cinfo` (`name`, `phone`, `dt`) VALUES ('$name', '$phone', current_timestamp());";
//echo $sql;

if($con->query($sql)  == true){
    echo "Successfully inserted";
}
else{
    echo "Error: $sql <br> $con->error";
}

$con->close();
}
    ?> 

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Whatsapp Automator</title>
</head>

<body>
    <div>
        <form action="index.php" method="POST">
            <input type="text" name="name" id="name" placeholder="Enter the name">
            <input type="phone" name="phone" id="phone" placeholder="Enter the phone number">
            <button class="btn">Submit</button>

        </form>

    </div>

</body>

</html>
