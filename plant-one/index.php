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

        $query = "SELECT * FROM `links` ORDER BY `first_id` DESC, `second_id` DESC";
        $result = mysqli_query($conn, $query);
        if (mysqli_num_rows($result) > 0) {                                            
            while($row = mysqli_fetch_assoc($result)) {
                
                $id = $row['id'];
                
                echo    "   <h1 class='log-title'>Log #$id</h1>";
                
                
                echo    "           <td><img class='garbage-can garbage-can$id links-garbage-can links-garbage-can$id' src='../images/garbage-can.svg' alt='links Garbage Can $id'></td>";
                echo    "       </tr>"; 
                
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