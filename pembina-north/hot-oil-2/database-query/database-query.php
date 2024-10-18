<!-- Made by Christopher Barber October 2024 -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Westbrick Plant Logs - Plant One</title>
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
    <h1 class="sub-page-title">Pembina North - Hot Oil 2</h1>
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
        }else {
            
        }
        function booleanToNightDay($boolean) {
            if($boolean == 1) {
                $boolean = "Day";
            } else if($boolean == 0) {
                $boolean = "Night";
            }
            return $boolean;
        }        

        $startDate = $_POST['start-date'];
        $startDate = $_POST['start-time'];
        $endTime = $_POST['end-time'];
        $endDate = $_POST['end-date'];

        $query = "SELECT * FROM `hot_oil2` ORDER BY `new_id` DESC, `author` DESC";
        $result = mysqli_query($conn, $query);
        if (mysqli_num_rows($result) > 0) {                                            
            while($row = mysqli_fetch_assoc($result)) {
                                
                $id = $row['id']; 
                $new_id = $row['new_id'];
                $new_id = $new_id + 8;
                // The new ID is autoincremented, the old ID are missing some so if the new id and old id aren't equal use the old ID, the new ID will be used for new logs
                if($new_id != $id){
                    // If the id is 0 that means it's a new_ID so display that, if not display the old ID
                    if($id == 0){                        
                    }else{
                        $new_id = $id;
                    }                    
                }                
                $author = $row['author'];                
                $flow = $row['flow'];
                $inletTemperature = $row['inlet_temperature'];
                $outletTemperature =  $row['outlet_temperature'];
                $pumpPressure = $row['pump_pressure'];
                $surgeTankPressure = $row['surge_tank_pressure'];
                $surgeTankLevel = $row['surge_tank_level'];
                $fuelGasPressure = $row['fuel_gas_pressure'];
                $stackTemperature = $row['stack_temperature'];
                $airTemperature = $row['air_temperature'];
                $flameCondition = $row['flame_condition'];
                $shift = $row['shift'];
                $month = $row['month'];
                $day = $row['day'];
                $year = $row['year'];
                $remark = $row['remark'];
                $date = $row['date'];
                $time = $row['time'];
				$dateOfLog = $row['date_of_log'];


                $shift = booleanToNightDay($shift);

                echo    "<div class='plant-log'>";
                echo    "   <h1 class='log-title'>Plant Log #$new_id</h1>";
                echo    "   <div class='table-wrapper'>";
                echo    "       <table class='sub-menu-table'>";
                echo    "           <thead>";
                echo    "               <tr>";                                
                echo    "                   <th>Message ID</th>";
                echo    "                   <th>Date of Log</th>";               
                echo    "                   <th>Author</th>";
                echo    "                   <th>Flow</th>";
                echo    "                   <th>Inlet Temperature</th>";
                echo    "                   <th>Outlet Temperature</th>";
                echo    "                   <th>Pump Pressure</th>";
                echo    "               </tr>";
                echo    "           </thead>";
                echo    "           <tbody>";
                echo    "               <tr>";                
                echo    "                   <td>$new_id</td>";
                echo    "                   <td>$dateOfLog</td>";
                echo    "                   <td>$author</td>";
                echo    "                   <td>$flow</td>";
                echo    "                   <td>$inletTemperature</td>";
                echo    "                   <td>$outletTemperature</td>";
                echo    "                   <td>$pumpPressure</td>";
                echo    "               </tr>";
                echo    "           </tbody>";
                echo    "       </table>";
                echo    "       <table class='sub-menu-table'>";
                echo    "           <thead>";
                echo    "               <tr>";
                echo    "                   <th>Surge Tank Pressure</th>";
                echo    "                   <th>Surge Tank Level</th>";
                echo    "                   <th>Fuel Gas Pressure</th>";
                echo    "                   <th>Stack Temperature</th>";
                echo    "                   <th>Air Temperature</th>";
                echo    "                   <th>Flame Condition</th>";                                
                echo    "               <tr>";
                echo    "           </thead>";
                echo    "           <tbody>";
                echo    "               <tr>";
                echo    "                   <td>$surgeTankPressure</td>";
                echo    "                   <td>$surgeTankLevel</td>";
                echo    "                   <td>$fuelGasPressure</td>";
                echo    "                   <td>$stackTemperature</td>";
                echo    "                   <td>$airTemperature</td>";
                echo    "                   <td>$flameCondition</td>";                
                echo    "               </tr>";
                echo    "           </tbody>";
                echo    "       </table>";
                echo    "       <table class='sub-menu-table'>";
                echo    "           <thead>";
                echo    "               <tr>";
                echo    "                   <th>Shift</th>";
                echo    "                   <th>Month</th>";
                echo    "                   <th>Day</th>";
                echo    "                   <th>Year</th>";
                echo    "                   <th>Date of Database Insertion</th>";
                echo    "                   <th>Time of Database Insertion</th>";
                echo    "               </tr>";
                echo    "           </thead>";
                echo    "           <tbody>";
                echo    "               <tr>";
                echo    "                   <td>$shift</td>";
                echo    "                   <td>$month</td>";
                echo    "                   <td>$day</td>";
                echo    "                   <td>$year</td>";				
                echo    "                   <td>$date</td>";
                echo    "                   <td>$time</td>";
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