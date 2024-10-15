<!-- Made by Christopher Barber August 2024 -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Westbrick Plant Logs - Pembina North - Safety Bypass Log 2</title>
    <link rel="stylesheet" href="../../style/style.css">
    <script src="../../script/sub-menu-script.js" defer></script>    
    <script type="text/javascript" src="../../script/jquery.js" defer></script>
    <script src="../../script/loading.js" defer></script>
    <link rel="icon" href="../../favicon.ico" type="image/x-icon">
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
    <h1 class="sub-page-title">Pembina North - Safety Bypass Log 2</h1>
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

        $query = "SELECT * FROM `safety_bypass_log2` ORDER BY `new_id` DESC, `author` DESC";
        $result = mysqli_query($conn, $query);
        if (mysqli_num_rows($result) > 0) {                                            
            while($row = mysqli_fetch_assoc($result)) {
                                
                $id = $row['id'];    
                $newID = $row['new_id'];
                $newID = $newID - 227;
                if($id != 0){
                    $newID = $id;
                }
                $author = $row['author'];
                $dateAndTimeOfBypass = $row['date_and_time_of_bypass'];
                $dateTimeOfBypass = $row['date_time_of_bypass'];
                $safeWorkPermitNumber = $row['safe_work_permit_number'];
                $equipmentName = $row['equipment_name'];
                $deviceTag = $row['device_tag'];
                $estimatedBypassRemovalDateTime = $row['estimated_bypass_removal_date_time'];                
                $remark = $row['remark'];
                $dateOfLog = $row['date_of_log'];
                $timeOfLog = $row['time_of_log'];  
                $estimatedBypassRenewal = $row['estimated_bypass_renewal'];
                $dateOfDatabaseInsertion = $row['date'];
                $timeOfDatabaseInsertion = $row['time'];
                $bypassFormNumber = $row['bypass_form_number'];
                $dateTimeOfBypassRemoval = $row['date_time_of_bypass_removal'];

                echo    "<div class='plant-log'>";
                echo    "   <h1 class='log-title'>Plant Log #$newID</h1>";
                echo    "   <div class='table-wrapper'>";
                echo    "       <table class='sub-menu-table'>";
                echo    "           <thead>";
                echo    "               <tr>";
                echo    "                   <th>Date of Log</th>";                
                echo    "                   <th>Message ID</th>";
                echo    "                   <th>Author</th>";
                // echo    "                   <th>Date and Time of Bypass</th>";
                echo    "                   <th>Safe Work Permit Number</th>";
                echo    "                   <th>Equipment Name</th>";
                echo    "                   <th>Device Tag</th>";
                echo    "                   <th>Estimated Bypass Removal Date/Time</th>";
                echo    "                   <th>Date / Time of Bypass</th>";
                echo    "                   <th>Estimated Bypass Renewal</th>";
                echo    "                   <th>Date of Database Insertion</th>";
                echo    "                   <th>Time of Database Insertion</th>";
                echo    "                   <th>Bypass Form Number</th>";
                echo    "                   <th>Date / Time of Bypass Removal</th>";
                echo    "               </tr>";
                echo    "           </thead>";
                echo    "           <tbody>";
                echo    "               <tr>";
                echo    "                   <td>$dateOfLog</td>";                
                echo    "                   <td>$newID</td>";
                echo    "                   <td>$author</td>";
                // echo    "                   <td>$dateAndTimeOfBypass</td>";
                echo    "                   <td>$safeWorkPermitNumber</td>";
                echo    "                   <td>$equipmentName</td>";
                echo    "                   <td>$deviceTag</td>";
                echo    "                   <td>$estimatedBypassRemovalDateTime</td>";
                echo    "                   <td>$dateTimeOfBypass</td>";
                echo    "                   <td>$estimatedBypassRenewal</td>";
                echo    "                   <td>$dateOfDatabaseInsertion</td>";
                echo    "                   <td>$timeOfDatabaseInsertion</td>";
                echo    "                   <td>$bypassFormNumber</td>";
                echo    "                   <td>$dateTimeOfBypassRemoval</td>";
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