<!-- Made by Christopher Barber August 2024 -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Westbrick Plant Logs - Pembina North - Plant Log 2</title>
    <link rel="stylesheet" href="../../style/style.css">
    <script src="../../script/sub-menu-script.js" defer></script>    
    <link rel="icon" href="../../favicon.ico" type="image/x-icon">
</head>
<body>
    <a href="../"><img class="main-title" src="../../images/westbrick-plant-logs.svg" alt="Westbrick Plant Logs"></a>
    <h1 class="sub-page-title">Plant Log 2</h1>
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

        function booleanToYesNo($boolean) {
            if($boolean == 1) {
                $boolean = "Yes";
            } else if($boolean == 0) {
                $boolean = "No";
            }
            return $boolean;
        }

        $query = "SELECT * FROM `westbrick_plant_log1` ORDER BY `id` DESC, `author` DESC";
        $result = mysqli_query($conn, $query);
        if (mysqli_num_rows($result) > 0) {                                            
            while($row = mysqli_fetch_assoc($result)) {
                                
                $id = $row['id'];                
                $author = $row['author'];
                $shift = $row['shift'];
                $operator1 = $row['operator1'];
                $operator2 = $row['operator2'];
                $operator3 = $row['operator3'];
                $shiftHandoverMeeting = $row['shift_handover_meeting'];
                $startOfShiftMeeting = $row['start_of_shift_meeting'];
                $plantStatus = $row['plant_status'];
                $equipmentOutage = $row['equipment_outage'];
                $filterChange = $row['filter_change'];
                $pigging = $row['pigging'];
                $recyclePumps = $row['recycle_pumps'];
                $productionTankLevel = $row['production_tank_level'];
                $lPG_BulletPeakLevel = $row['lpg_bullet_peak_level'];
                $lPG_BulletPeakPressure = $row['lpg_bullet_peak_pressure'];
                $bermWaterSamplesTaken = $row['berm_water_samples_taken'];
                $plantProcessDiscussion = $row['plant_process_discussion'];
                $operationalTargets = $row['operational_targets'];
                $overRidesOrSafetiesBypassed = $row['overrides'];
                $upcomingActivities = $row['upcoming_activities'];
                $hSE_Concerns = $row['hse_concerns'];
                $regulatoryRequirements = $row['regulatory_requirements'];
                $staffDiscussion = $row['staff_discussion'];
                $weatherAndEffectsOnOperations = $row['weather_and_effects_on_operations'];
                $permitExtensionsCriticalTasks = $row['permit_extensions_critical_tasks'];
                $remark = $row['remark'];
                $date = $row['date'];
                $time = $row['time'];

                $bermWaterSamplesTaken = booleanToYesNo($bermWaterSamplesTaken);
                $plantProcessDiscussion = booleanToYesNo($plantProcessDiscussion);
                $operationalTargets = booleanToYesNo($operationalTargets);
                $upcomingActivities = booleanToYesNo($upcomingActivities);
                $hSE_Concerns = booleanToYesNo($hSE_Concerns);
                $regulatoryRequirements = booleanToYesNo($regulatoryRequirements);
                $staffDiscussion = booleanToYesNo($staffDiscussion);
                $weatherAndEffectsOnOperations = booleanToYesNo($weatherAndEffectsOnOperations);

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
                echo    "                   <th>Operator 1</th>";
                echo    "                   <th>Operator 2</th>";
                echo    "                   <th>Operator 3</th>";
                echo    "                   <th>Shift Handover Meeting</th>";
                echo    "               </tr>";
                echo    "           </thead>";
                echo    "           <tbody>";
                echo    "               <tr>";
                echo    "                   <td>$date</td>";
                echo    "                   <td>$time</td>";
                echo    "                   <td>$id</td>";
                echo    "                   <td>$author</td>";
                echo    "                   <td>$shift</td>";
                echo    "                   <td>$operator1</td>";
                echo    "                   <td>$operator2</td>";
                echo    "                   <td>$operator3</td>";
                echo    "                   <td>$shiftHandoverMeeting</td>";
                echo    "               </tr>";
                echo    "           </tbody>";
                echo    "       </table>";
                echo    "       <table class='sub-menu-table'>";
                echo    "           <thead>";
                echo    "               <tr>";
                echo    "                   <th>Start of Shift Meeting</th>";
                echo    "                   <th>Plant Status</th>";
                echo    "                   <th>Equipment Outage</th>";
                echo    "                   <th>Filter Change</th>";
                echo    "                   <th>Pigging</th>";
                echo    "                   <th>Recycle Pumps</th>";
                echo    "                   <th>Production Tank Level</th>";
                echo    "               <tr>";
                echo    "           </thead>";
                echo    "           <tbody>";
                echo    "               <tr>";
                echo    "                   <td>$startOfShiftMeeting</td>";
                echo    "                   <td>$plantStatus</td>";
                echo    "                   <td>$equipmentOutage</td>";
                echo    "                   <td>$filterChange</td>";
                echo    "                   <td>$pigging</td>";
                echo    "                   <td>$recyclePumps</td>";
                echo    "                   <td>$productionTankLevel</td>";
                echo    "               </tr>";
                echo    "           </tbody>";
                echo    "       </table>";
                echo    "       <table class='sub-menu-table'>";
                echo    "           <thead>";
                echo    "               <tr>";
                echo    "                   <th>LPG Bullet Peak Level</th>";
                echo    "                   <th>LPG Bullet Peak Pressure</th>";
                echo    "                   <th>Berm Water Samples Taken</th>";
                echo    "                   <th>Plant Process Discussion</th>";
                echo    "                   <th>Operational Targets</th>";
                echo    "                   <th>Recycle Pumps</th>";                
                echo    "                   <th>Production Tank Level</th>";
                echo    "               </tr>";
                echo    "           </thead>";
                echo    "           <tbody>";
                echo    "               <tr>";
                echo    "                   <td>$lPG_BulletPeakLevel</td>";
                echo    "                   <td>$lPG_BulletPeakPressure</td>";
                echo    "                   <td>$bermWaterSamplesTaken</td>";
                echo    "                   <td>$plantProcessDiscussion</td>";
                echo    "                   <td>$operationalTargets</td>";
                echo    "                   <td>$recyclePumps</td>";
                echo    "                   <td>$productionTankLevel</td>";
                echo    "               </tr>";
                echo    "           </tbody>";
                echo    "       </table>";
                echo    "       <table class='sub-menu-table'>";
                echo    "           <thead>";
                echo    "               <tr>";
                echo    "                   <th>Upcoming Activities</th>";
                echo    "                   <th>HSE Concerns</th>";
                echo    "                   <th>Regulatory Requirements</th>";
                echo    "                   <th>Staff Discussion</th>";
                echo    "                   <th>Weather & Effects On Operations</th>";
                echo    "                   <th>Permit Extensions/Critical Tasks</th>";                
                echo    "               </tr>";
                echo    "           </thead>";
                echo    "           <tbody>";
                echo    "               <tr>";
                echo    "                   <td>$upcomingActivities</td>";
                echo    "                   <td>$hSE_Concerns</td>";
                echo    "                   <td>$regulatoryRequirements</td>";
                echo    "                   <td>$staffDiscussion</td>";
                echo    "                   <td>$weatherAndEffectsOnOperations</td>";
                echo    "                   <td>$permitExtensionsCriticalTasks</td>";
                echo    "               </tr>";
                echo    "           </tbody>";
                echo    "       </table>";
                echo    "       <p class='plant-log-remarks'>";
                echo    "           $remark";
                echo    "       </p>";                
                echo    "   </div>"; 
                echo    "</div>";
            }
        }
    ?>

    </div>
    
</body>
</html>