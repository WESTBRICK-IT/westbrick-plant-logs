<!-- Made by Christopher Barber August 2024 -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Westbrick Plant Logs - Plant One</title>
    <link rel="stylesheet" href="../style/style.css">
    <script src="../script/sub-menu-script.js" defer></script>    
    <link rel="icon" href="../favicon.ico" type="image/x-icon">
</head>
<body>
    <a href="../"><img class="main-title" src="../images/westbrick-plant-logs.svg" alt="Westbrick Plant Logs"></a>
    <h1 class="sub-page-title">Plant One</h1>
    <button class="button" onclick="window.location.href='./add-new-log/'" type="button">Add New Log</button>

    <div class="plant-log">
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
        $conn = mysqli_connect("localhost", "cbarber", "!!!Dr0w554p!!!", "IT_Inventory_DB");

        // Check connection
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
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
                echo    "                   <th>$lPG_BulletPeakLevel</th>";
                echo    "                   <th>$lPG_BulletPeakPressure</th>";
                echo    "                   <th>$bermWaterSamplesTaken</th>";
                echo    "                   <th>$plantProcessDiscussion</th>";
                echo    "                   <th>$operationalTargets</th>";
                echo    "                   <th>$recyclePumps</th>";
                echo    "                   <th>$productionTankLevel</th>";
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
                echo    "                   <th>$upcomingActivities</th>";
                echo    "                   <th>$hSE_Concerns</th>";
                echo    "                   <th>$regulatoryRequirements</th>";
                echo    "                   <th>$staffDiscussion</th>";
                echo    "                   <th>$weatherAndEffectsOnOperations</th>";
                echo    "                   <th>$permitExtensionsCriticalTasks</th>";
                echo    "               </tr>";
                echo    "           </tbody>";
                echo    "       </table>";
                echo    "       <p class='plant-log-remarks'>";
                echo    "           $remark";
                echo    "       </p>";
                echo    "       <td><img class='garbage-can garbage-can$id links-garbage-can links-garbage-can$id' src='../images/garbage-can.svg' alt='links Garbage Can $id'></td>";                
                echo    "   </div>";                
            }
        }

        

        // <div class="plant-log">
        //     <h1 class="log-title">Log #1</h1>
        //     <div class="table-wrapper">
        //         <table class="sub-menu-table">
        //             <thead>
        //                 <tr>                        
        //                     <th>Date</th>
        //                     <th>Time</th>
        //                     <th>Logbook</th>
        //                     <th>Message ID</th>
        //                     <th>Author</th>
        //                     <th>Shift</th>
        //                     <th>Operator 1</th>
        //                     <th>Operator 2</th>
        //                     <th>Operator 3</th>
        //                     <th>Shift Handover Meeting</th>
        //                 </tr>
        //             </thead>
        //             <tbody>
        //                 <tr>                        
        //                     <td>October 6th 1942</td>
        //                     <td>13:00</td>
        //                     <td>Plant Log 2</td>
        //                     <td>5996</td>
        //                     <td>Pat Brown</td>
        //                     <td>Day Shift</td>
        //                     <td>Pat B</td>
        //                     <td>Chris P (contractor)</td>
        //                     <td>-</td>
        //                     <td>Blaine H</td>                                                                                  
        //                 </tr>           
        //             </tbody>
        //         </table>
        //         <table class="sub-menu-table">
        //             <thead>
        //                 <tr>                                        
        //                     <th>Start of Shift Meeting</th>
        //                     <th>Plant Status</th>
        //                     <th>Equipment Outage</th>
        //                     <th>Filter Change</th>
        //                     <th>Pigging</th>
        //                     <th>Recycle Pumps</th> 
        //                     <th>Production Tank Level</th>                   
        //                 </tr>
        //             </thead>
        //             <tbody>
        //                 <tr>
        //                     <td>3.57</td> 
        //                     <td>-</td>
        //                     <td>Steady</td>
        //                     <td>-</td>
        //                     <td>-</td>
        //                     <td>-</td>
        //                     <td>Production | Overflow</td>                                                                                  
        //                 </tr>           
        //             </tbody>
        //         </table>
        //         <table class="sub-menu-table">
        //             <thead>
        //                 <tr>
        //                     <th>LPG Bullet Peak Level</th>
        //                     <th>LPG Bullet Peak Pressure</th>
        //                     <th>Berm Water Samples Taken</th>
        //                     <th>Plant Process Discussion</th>
        //                     <th>Operational Targets</th>
        //                     <th>Overrides or Safeties Bypassed</th>                                        
        //                 </tr>
        //             </thead>
        //             <tbody>
        //                 <tr> 
                                            
        //                     <td>149</td>
        //                     <td>426</td>
        //                     <td>No</td>
        //                     <td>Yes</td>
        //                     <td>Yes</td>
        //                     <td>N/A</td>                                       
        //                 </tr>           
        //             </tbody>
        //         </table>
        //         <table class="sub-menu-table">
        //             <thead>
        //                 <tr>      
        //                     <th>Upcoming Activities</th>
        //                     <th>HSE Concerns</th>
        //                     <th>Regulatory Requirements</th>
        //                     <th>Staff Discussion</th>
        //                     <th>Weather & Effects on Operations</th>
        //                     <th>Permit Extensions/Critical Tasks</th>                    
        //                 </tr>
        //             </thead>
        //             <tbody>
        //                 <tr>  
        //                     <td>Yes</td>
        //                     <td>Yes</td>
        //                     <td>Yes</td>
        //                     <td>Yes</td>
        //                     <td>No</td>
        //                     <td>N/A</td>                    
        //                 </tr>           
        //             </tbody>
        //         </table>
        //         <p class="plant-log-remarks">
        //             Weather was clear and warm highs of 20 
        //             Tank level was 3.57m and confirmed with a temp gun
        //             Kenspen here removing old piping overhead in the battery , They also pulled the checks from the water inj plant
        //             Surge here working on the positioner for the dominion line
        //             Surge electrican working on the C3 fan VFD
        //             Elite here catching where we take our samples from
        //             Core labs here catching weekly and monthly samples
        //             Vermilion ops stopped by to open their pig trap and send a pig
        //             Mechanics here working on the service's on K-203 and K-204
        //             They also replaced a bad valve on the inboard side of 4th stage of K-203
        //             C3 fans are both on the two speed is on slow                         
        //         </p>
        //     </div>
        // </div>
        // <div class="plant-log">
        //     <h1 class="log-title">Log #2</h1>
        //     <div class="table-wrapper">
        //         <table class="sub-menu-table">
        //             <thead>
        //                 <tr>
        //                     <th>Author</th>
        //                     <th>Shift</th>
        //                     <th>Operator 1</th>
        //                     <th>Operator 2</th>
        //                     <th>Operator 3</th>
        //                     <th>Shift Handover Meeting</th>
        //                 </tr>
        //             </thead>
        //             <tbody>
        //                 <tr>
        //                     <td>Pat Brown</td>
        //                     <td>Day Shift</td>
        //                     <td>Pat B</td>
        //                     <td>Chris P (contractor)</td>
        //                     <td>Blaine H</td>
        //                     <td>-</td>                                                          
        //                 </tr>           
        //             </tbody>
        //         </table>
        //         <table class="sub-menu-table">
        //             <thead>
        //                 <tr>                                        
        //                     <th>Start of Shift Meeting</th>
        //                     <th>Plant Status</th>
        //                     <th>Equipment Outage</th>
        //                     <th>Filter Change</th>
        //                     <th>Pigging</th>
        //                     <th>Recycle Pumps</th>                    
        //                 </tr>
        //             </thead>
        //             <tbody>
        //                 <tr>
        //                     <td>Pat Brown</td>
        //                     <td>Day Shift</td>
        //                     <td>Pat B</td>
        //                     <td>Chris P (contractor)</td>
        //                     <td>Blaine H</td>
        //                     <td>-</td>                                                          
        //                 </tr>           
        //             </tbody>
        //         </table>
        //         <table class="sub-menu-table">
        //             <thead>
        //                 <tr>                    
        //                     <th>Production Tank Level</th>
        //                     <th>LPG Bullet Peak Level</th>
        //                     <th>Berm Water Samples Taken</th>
        //                     <th>Plant Process Discussion</th>
        //                     <th>Operational Targets</th>
        //                     <th>Overrides or Safeties Bypassed</th>                                        
        //                 </tr>
        //             </thead>
        //             <tbody>
        //                 <tr>                    
        //                     <td>149</td>
        //                     <td>426</td>
        //                     <td>No</td>
        //                     <td>Yes</td>
        //                     <td>Yes</td>
        //                     <td>N/A</td>                                       
        //                 </tr>           
        //             </tbody>
        //         </table>
        //         <table class="sub-menu-table">
        //             <thead>
        //                 <tr>      
        //                     <th>Upcoming Activities</th>
        //                     <th>HSE Concerns</th>
        //                     <th>Regulatory Requirements</th>
        //                     <th>Staff Discussion</th>
        //                     <th>Weather & Effects on Operations</th>
        //                     <th>Permit Extensions/Critical Tasks</th>                    
        //                 </tr>
        //             </thead>
        //             <tbody>
        //                 <tr>  
        //                     <td>Yes</td>
        //                     <td>Yes</td>
        //                     <td>Yes</td>
        //                     <td>Yes</td>
        //                     <td>No</td>
        //                     <td>N/A</td>                    
        //                 </tr>           
        //             </tbody>
        //         </table>
        //         <p class="plant-log-remarks">
        //             Weather was clear and warm highs of 20 
        //             Tank level was 3.57m and confirmed with a temp gun
        //             Kenspen here removing old piping overhead in the battery , They also pulled the checks from the water inj plant
        //             Surge here working on the positioner for the dominion line
        //             Surge electrican working on the C3 fan VFD
        //             Elite here catching where we take our samples from
        //             Core labs here catching weekly and monthly samples
        //             Vermilion ops stopped by to open their pig trap and send a pig
        //             Mechanics here working on the service's on K-203 and K-204
        //             They also replaced a bad valve on the inboard side of 4th stage of K-203
        //             C3 fans are both on the two speed is on slow                         
        //         </p>
        //     </div>
        // </div>
    ?>

    </div>
    <button class="button go-back-button" type="button">Go back</button>
</body>
</html>