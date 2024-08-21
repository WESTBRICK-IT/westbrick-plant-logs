<!-- Made by Christopher Barber August 2024 -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Westbrick IT Inventory - Users</title>
    <link rel="stylesheet" href="../style/style.css">
    <script src="../script/sub-menu-script.js" defer></script>    
    <link rel="icon" href="../favicon.ico" type="image/x-icon">
</head>
<body>
    <a href="../"><img class="main-title" src="../images/westbrick-it-inventory.svg" alt="Westbrick IT Inventory"></a>
    <h1 class="sub-page-title">Users</h1>
    <button class="button" onclick="window.location.href='./add-new-user/'" type="button">Add New Log</button>
    <div class="table-wrapper">
        <table class="sub-menu-table">
            <thead>
                <tr>
                    <th>Author</th>
                    <th>Shift</th>
                    <th>Operator 1</th>
                    <th>Operator 2</th>
                    <th>Operator 3</th>
                    <th>Shift Handover Meeting</th>                    
                    <th>Start of Shift Meeting</th>
                    <th>Plant Status</th>
                    <th>Equipment Outage</th>
                    <th>Filter Change</th>
                    <th>Pigging</th>
                    <th>Recycle Pumps</th>
                    <th>Production Tank Level</th>
                    <th>LPG Bullet Peak Level</th>
                    <th>Berm Water Samples Taken</th>
                    <th>Plant Process Discussion</th>
                    <th>Operational Targets</th>
                    <th>Overrides or Safeties Bypassed</th>
                    <th>Upcoming Activities</th>
                    <th>HSE Concerns</th>
                    <th>Regulatory Requirements</th>
                    <th>Staff Discussion</th>
                    <th>Weather & Effects on Operations</th>
                    <th>Permit Extensions/Critical Tasks</th>
                    <th>Remarks</th>
                </tr>
            </thead>
            <tbody>
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
    
                 $query = "SELECT * FROM `users` ORDER BY `last_name` DESC, `first_name` DESC";
                 $result = mysqli_query($conn, $query);
                 if (mysqli_num_rows($result) > 0) {                                            
                    while($row = mysqli_fetch_assoc($result)){
                       
                       $username = $row["username"];
                       $firstName = $row["first_name"];
                       $lastName = $row["last_name"];
                       $cellPhoneNumber = $row["cell_phone_num"];
                       $officePhoneNumber = $row["office_phone_num"];
                       $extensionNumber = $row["extension_num"];
                       $positionTitle = $row["position_title"];
                       $email = $row["email"];
                       $date = $row["date"];
                       $time = $row["time"];                       
                       $email = $row["email"];
                       $id = $row["id"];                      
                
                        // echo    "   <tbody>";
                        echo    "       <tr>";
                        echo    "           <td>$username</td>";
                        echo    "           <td>$firstName</td>";
                        echo    "           <td>$lastName</td>";
                        echo    "           <td>$cellPhoneNumber</td>";
                        echo    "           <td>$officePhoneNumber</td>";
                        echo    "           <td>$extensionNumber</td>";
                        echo    "           <td>$email</td>";
                        echo    "           <td>$positionTitle</td>";
                        echo    "           <td><img class='garbage-can garbage-can$id user-garbage-can user-garbage-can$id' src='../images/garbage-can.svg' alt='users Garbage Can $id'></td>";
                        echo    "       </tr>";
                        // echo    "   </tbody>";
                    }
                }
            ?>
            </tbody>
        </table>
    </div>
    <button class="button go-back-button" type="button">Go back</button>
</body>
</html>