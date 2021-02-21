<?php
@session_start();
include("connect.php");

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
$destination  = "../../frontend/photos/{$basename}";

move_uploaded_file( $source, $destination );

$sql = "UPDATE users SET  phone='$phone' , address='$address' , password='$passwordenc', image='$basename' WHERE user_id='$userid' ";

$result = mysqli_query($conn, $sql) ;


    // $sql1 = "SELECT * FROM users WHERE user_id = '$userid ";
    // $query1 = mysqli_query($con, $sql1);
    // while($row = mysqli_fetch_array($query1)){
    //     $_SESSION['photo'] = $row['image'];
    // }

    $_SESSION['photo'] = $basename;



mysqli_close($conn);


if($result){
    echo "<script type='text/javascript'>";
    echo "alert(\" บันทึกสำเร็จ \");"; 
    echo "window.location = '../view/index-staff.php'; ";
    echo "</script>";
    }
    else{
    echo "<script type='text/javascript'>";
    echo "alert(\" บันทึกไม่สำเร็จ \");"; 
    echo "window.history.back()";
    echo "</script>";
}


?>