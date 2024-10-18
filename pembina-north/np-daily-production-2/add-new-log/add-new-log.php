<!-- Made by Christopher Barber July 2024 -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Westbrick IT Plant Logs - Pembina North - NP Daily Production 2 - Add New Log</title>
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
        $inlet = $_POST['inlet'];
        $sales = $_POST['sales'];
        $lPG = $_POST['lpg'];
        $oil = $_POST['oil'];
        $productionMonth = $_POST['production-month'];
        $productionDay = $_POST['production-day'];
        $productionYear = $_POST['production-year'];              
        $date = date('Y-m-d');        
        date_default_timezone_set('America/Denver'); 
        $time = date('H:i:s', time());
        $dateOfLog = $date . " " . $time;
        function convertApostrophe($string) { 
            $newString = str_replace("'", '`', $string); 
            return $newString; 
        }
        $author = convertApostrophe($author);
        $productionMonth = convertApostrophe($productionMonth);

        function addSpacingToRemark($remark) {                      
            $remark = str_replace(["\r", "\n"], "<p></p>", $remark);
            return $remark;
        }

        $inlet = "";

        $sql = "INSERT INTO np_daily_production2 (author, inlet, sales, lpg, oil, production_month, production_day, production_year, date, time, date_of_log) VALUES ('$author', NULLIF('$inlet',''), NULLIF('$sales',''), NULLIF('$lPG',''), NULLIF('$oil',''), '$productionMonth', NULLIF('$productionDay',''), NULLIF('$productionYear',''), '$date', '$time', '$dateOfLog')";
        
        if ($conn->query($sql) === TRUE) {
            // echo "<h1>Article $title submitted successfully! Redirecting to articles page in 5 seconds.</h1>";
            echo "<div class='westbrick-success-svg-container'>";
            echo    "<img class='westbrick-success-svg' src='../../../images/plant-log-submitted-successfully.svg' alt='WESTBRICK SUCCESS SVG'>";
            echo    "<button class='home-button' type='button' onclick='window.location.href=`../`;'>Home</button>";
            echo "</div>";
            // echo "<br><h1>File name: $image" . "File tmp name: $image_tmp" . "</h1>";
            // Set the time delay in seconds
            // $timeDelay = 5; // 5 seconds
            // Wait for the specified amount of time before redirecting
            // header("refresh:".$timeDelay.";url=../articles/index.php");
        } else {
            echo "<div class='westbrick-success-svg-container'>";
            echo    "Error: " . $sql . "<br>" . $conn->error;
            echo    "<button class='home-button' type='button' onclick='window.location.href=`index.html`;'>Compose</button>";
            echo "</div>";
        }
        $conn->close();
        
    ?>
</body>