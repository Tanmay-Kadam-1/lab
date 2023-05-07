<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Marksheet</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <h1>Provisional Marksheet</h1>

    <div class="sec1_2">
        <img src="./assets/logo.jpeg" height="100" width="100">
        <p>Bansilal Ramnath Agarwal Charitable Trust's <br>
            <b class="b1">Vishwakarma Institute of Technology,Pune</b> <br>
            (An Autonomous Institute affiliated to Savitribai Phule Pune University)
        </p>
    </div>
    <hr>

    <div class="sec1_1">
        <div>
            <table>
                <tr>
                    <td>Name: Waghule Shubham Kalyan</td>
                </tr>
                <tr>
                    <td>PRN: 12120127</td>
                </tr>
                <tr>
                    <td>Mother's Name: Chanda</td>
                </tr>
                <tr>
                    <td>Program: Bachelor of Technology</td>
                </tr>
                <tr>
                    <td>Branch: B.Tech-Computer Engineering</td>
                </tr>
                <tr>
                    <td>Class: TY</td>
                </tr>
                <tr>
                    <td>SEM: 1</td>
                </tr>
                <tr>
                    <td>Month and Year of Exam: May,2023</td>
                </tr>
            </table>
        </div>
        <div>
            <img src="./assets/IMG_8336.JPG" height="150" width="150">
        </div>
    </div>
    <hr>
    <br>

    <?php
      $servername = "localhost";
      $username = "root";
      $password = "";
      $dbname = "mytemp";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM Students";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table style='border-collapse: collapse; width: 100%;'>";
    echo "<tr><th>StudentRn</th>
    <th>StudentName</th><th>MSE_WT</th><th>MSE_DAA</th><th>MSE_OS</th><th>MSE_CC</th><th>ESE_WT</th><th>ESE_DAA</th><th>ESE_OS</th><th>ESE_CC</th><th>Result</th></tr>";

    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr><td style='border: 1px solid black; padding: 10px;'>" . $row["StudentRn"]. "</td><td style='border: 1px solid black; padding: 5px;'>" . $row["StudentName"]. "</td><td style='border: 1px solid black; padding: 5px;'>" . $row["MSE_WT"]. "</td><td style='border: 1px solid black; padding: 5px;'>" . $row["MSE_DAA"]. "</td><td style='border: 1px solid black; padding: 5px;'>" . $row["MSE_OS"]. "</td><td style='border: 1px solid black; padding: 5px;'>" . $row["MSE_CC"]. "</td><td style='border: 1px solid black; padding: 5px;'>" . $row["ESE_WT"]. "</td><td style='border: 1px solid black; padding: 5px;'>" . $row["ESE_DAA"]. "</td><td style='border: 1px solid black; padding: 5px;'>" . $row["ESE_OS"]. "</td><td style='border: 1px solid black; padding: 5px;'>" . $row["ESE_CC"]. "</td><td style='border: 1px solid black; padding: 5px;'>" . $row["Result"]. "</td></tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}
$conn->close();
?>

<br>
<br>

    <h2>Grade Points:</h2>
    <div class="sec1_2">
        <p>
            A+ : (Excellent / Outstanding): 10 <br>
            B+ : (Good): 8 <br>
            C+ : (Above Average): 6 <br>
            D : (Below Average): 4 <br>
            XX : (Detained): 0 <br>
            P : (Audit Course Passed): 0 <br>
        </p>

        <p>
            A : (Very Good): 9 <br>
            B : (Fair): 7 <br>
            C : (Average): 5 <br>
            F : (Fail): 0 <br>
            II : (Absent): 0 <br>
            NP : (Audit Course Not Passed): 0
        </p>
    </div>

    

    <div class="d2">
        <img src="./assets/sign.jpeg" height="100" width="100">
    </div>
    <h3 class="d2">Controller of Examinations</h3>
</body>

</html>


