<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index Page</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link rel="stylesheet" href="css/login.css">
    <link rel="stylesheet" href="./font-awesome-4.7.0/css/font-awesome.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
</head>
<body>
    <div class="title">
        <span>Student Result Management System</span>
    </div>

    <div class="main">
        <div class="login">
            <form action="" method="post" name="login">
                <fieldset>
    <legend class="heading">Admin Login</legend>

    <i class="fa-solid fa-user"></i>
    <input type="text" name="userid" placeholder="Email" autocomplete="off">

    <i class="fa-solid fa-lock"></i>
    <input type="password" name="password" placeholder="Password" autocomplete="off">

    <input type="submit" value="Login">
</fieldset>
            </form>    
        </div>
        <div class="search">
            <form action="./student.php" method="get">
                <fieldset>
                    <legend class="heading">For Students</legend>

                    <?php
                        include('init.php');

                        $class_result=mysqli_query($conn,"SELECT `name` FROM `class`");
                            echo '<select name="class">';
                            echo '<option selected disabled>Select Class</option>';
                        while($row = mysqli_fetch_array($class_result)){
                            $display=$row['name'];
                            echo '<option value="'.$display.'">'.$display.'</option>';
                        }
                        echo'</select>'
                    ?>
                    <input type="text" name="rn" placeholder="Roll No">
                    <input type="submit" value="Get Result">
                </fieldset>
            </form>
        </div>
    </div>
<footer>
    <p>© 2026 Student Result Management System</p>
    <p>Developed by Nyasa Patel</p>
</footer>
</body>
</html>

<?php
    include("init.php");
    session_start();
if (isset($_POST["userid"], $_POST["password"])) {

    $username = $_POST["userid"];
    $password = $_POST["password"];

    $sql = "SELECT userid FROM admin_login WHERE userid='$username' and password='$password'";
    $result = mysqli_query($conn, $sql);
    $count = mysqli_num_rows($result);

    if ($count == 1) {
        $_SESSION['login_user'] = $username;
        header("Location: dashboard.php");
    } else {
        echo '<script>alert("Invalid Username or Password");</script>';
    }
}
        
    
?>

