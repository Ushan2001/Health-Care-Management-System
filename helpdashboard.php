<?php
include 'connect.php';
session_start();
?>

<?php
if (isset($_SESSION['id'])) {
    $id = $_SESSION['id'];
    $sql2 = "SELECT * FROM help WHERE id = '$id';";
    $result3 = mysqli_query($connect, $sql2);

    if ($result3) {
        $row = mysqli_fetch_assoc($result3);

        $id = $row['id'];
        $fullname = $row['fullname'];
        $phone = $row['phone'];
        $address = $row['address'];
        $email = $row['email'];
        $reasion = $row['reasion'];
        
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />

    <title>Title</title>

</head>

<body>

    <img src="images/profile.png" id="m1">
 <br> <br> 
        <img src="images/profile.png" id="m2">

        <br> 
    <div id="container">
        <nav>
            <ul>
                <li><a href="#">HOME</a></li>
                <li>
                    <a href="#">Contact US</a>
                </li>
                <li>
                    <a href="#"  class="active" target="_blank">PLANS</a>
                    <ul>
                        <li><a href="#" target="_blank">User Account</a></li>
                        <li><a href="#" target="_blank">Package</a></li>
                        <li><a href="#" target="_blank">Privacy  & Policy </a></li>
                        <li><a href="#" target="_blank">Terms & Condition </a></li>
                        <li><a href="#" target="_blank">Facility </a></li>
                    </ul>
                </li>
                <li CLASS="sign"><a CLASS="sign"href="#">SIGNIN</a></li>
                <li CLASS="sign"><a  CLASS="sign"href="#">SIGNUP</a></li>
            </ul>
        </nav><br>


        <fieldset style="width: 700px; background-color: #f2f2f2;">

            <legend style="text-align:center"><b>Help Details</b></legend><br><br>

        <form action="#" method="POST">
<center>
        Full Name :
        <input type="text" name="fullname" placeholder="Enter your name" value="<?php if (isset($fullname)) { echo $fullname; } ?>" disabled><br><br>

        Phone Number :
        <input type="text" name="phone" placeholder="Enter your phoneNumber"value="<?php if (isset($phone)) { echo $phone; } ?>" disabled><br><br>

        Address :
        <input type="text" name="address" placeholder="Enter your address"value="<?php if (isset($address)) { echo $address; } ?>" disabled><br><br>

        Email:
        <input type="text" name="email" placeholder="Enter your email" value="<?php if (isset($email)) { echo $email; } ?>" disabled><br><br>
        
        Reasion :
        <input type="text" name="reasion" placeholder="Enter your reasion" value="<?php if (isset($reasion)) { echo $reasion; } ?>" disabled><br><br>

        </center>

        <button type="submit" name="delete" class="formbold-btn formbold-btn-primary formbold-btn-lg">Delete</button><br><br>


</form>


</fieldset>


<footer>
    <div class="footer" >
        <button id="about">Chat With US</button>
        <b id="contact">Contact us<b>
        <br>
        <div id="icon" >
        <i id="face" class="fa fa-facebook"></i>
        <i id="what"class="fa fa-whatsapp" ></i>
        <i id="insta" class="fa fa-instagram"></i>
        </div>
    </div>
</footer>


</body>
</html>

<?php
if (isset($_POST['delete'])) {
    $id = $_SESSION['id'];

    $deletesql = "DELETE FROM help WHERE id = $id;";
    $delete = mysqli_query($connect, $deletesql);
    session_destroy();
    header("location:helpdashboard.php");
}

mysqli_close($connect);
?>