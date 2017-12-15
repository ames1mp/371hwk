<html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>Show All Records</title>
</head>
<body>
<div id="container">
    <div id="header">
        <h1>Mike Ames CIS 371</h1>
        <h2>Homework #4: PHP and Database Access</h2>
    </div>
    <div id="body">
        <table>
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

            $sqlQuery = "SELECT * FROM friend;";

            $data = $conn->query($sqlQuery);

            if ($data->num_rows == 0) {
                echo "0 Results Retrieved";
            } else {

                echo "
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Phone Number</th>
                    <th>Age</th>
                </tr>";

                while ($line = $data->fetch_assoc()) {

                    if (strlen($line["phone"]) == 7) {
                        $phoneNum = substr($line["phone"],0,3) . "-" . substr($line["phone"],3);
                    } else {
                        $phoneNum = "(" . substr($line["phone"],0,3) . ")&nbsp;". substr($line["phone"],3,3)
                            . "-" . substr($line["phone"],6);
                    }
                    echo "</tr>" .
                            "<td>" . $line["id"]    . "</td>" .
                            "<td>" . $line["name"]  . "</td>" .
                            "<td>" . $phoneNum      . "</td>" .
                            "<td>" . $line["age"]   . "</td>" .
                         "</tr>";
                }
            }

            $conn->close();
            ?>


        </table>
    </div>
    <div id="footer">
        <p id="homeLink"><a href="home.html">Home</a> </p>
        <p id="aboutBg">About the Background: This image is released as Open Source under the GPL (GNU General Public License) 2.0</p>
    </div>
</div>

</body>
</html>
