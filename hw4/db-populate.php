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

        $upInfo = $_FILES["upfile"];

        if ($upInfo["error"] == 0) {
            $destination = "./uploads/" . $upInfo["name"];
        }

        $file = fopen($upInfo["tmp_name"], "r");

        //get number of lines
        //this code is from
        //https://stackoverflow.com/questions/21447329/how-can-i-get-the-total-number-of-rows-in-a-csv-file-with-php
        $fp = new SplFileObject($upInfo["tmp_name"], 'r');
        $fp->seek(PHP_INT_MAX);
        $lines = $fp->key() + 1;
        fclose($fp);

        $count = 0;
        for ($i = 0; $i < $lines+1; ++$i) {

            $line = fgetcsv($file);

            $sqlInsert = "INSERT INTO friend (name, phone, age) VALUES ('".$name."', '".$phone."','$age');";

            $name = $line[0];
            $phone = $line[1];
            $age = $line[2];
            $age +=  0;

            if ( ($conn->query($sqlInsert)) == true ) {
                echo "Inserted " . $name . ",&nbsp;" . $phone . ",&nbsp;" . $age ."</br>";

                if ($count == 0) {
                    $count = 1;
                } else {
                    $count += 1;
                }

            } else {
                echo "Failed to insert row " . $conn->error . "</br>";
            }
        }

        echo "</br></br>Inserted " . $count . " rows into table: " . friend . "</br></br>";

        fclose($file);

        $sqlDelEmptyRows = "DELETE FROM friend WHERE name = '' AND phone = '' AND age = 0";

        if ( ($conn->query($sqlDelEmptyRows)) == true ) {
            echo "Deleted empty rows.";
        } else {
            echo "Failed to delete empty rows " . $conn->error;
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
