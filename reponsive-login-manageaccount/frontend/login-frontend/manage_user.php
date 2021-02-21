<?php
@session_start();
include("connection.php");

?>



<?php 

$userid = $_POST["user_id"];
$phone = $_POST["phone"];
$address = $_POST["address"];
$password = $_POST['password'];
$passwordenc = md5($password);

//file
$filename = uniqid() . "-" . time(); 
$extension = pathinfo( $_FILES["image"]["name"], PATHINFO_EXTENSION ); 
$basename = $filename . "." . $extension; 
$source = $_FILES["image"]["tmp_name"];
$destination  = "./photos/{$basename}";

move_uploaded_file( $source, $destination );

$sql = "UPDATE users SET  phone='$phone' , address='$address' , password='$passwordenc', image='$basename' WHERE user_id='$userid' ";

$result = mysqli_query($conn, $sql) ;

mysqli_close($conn);


if($result){
    echo "<script type='text/javascript'>";
    echo "alert(\" บันทึกสำเร็จ \");"; 
    echo "window.location = 'ManageAccount.php'; ";
    echo "</script>";
    }
    else{
    echo "<script type='text/javascript'>";
    echo "alert(\" บันทึกไม่สำเร็จ \");"; 
    echo "window.history.back()";
    echo "</script>";
}
?>
