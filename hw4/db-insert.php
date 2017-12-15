<html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>Populate The Table</title>
</head>
<body>
<div id="container">
    <div id="header">
        <h1>Mike Ames CIS 371</h1>
        <h2>Homework #4: PHP and Database Access</h2>
    </div>
    <div id="body">

        <?php

        $host = 'cis.gvsu.edu';
        $username = 'amesm';
        $password = 'amesm';
        $dbName = 'amesm';

        $conn = new mysqli($host, $username, $password, $dbName);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $name = $_POST['name'];
        $phone = $_POST['phone'];
        $age = $_POST['age'];

        $sqlInsert = "INSERT INTO friend (name, phone, age) VALUES ('".$name."', '".$phone."','$age');";

        if ( ($conn->query($sqlInsert)) == true ) {
            echo "Inserted " . $name . ",&nbsp;" . $phone . ",&nbsp;" . $age ."</br>";
        } else {
            echo "Failed to insert row " . $conn->error . "</br>";
            }

        $conn->close();
        ?>
    </div>
    <div id="footer">
        <p id="homeLink"><a href="home.html">Home</a> </p>
        <p id="aboutBg">About the Background: This image is released as Open Source under the GPL (GNU General Public License) 2.0</p>
    </div>
</div>

</body>
</html>
