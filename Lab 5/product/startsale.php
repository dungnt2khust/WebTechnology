<html>
<head>
    <title>Start Sale</title>
</head>
<body>
<?php
    $server = 'localhost';
    $user = 'root';
    $pass = 'Dung3112';
    $mydb = 'mydatabase';
    $table_name = 'products';
    $connect = mysqli_connect($server, $user, $pass);
    $border = 'style="border:1px solid black;border-collapse:collapse;padding:5px;"';
    print ('<span style="color:blue;font-size:200%;">Select Product We Just Sold</span></br>');
    print ('<form action="sale.php" method="GET">');
    if (!$connect) {
        die ("Cannot connect to $server using $user");
    } else {
            $SQLcmd = "SELECT * FROM $table_name";
            mysqli_select_db($connect, $mydb);
            if (mysqli_query($connect, $SQLcmd, $resultMode = MYSQLI_STORE_RESULT)){
                $queryForm = mysqli_query($connect, $SQLcmd);
                $queryTable = mysqli_query($connect, $SQLcmd);
                while ($row = mysqli_fetch_array($queryForm)) {
                    $value = $row["Product_desc"];
                    $radio = '<input type="radio" name="product" id="'. $value . '"' . 'value="' . $value . '">
                            <label for="'. $value . '">' . $value . '</label>';
                    print ($radio);
                }
                print ('</br></br><input type="submit" value="Click To Submit">
                        <input type="reset" value="Reset"></form></br></br>');
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
                $end = '</table>';
                print ($end);
            } else {
                die ("Add a item Failed SQLcmd=$SQLcmd");
            } 
            mysqli_close($connect);
    }
?>
</body>
</html> 
