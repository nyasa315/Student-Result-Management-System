<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/home.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link rel="stylesheet" href="./css/font-awesome-4.7.0/css/font-awesome.css">
    <link rel="stylesheet" type='text/css' href="css/manage.css">
    <title>Dashboard</title>
</head>
<body>
        
    <div class="title">
        <a href="dashboard.php"><img src="./images/logo1.png" alt="" class="logo"></a>
        <span class="heading">
    <i class="fa-solid fa-users"></i>
    Manage Students
</span>
        <a href="logout.php" style="color: white">
    <i class="fa-solid fa-right-from-bracket"></i> Logout
</a>
    </div>

    <div class="nav">
        <ul>
            <li class="dropdown" onclick="toggleDisplay('1')">
                <a href="" class="dropbtn">Classes &nbsp
                    <span class="fa fa-angle-down"></span>
                </a>
                <div class="dropdown-content" id="1">
                    <a href="add_classes.php">Add Class</a>
                    <a href="manage_classes.php">Manage Class</a>
                </div>
            </li>
            <li class="dropdown" onclick="toggleDisplay('2')">
                <a href="#" class="dropbtn">Students &nbsp
                    <span class="fa fa-angle-down"></span>
                </a>
                <div class="dropdown-content" id="2">
                    <a href="add_students.php">Add Students</a>
                    <a href="manage_students.php">Manage Students</a>
                </div>
            </li>
            <li class="dropdown" onclick="toggleDisplay('3')">
                <a href="#" class="dropbtn">Results &nbsp
                    <span class="fa fa-angle-down"></span>
                </a>
                <div class="dropdown-content" id="3">
                    <a href="add_results.php">Add Results</a>
                    <a href="manage_results.php">Manage Results</a>
                </div>
            </li>
        </ul>
    </div>

    <div class="main">
        <form method="GET" style="margin-bottom:20px; text-align:center;">
    <input type="text" name="search" placeholder="🔍 Search by Name or Roll No" style="width:350px; padding:12px; border-radius:10px; border:none;">
    <input type="submit" value="Search">
</form>
        <?php
            include('init.php');
            include('session.php');

            if(isset($_GET['search']) && $_GET['search'] != "")
{
    $search = mysqli_real_escape_string($conn, $_GET['search']);

    $sql = "SELECT name, rno, class_name
FROM students
WHERE name LIKE '%$search%'
OR rno LIKE '%$search%'";
}
else
{
            $sql = "SELECT name, rno, class_name FROM students";
}

            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) > 0) {

    echo "<div class='table-box'>
    <table>
    <caption>Manage Students</caption>
    <tr>
        <th>NAME</th>
        <th>ROLL NO</th>
        <th>CLASS</th>
        
    </tr>";

    while($row = mysqli_fetch_array($result))
    {
        echo "<tr>";
        echo "<td>" . $row['name'] . "</td>";
        echo "<td>" . $row['rno'] . "</td>";
        echo "<td>" . $row['class_name'] . "</td>";

    

        echo "</tr>";
    }

    echo "</table></div>";

} else {
    echo "0 Students";
}
                  


        ?>
    </div>

    <div class="footer">
        <!-- <span>Designed & Coded By Jibin Thomas</span> -->
    </div>
</body>
</html>
