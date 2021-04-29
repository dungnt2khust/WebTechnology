
<html>
<head>
    <title>Update results</title>
</head>
<body>
<?php
    $server = 'localhost';
    $user = 'root';
    $pass = 'Dung3112';
    $mydb = 'mydatabase';
    $table_name = 'Products';
    $product = $_GET["product"];
    $connect = mysqli_connect($server, $user, $pass);
    $border = 'style="border:1px solid black;border-collapse:collapse;padding:5px;"';
    print ('<span style="color:blue;font-size:200%;">Update Results for Table Products</span></br></br></br>');
    if (!$connect) {
        die ("Cannot connect to $server using $user");
    } else {
            $SQLcmd = "UPDATE $table_name SET Numb = Numb - 1 WHERE (Product_desc = '$product')";
            mysqli_select_db($connect, $mydb);
            if (mysqli_query($connect, $SQLcmd, $resultMode = MYSQLI_STORE_RESULT)){
                $SQLcmd2 = "SELECT * FROM $table_name";
                if (mysqli_query($connect, $SQLcmd2, $resultMode = MYSQLI_STORE_RESULT)) {
                    $queryTable = mysqli_query($connect, $SQLcmd2);
                    $printTable = '<table ' . $border . '>
                                    <tr>
                                        <td ' . $border . '>Num</td>
                                        <td ' . $border . '>Product</td>
                                        <td ' . $border . '>Cost</td>
                                        <td ' . $border . '>Weight</td>
                                        <td ' . $border . '>Count</td>
                                    </tr>';
                    print ($printTable);
                    while ($rowTable = mysqli_fetch_array($queryTable)) {
                        $printRow = '<tr>
                                        <td ' . $border . '>' . $rowTable["ProductID"] . '</td>
                                        <td ' . $border . '>' . $rowTable["Product_desc"] . '</td>
                                        <td ' . $border . '>' . $rowTable["Cost"] . '</td>
                                        <td ' . $border . '>' . $rowTable["Weight"] . '</td>
                                        <td ' . $border . '>' . $rowTable["Numb"] . '</td>
                                    </tr>';
                        print ($printRow);
                    }
                    print ("</form>");
                } else {
                    die ("Query table failed SQLcmd=$SQLcmd2");
                }
            } else {
                die ("Update amount Failed SQLcmd=$SQLcmd");
            } 
            mysqli_close($connect);
    }
?>
</body>
</html> 
