<!-- Made by Christopher Barber August 2024 -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Westbrick Plant Logs - Pembina North - NP Daily Production 2</title>
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
    <h1 class="sub-page-title">Pembina North - NP Daily Production 2</h1>
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

        $query = "SELECT * FROM `np_daily_production2` ORDER BY `new_id` DESC, `author` DESC";
        $result = mysqli_query($conn, $query);
        if (mysqli_num_rows($result) > 0) {                                            
            while($row = mysqli_fetch_assoc($result)) {
                                
                $id = $row['id'];
                $newID = $row['new_id'];
                $newID = $newID + 9;   
                if($id != 0){
                    $new_id = $id;
                }
                $author = $row['author'];
                $inlet = $row['inlet'];
                $sales = $row['sales'];
                $lPG = $row['lpg'];
                $oil = $row['oil'];
                $productionMonth = $row['production_month'];
                $productionDay = $row['production_day'];
                $productionYear = $row['production_year'];                                
                $date = $row['date'];
                $time = $row['time'];
                $dateOfLog = $row['date_of_log'];

                echo    "<div class='plant-log'>";
                echo    "   <h1 class='log-title'>Plant Log #$newID</h1>";
                echo    "   <div class='table-wrapper'>";
                echo    "       <table class='sub-menu-table'>";
                echo    "           <thead>";
                echo    "               <tr>";                               
                echo    "                   <th>Message ID</th>";
                echo    "                   <th>Date of Log</th>";
                echo    "                   <th>Author</th>";
                echo    "                   <th>Inlet</th>";
                echo    "                   <th>Sales</th>";
                echo    "                   <th>LPG</th>";
                echo    "                   <th>Oil</th>";                
                echo    "               </tr>";
                echo    "           </thead>";
                echo    "           <tbody>";
                echo    "               <tr>";                
                echo    "                   <td>$newID</td>";
                echo    "                   <td>$dateOfLog</td>";
                echo    "                   <td>$author</td>";
                echo    "                   <td>$inlet</td>";
                echo    "                   <td>$sales</td>";
                echo    "                   <td>$lPG</td>";
                echo    "                   <td>$oil</td>";                
                echo    "               </tr>";
                echo    "           </tbody>";
                echo    "       </table>";
                echo    "       <table class='sub-menu-table'>";
                echo    "           <thead>";
                echo    "               <tr>";
                echo    "                   <th>Production Month</th>";
                echo    "                   <th>Production Day</th>";
                echo    "                   <th>Production Year</th>";                                
                echo    "                   <th>Date of Database Insertion</th>";
                echo    "                   <th>Time of Database Insertion</th>";                
                echo    "               <tr>";
                echo    "           </thead>";
                echo    "           <tbody>";
                echo    "               <tr>";                
                echo    "                   <td>$productionMonth</td>";
                echo    "                   <td>$productionDay</td>";
                echo    "                   <td>$productionYear</td>";                                
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