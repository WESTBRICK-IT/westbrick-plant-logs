<!-- Made by Christopher Barber August 2024 -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Westbrick Plant Logs - Pembina North - Treater 101 2</title>
    <link rel="stylesheet" href="../../style/style.css">
    <script src="../../script/sub-menu-script.js" defer></script>    
    <link rel="icon" href="../../favicon.ico" type="image/x-icon">
</head>
<body>
    <a href="../"><img class="main-title" src="../../images/westbrick-plant-logs.svg" alt="Westbrick Plant Logs"></a>
    <h1 class="sub-page-title">Pembina North - Treater 101 2</h1>
    <button class="button" onclick="window.location.href='./add-new-log/'" type="button">Add New Log</button>
    <button class="button go-back-button" type="button">Go back</button>
    
    <?php
        $allowedIPs = array('206.174.198.58', '206.174.198.59', '50.99.132.206'); // Define the list of allowed IP addresses

        $remoteIP = $_SERVER['REMOTE_ADDR']; // Get the remote IP address of the client

        if (!in_array($remoteIP, $allowedIPs)) {
            // Unauthorized access - display an error message or redirect
            echo "<h1>Access denied. Your IP address is not allowed to view these items.</h1>";
            exit();
        }
        function convertApostrophe($string) { 
            $newString = str_replace("`", "'", $string); 
            return $newString; 
        }
        // Connect to the database
        $conn = mysqli_connect("localhost", "cbarber", "!!!Dr0w554p!!!", "WestbrickPlantLogDB");

        // Check connection
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }

        function booleanToNightDay($boolean) {
            if($boolean == 1) {
                $boolean = "Day";
            } else if($boolean == 0) {
                $boolean = "Night";
            }
            return $boolean;
        }

        $query = "SELECT * FROM `treater_101_2` ORDER BY `id` DESC, `author` DESC";
        $result = mysqli_query($conn, $query);
        if (mysqli_num_rows($result) > 0) {                                            
            while($row = mysqli_fetch_assoc($result)) {
                                
                $id = $row['id'];                
                $author = $row['author'];
                $shift = $row['shift'];
                $pressure = $row['pressure'];
                $temperature = $row['temperature'];
                $frontWaterLevel = $row['front_water_level'];
                $backWaterLevel = $row['back_water_level'];
                $flameCondition = $row['flame_condition'];
                $month = $row['month'];
                $day = $row['day'];
                $year = $row['year'];
                $date = $row['date'];
                $time = $row['time'];

                $shift = booleanToNightDay($shift);
               
                echo    "<div class='plant-log'>";
                echo    "   <h1 class='log-title'>Plant Log #$id</h1>";
                echo    "   <div class='table-wrapper'>";
                echo    "       <table class='sub-menu-table'>";
                echo    "           <thead>";
                echo    "               <tr>";
                echo    "                   <th>Date</th>";
                echo    "                   <th>Time</th>";                
                echo    "                   <th>Message ID</th>";
                echo    "                   <th>Author</th>";
                echo    "                   <th>Shift</th>";
                echo    "                   <th>Pressure</th>";
                echo    "                   <th>Temperature</th>";
                echo    "                   <th>Front Water Level</th>";
                echo    "                   <th>Back Water Level</th>";
                echo    "               </tr>";
                echo    "           </thead>";
                echo    "           <tbody>";
                echo    "               <tr>";
                echo    "                   <td>$date</td>";
                echo    "                   <td>$time</td>";
                echo    "                   <td>$id</td>";
                echo    "                   <td>$author</td>";
                echo    "                   <td>$shift</td>";
                echo    "                   <td>$pressure</td>";
                echo    "                   <td>$temperature</td>";
                echo    "                   <td>$frontWaterLevel</td>";
                echo    "                   <td>$backWaterLevel</td>";
                echo    "               </tr>";
                echo    "           </tbody>";
                echo    "       </table>";
                echo    "       <table class='sub-menu-table'>";
                echo    "           <thead>";
                echo    "               <tr>";
                echo    "                   <th>Flame Condition</th>";
                echo    "                   <th>Month</th>";
                echo    "                   <th>Day</th>";
                echo    "                   <th>Year</th>";                
                echo    "               <tr>";
                echo    "           </thead>";
                echo    "           <tbody>";
                echo    "               <tr>";
                echo    "                   <td>$flameCondition</td>";
                echo    "                   <td>$month</td>";
                echo    "                   <td>$day</td>";
                echo    "                   <td>$year</td>";                
                echo    "               </tr>";
                echo    "           </tbody>";
                echo    "       </table>";                                
                echo    "   </div>"; 
                echo    "</div>";
            }
        }
    ?>
    </div>    
</body>
</html>