<!-- Made by Christopher Barber July 2024 -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Westbrick IT Plant Logs - Pembina North - Plant Log 2 - Add New Log</title>
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
        $shiftHandoverMeeting = $_POST['shift-handover-meeting'];
        $startOfShiftMeeting = $_POST['start-of-shift-meeting'];
        $operators = $_POST['operators'];
        // $operator1 = $_POST['operator1'];
        // $operator2 = $_POST['operator2'];
        // $operator3 = $_POST['operator3'];
        $plantStatus = $_POST['plant-status'];
        $equipmentOutage = $_POST['equipment-outage'];
        $filterChange = $_POST['filter-change'];
        $pigging = $_POST['pigging'];
        $recyclePumps = $_POST['recycle-pumps'];
        $productionTankLevel = $_POST['production-tank-level'];
        $lPG_BulletPeakLevel = $_POST['lpg-bullet-peak-level'];
        $lPG_BulletPeakPressure = $_POST['lpg-bullet-peak-pressure'];
        $bermWaterSamplesTaken = $_POST['berm-water-samples-taken'];
        $plantProcessDiscussion = $_POST['plant-process-discussion'];
        $operationalTargets = $_POST['operational-targets'];
        $overRidesOrSafetiesBypassed = $_POST['over-rides-or-safeties-bypassed'];
        $upcomingActivities = $_POST['upcoming-activities'];
        $hSE_Concerns = $_POST['hse-concerns'];
        $regulatoryRequirements = $_POST['regulatory-requirements'];
        $staffDiscussion = $_POST['staff-discussion'];
        $weatherAndEffectsOnOperations = $_POST['weather-and-effects-on-operations'];
        $permitExtensionsCriticalTasks = $_POST['permit-extensions-critical-tasks'];
        $amineBagFilterChanged = $_POST['amine-bag-filter-changed'];
        $glycolRegenFilterChanged = $_POST['glycol-regen-filter-changed'];
        $category = $_POST['category'];
        $roustaboutUtilization = $_POST['roustabout-utilization'];
        $amineConcentration = $_POST['amine-concentration'];
        $remark = $_POST['remark'];        
        $date = date('Y-m-d');        
        date_default_timezone_set('America/Denver'); 
        $time = date('H:i:s', time());
        $dateOfLog = $date . " " . $time;
        function convertApostrophe($string) { 
            $newString = str_replace("'", '`', $string); 
            return $newString; 
        }    
        
        $remark = convertApostrophe($remark);
        $author = convertApostrophe($author);
        $shift = convertApostrophe($shift);
        $shiftHandoverMeeting = convertApostrophe($shiftHandoverMeeting);        
        function addSpacingToRemark($remark) {                      
            $remark = str_replace(["\r", "\n"], "<p></p>", $remark);
            return $remark;
        }
        $remark = addSpacingToRemark($remark);  
        
        $logDate = date('Y-m-d H:i:s');
        
        $sql = "INSERT INTO plant_log2 (author, shift, shift_handover_meeting, plant_status, equipment_outage, filter_change, pigging, recycle_pumps, amine_concentration, production_tank_level, lpg_bullet_peak_level, lpg_bullet_peak_pressure, berm_water_samples_taken, plant_process_discussion, operational_targets, overrides_or_safeties_bypassed, upcoming_activities, hse_concerns, regulatory_requirements, staff_discussion, weather_and_effects_on_operations, permit_extensions_critical_tasks, remark, date, time, start_of_shift_meeting, amine_bag_filter_changed, glycol_regen_filter_changed, category, roustabout_utilization, operators, date_of_log, log_date) VALUES ('$author', NULLIF('$shift',''), '$shiftHandoverMeeting', '$plantStatus', '$equipmentOutage', '$filterChange', NULLIF('$pigging',''), '$recyclePumps', NULLIF('$amineConcentration',''), NULLIF('$productionTankLevel',''), NULLIF('$lPG_BulletPeakLevel',''), NULLIF('$lPG_BulletPeakPressure',''), NULLIF('$bermWaterSamplesTaken',''), NULLIF('$plantProcessDiscussion',''), NULLIF('$operationalTargets',''), NULLIF('$overRidesOrSafetiesBypassed',''), NULLIF('$upcomingActivities',''), NULLIF('$hSE_Concerns',''), NULLIF('$regulatoryRequirements',''), NULLIF('$staffDiscussion',''), NULLIF('$weatherAndEffectsOnOperations',''), '$permitExtensionsCriticalTasks', '$remark', '$date', '$time', '$startOfShiftMeeting', '$amineBagFilterChanged', '$glycolRegenFilterChanged', '$category', '$roustaboutUtilization', '$operators', '$dateOfLog', '$logDate')";
        
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
            echo    "<button class='home-button' type='button' onclick='window.location.href=`index.html`;'>Index</button>";
            echo "</div>";
        }
        $conn->close();
        
    ?>
</body>