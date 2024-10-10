<!-- Made by Christopher Barber September 2024 -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Westbrick IT Plant Logs - Pembina North - Treater 101 2 - Add New Log</title>
    <link rel="stylesheet" href="../../../style/style.css">
    <script src="../../../script/sub-menu-script.js" defer></script>
    <link rel="icon" href="../../../favicon.ico" type="image/x-icon">
</head>
<body>
    <?php
        $allowedIPs = array('206.174.198.58', '206.174.198.59', '50.99.132.206', '170.203.211.167'); // Define the list of allowed IP addresses

        $remoteIP = $_SERVER['REMOTE_ADDR']; // Get the remote IP address of the client
        
        if (!in_array($remoteIP, $allowedIPs)) {
            // Unauthorized access - display an error message or redirect
            echo "Access denied. Your IP address is not allowed to submit this item.";
            exit();
        }
        
        // Process the form submission if the IP address is allowed
        // Your form processing code here...

        $servername = "localhost";
        $username = "cbarber";
        $password = "!!!Dr0w554p!!!";
        $dbname = "WestbrickPlantLogDB";
        
        $conn = new mysqli($servername, $username, $password, $dbname);
        
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }    

        $author = $_POST['author'];
        $shift = $_POST['shift'];
        $pressure = $_POST['pressure'];
        $temperature = $_POST['temperature'];
        $frontWaterLevel = $_POST['front-water-level'];
        $backWaterLevel = $_POST['back-water-level'];
        $flameCondition = $_POST['flame-condition'];
        $month = $_POST['month'];
        $day = $_POST['day'];
        $year = $_POST['year'];
        $date = date('Y-m-d');        
        date_default_timezone_set('America/Denver'); 
        $time = date('H:i:s', time());
        $dateOfLog = (string)$date . " " . (string)$time;
        $remark = $_POST['remark'];        
        
        function convertApostrophe($string) { 
            $newString = str_replace("'", '`', $string); 
            return $newString; 
        }            
        
        $author = convertApostrophe($author);
        $remark = convertApostrophe($remark);

        if($pressure == null){
            $pressure = 'NULL';
            echo "PRESSURE: " . $pressure . "</h1>";
        }
        
        $sql = "INSERT INTO treater_101_2 (author, shift, pressure, temperature, front_water_level, back_water_level, flame_condition, month, day, year, date, time, remark, date_of_log) VALUES ('$author', '$shift', '$pressure', '$temperature', '$frontWaterLevel', '$backWaterLevel', '$flameCondition', '$month', '$day', '$year', '$date', '$time', '$remark', '$dateOfLog')";
                        

        if ($conn->query($sql) === TRUE) {            
            echo "<div class='westbrick-success-svg-container'>";
            echo    "<img class='westbrick-success-svg' src='../../../images/plant-log-submitted-successfully.svg' alt='WESTBRICK SUCCESS SVG'>";
            echo    "<button class='home-button' type='button' onclick='window.location.href=`../`;'>Home</button>";
            echo "</div>";              
        } else {
            echo "<div class='westbrick-success-svg-container'>";
            echo    "Error: " . $sql . "<br>" . $conn->error;
            echo    "<button class='home-button' type='button' onclick='window.location.href=`index.html`;'>Compose</button>";
            echo "</div>";
        }
        $conn->close();
        
    ?>
</body>