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
    <script type="text/javascript" src="../../script/jquery.js" defer></script>
    <script src="../../script/loading.js" defer></script>
</head>
<body>
    <div class="preloader">
        <div class="preloader_inner">
            <div class="loading_icon">
                <img src="../../images/loader.svg" alt="gas-oil-trading-loader">
            </div>
        </div>
    </div> 
    <a href="../"><img class="main-title" src="../../images/westbrick-plant-logs.svg" alt="Westbrick Plant Logs"></a>
    <h1 class="sub-page-title">Pembina North - Treater 101 2</h1>
    <button class="button" onclick="window.location.href='./add-new-log/'" type="button">Add New Log</button>
    <button class="button go-back-button" type="button">Go back</button>
    
    <?php
        $allowedIPs = array('206.174.198.58', '206.174.198.59', '50.99.132.206', '170.203.211.167'); // Define the list of allowed IP addresses

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

        function booleanToNightDay($shift) {
            if($shift == 1) {
                return "Day";
            }if($shift == null){
                return null;
            }
            if($shift == 0) {
                return "Night";                
            }       
            return null;
        }

        $query = "SELECT * FROM `treater_101_2` ORDER BY `new_id` DESC, `author` DESC";
        $result = mysqli_query($conn, $query);
        if (mysqli_num_rows($result) > 0) {                                            
            while($row = mysqli_fetch_assoc($result)) {
                                
                $id = $row['id'];    
                $newID = $row['new_id'];                
                if($id != 0){
                    $newID = $id;
                }               
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
                $dateOfLog = $row['date_of_log'];  
                $remark = $row['remark'];                  

                $shift = booleanToNightDay($shift);  
               
                echo    "<div class='plant-log'>";
                echo    "   <h1 class='log-title'>Plant Log #$newID</h1>";
                echo    "   <div class='table-wrapper'>";
                echo    "       <table class='sub-menu-table'>";
                echo    "           <thead>";
                echo    "               <tr>";
                echo    "                   <th>Message ID</th>";
                echo    "                   <th>Date of Log</th>";   
                echo    "                   <th>Author</th>";
                echo    "                   <th>Pressure</th>";
                echo    "                   <th>Temperature</th>";    
                echo    "                   <th>Front Water Level</th>";
                echo    "                   <th>Back Water Level</th>";                               
                echo    "               </tr>";
                echo    "           </thead>";
                echo    "           <tbody>";
                echo    "               <tr>";
                echo    "                   <td>$newID</td>";
                echo    "                   <td>$dateOfLog</td>"; 
                echo    "                   <td>$author</td>";
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
                echo    "                   <th>Shift</th>";
                echo    "                   <th>Month</th>";
                echo    "                   <th>Day</th>";
                echo    "                   <th>Year</th>";
                echo    "                   <th>Date of Database Insertion</th>";
                echo    "                   <th>Time of Database Insertion</th>"; 
                echo    "               <tr>";
                echo    "           </thead>";
                echo    "           <tbody>";
                echo    "               <tr>";
                echo    "                   <td>$flameCondition</td>";
                echo    "                   <td>$shift</td>";
                echo    "                   <td>$month</td>";
                echo    "                   <td>$day</td>";
                echo    "                   <td>$year</td>";  
                echo    "                   <td>$date</td>";
                echo    "                   <td>$time</td>";              
                echo    "               </tr>";
                echo    "           </tbody>";
                echo    "       </table>";  
                echo    "       <div class='plant-log-remarks'>";
                echo    "           <p>$remark</p>";                
                echo    "       </div>";                               
                echo    "   </div>"; 
                echo    "</div>";
            }
        }
    ?>
    </div>    
</body>
</html>