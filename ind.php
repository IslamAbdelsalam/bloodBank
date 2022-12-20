<?php
$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = '';
$db = 'bloodbank';
$conn = new mysqli($dbhost, $dbuser, $dbpass, $db);
// or die("Connection faild: %s\n".$conn -> error);
if ($conn->connect_errno) {
    echo "Failed to connect to MySQL: " . $conn->connect_error;
    exit();
}

if (isset($_POST['search'])) {
    //$search = mysqli_real_escape_string($conn, $_POST['search']);

    $country = $_POST['country'];
    $city = $_POST['city'];
    $b_type = $_POST['b_type'];
    $sql = "SELECT * FROM donors 
                WHERE 'country' LIKE '%$country%' AND 'city' LIKE '%$city%' AND 'blood_type' LIKE '%$b_type%' 
                 ";

    $result = mysqli_query($conn, $sql);

    $queryResult = mysqli_num_rows($result);
    echo $queryResult;
    if ($queryResult > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<br><br><br>
                <table>
                    <tr>
                        <th>Name</th>
                        <th>Country</th>
                        <th>city</th>
                        <th>number</th>
                        <th>age</th>
                        <th>gender</th>
                        <th>blood_type</th>
                    </tr>
                    <tr>";
            echo "<td>";
            echo $row['name'];
            echo "</td>";
            echo "<td>";
            echo $row['country'];
            echo "</td>";
            echo "<td>";
            echo $row['city'];
            echo "</td>";
            echo "<td>";
            echo $row['number'];
            echo "</td>";
            echo "<td>";
            echo $row['age'];
            echo "</td>";
            echo "<td>";
            echo $row['gender'];
            echo "</td>";
            echo "<td>";
            echo $row['blood_type'];
            echo "</td>";
            echo "</tr>";

            echo "</table>";
        }
    } else {
        echo "No input";
    }
    if($result){
        echo "good work\n";
        echo gettype($result);
    }else{
        echo 'Wrong';    
    }
}


if (isset($_POST['signup'])) {
    $fullname = $_POST['fullname'];
    $country = $_POST['country'];
    $city = $_POST['city'];
    $phone = $_POST['phone'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];
    $blood_type = $_POST['b_type'];
    $sql = "INSERT INTO donors VALUES(
                        NULL,
                        '$fullname',
                        '$country',
                        '$city',
                        '$phone',
                        '$age',
                        '$gender',
                        '$blood_type')";

    $result = mysqli_query($conn, $sql);

    if ($result) {
        echo "good work\n";
    } else {
        echo 'Wrong';
    }
}


if (isset($_POST['submit'])) {
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $ms_title = $_POST['ms_title'];
    $ms_Body = $_POST['ms_Body'];
    $sql = "insert into contactus
            (   fullname,
                email,
                phone,
                messageTitle,
                messageBody) 
                VALUES(
                    '$fullname',
                    '$email',
                    '$phone',
                    '$ms_title',
                    '$ms_Body' )";

    $result = mysqli_query($conn, $sql);

    if ($result) {
        echo 'Save';
    } else {
        echo 'Wrong';
    }
}
