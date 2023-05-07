<!DOCTYPE html>
<html>
<head>
	<title>Insert Data</title>
  <link rel="stylesheet" type="text/css" href="style.css">

	<style>
		label, input {
			display: block;
			margin-bottom: 10px;
		}
		input[type="submit"] {
			width: 100px;
		}
	</style>
</head>
<body>
	<h1>Insert Data</h1>
  <form method="post" action="result.php">

  <label for="StudentRn">Student Roll No:</label>
  <input type="text" id="StudentRn" name="StudentRn"><br>

  <label for="StudentName">Student Name:</label>
  <input type="text" id="StudentName" name="StudentName"><br>

  <label for="MSE_WT">MSE WT:</label>
  <input type="text" id="MSE_WT" name="MSE_WT"><br>

  <label for="MSE_DAA">MSE DAA:</label>
  <input type="text" id="MSE_DAA" name="MSE_DAA"><br>

  <label for="MSE_OS">MSE OS:</label>
  <input type="text" id="MSE_OS" name="MSE_OS"><br>

  <label for="MSE_CC">MSE CC:</label>
  <input type="text" id="MSE_CC" name="MSE_CC"><br>

  <label for="ESE_WT">ESE WT:</label>
  <input type="text" id="ESE_WT" name="ESE_WT"><br>

  <label for="ESE_DAA">ESE DAA:</label>
  <input type="text" id="ESE_DAA" name="ESE_DAA"><br>

  <label for="ESE_OS">ESE OS:</label>
  <input type="text" id="ESE_OS" name="ESE_OS"><br>

  <label for="ESE_CC">ESE CC:</label>
  <input type="text" id="ESE_CC" name="ESE_CC"><br>

  <input type="submit" value="Submit">
</form>


	<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
      // Retrieve form data
      $studentRn = $_POST['StudentRn'];
      $studentName = $_POST['StudentName'];
      $mseWT = $_POST['MSE_WT'];
      $mseDAA = $_POST['MSE_DAA'];
      $mseOS = $_POST['MSE_OS'];
      $mseCC = $_POST['MSE_CC'];
      $eseWT = $_POST['ESE_WT'];
      $eseDAA = $_POST['ESE_DAA'];
      $eseOS = $_POST['ESE_OS'];
      $eseCC = $_POST['ESE_CC'];
  
      $mse_wt = $_POST["MSE_WT"];
if ($mse_wt >= 30) {
    die("MSE_WT must be less than 30");
}
$mse_daa = $_POST["MSE_DAA"];
if ($mse_daa >= 30) {
    die("MSE_DAA must be less than 30");
}
$mse_os = $_POST["MSE_OS"];
if ($mse_os >= 30) {
    die("MSE_OS must be less than 30");
}
$mse_cc = $_POST["MSE_CC"];
if ($mse_cc >= 30) {
    die("MSE_CC must be less than 30");
}

$ese_wt = $_POST["ESE_WT"];
if ($ese_wt >= 70) {
    die("ESE_WT must be less than 70");
}
$ese_daa = $_POST["ESE_DAA"];
if ($ese_daa >= 70) {
    die("ESE_DAA must be less than 70");
}
$ese_os = $_POST["ESE_OS"];
if ($ese_os >= 70) {
    die("ESE_OS must be less than 70");
}
$ese_cc = $_POST["ESE_CC"];
if ($ese_cc >= 70) {
    die("ESE_CC must be less than 70");
}
      // Calculate average
      $totalMarks = $mseWT + $mseDAA + $mseOS + $mseCC + $eseWT + $eseDAA + $eseOS + $eseCC;
      
      $average = $totalMarks / 8;
  
      // Connect to MySQL
      $servername = "localhost";
      $username = "root";
      $password = "";
      $dbname = "mytemp";
  
      $conn = mysqli_connect($servername, $username, $password, $dbname);
  
      if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
      }
  
      // Insert data into Students table
      $sql = "INSERT INTO Students (StudentRn, StudentName, MSE_WT, MSE_DAA, MSE_OS, MSE_CC, ESE_WT, ESE_DAA, ESE_OS, ESE_CC, Result)
        VALUES ('$studentRn', '$studentName', '$mseWT', '$mseDAA', '$mseOS', '$mseCC', '$eseWT', '$eseDAA', '$eseOS', '$eseCC', '$average')";
  
      if (mysqli_query($conn, $sql)) {
        echo "New record created successfully";
      } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
      }
  
      mysqli_close($conn);
    }
  ?>
  
  