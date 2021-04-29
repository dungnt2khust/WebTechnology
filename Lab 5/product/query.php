
<html><head><title>Query</title></head><body>
<?php
    $server = 'localhost';
    $user = 'root';
    $pass = 'Dung3112';
    $mydb = 'mydatabase';
    $table_name = 'Products';
    $connect = mysqli_connect($server, $user, $pass);
    $border = 'style="border:1px solid black;border-collapse:collapse;padding:5px;"';
    print ('<span style="color:blue;font-size:200%;">Products Data</span></br>');
    print ("The Query is SELECT * from Products </br></br>");
    if (!$connect) {
        die ("Cannot connect to $server using $user");
    } else {
        $SQLcmd = "SELECT * FROM $table_name";
        mysqli_select_db($connect, $mydb);
        if (mysqli_query($connect, $SQLcmd, $resultMode = MYSQLI_STORE_RESULT)){
            $printTable = "<table " . $border . ">
                                <tr>
                                    <td " . $border . ">Num</td>
                                    <td " . $border . ">Product</td>
                                    <td " . $border . ">Cost</td>
                                    <td " . $border . ">Weight</td>
                                    <td " . $border . ">Count</td>
                                </tr>";
            print ($printTable);
            
            $query = mysqli_query($connect, $SQLcmd);
            while ($row = mysqli_fetch_array($query)) {
                $printRow = "<tr>
                                <td " . $border . ">" . $row["ProductID"] . "</td>
                                <td " . $border . ">" . $row["Product_desc"] . "</td>
                                <td " . $border . ">" . $row["Cost"] . "</td>
                                <td " . $border . ">" . $row["Weight"] . "</td>
                                <td " . $border . ">" . $row["Numb"] . "</td>
                            </tr>";
                print ($printRow);
            }
            print ("</table>");
        } else {
            die ("Query data Failed SQLcmd=$SQLcmd");
        } 
        mysqli_close($connect);
    }
?></body></html> 
