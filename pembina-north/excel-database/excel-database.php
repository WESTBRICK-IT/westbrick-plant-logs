<?php    

    header("Content-Type: application/vnd.ms-excel");
    header("Content-Disposition: attachment; filename=export.xls");
    header("Pragma: no-cache");
    header("Expires: 0");

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

    $sql = "SELECT * FROM np_daily_production2"; // Change 'your_table_name' to your actual table name
    $result = $conn->query($sql);

    // Initialize variables to store data for Excel
    $data = [];

    // Fetch data
    if ($result->num_rows > 0) {
        // Get field names as header
        $fieldInfo = $result->fetch_fields();
        $headers = [];
        foreach ($fieldInfo as $field) {
            $headers[] = $field->name;
        }
        $data[] = implode("\t", $headers); // Add header

        // Fetch each row and add to data
        while ($row = $result->fetch_assoc()) {
            $data[] = implode("\t", array_values($row));
        }
    }

    // Close connection
    $conn->close();

    // Output data
    echo implode("\n", $data);
    exit;
?>
