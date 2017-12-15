<html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>Create The Table</title>
</head>
<body>
<div id="container">
    <div id="header">
        <h1>Mike Ames CIS 371</h1>
        <h2>Homework #4: PHP and Database Access</h2>
    </div>
    <div id="body">




        <?php

        //I referenced https://www.w3schools.com/php/php_mysql_create_table.asp in the creation of this code.
        $host = 'cis.gvsu.edu';
        $username = 'amesm';
        $password = 'amesm';
        $dbName = 'amesm';

        $conn = new mysqli($host, $username, $password, $dbName);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $dropSQL = "DROP TABLE IF EXISTS friend;";

        if ($conn->query($dropSQL) == true ) {
            echo("Table dropped.</br></br></br>");
        } else {
            echo("Error dropping table " . $conn->error . "</br>");
        }

        $createSQL = "

        CREATE TABLE friend (
        id INT AUTO_INCREMENT PRIMARY KEY,
        name VARCHAR(255),
        phone VARCHAR(255),
        age INT         
        )";

        if ($conn->query($createSQL) == true ) {
            echo("Table Created!</br>");
        } else {
            echo("Failed to create table " . $conn->error . "</br>");
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


