<?php
// PHP Data Objects(PDO) Sample Code:
try {
    $conn = new PDO("sqlsrv:server = tcp:summerhackserver.database.windows.net,1433; Database = summerhackdb", "adminsummerhack", "P455Summerhack");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch (PDOException $e) {
    print("Error connecting to SQL Server.");
    die(print_r($e));
}

// SQL Server Extension Sample Code:
$connectionInfo = array("UID" => "adminsummerhack", "pwd" => "P455Summerhack", "Database" => "summerhackdb", "LoginTimeout" => 30, "Encrypt" => 1, "TrustServerCertificate" => 0);
$serverName = "tcp:summerhackserver.database.windows.net,1433";
$conn = sqlsrv_connect($serverName, $connectionInfo);

$tsql = "SELECT PersonID, LastName, FirstName FROM Persons";  

/* Execute the query. */  

$stmt = sqlsrv_query( $conn, $tsql);

if ( $stmt )
{  
     echo "Statement executed.<br>\n";
     echo $tsql
}   
else   
{  
     echo "Error in statement execution.\n";  
     die( print_r( sqlsrv_errors(), true));  
}

?>