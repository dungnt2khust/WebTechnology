
<html><head><title>Insert</title></head><body>
<?php
    $server = 'localhost';
    $user = 'root';
    $pass = 'Dung3112';
    $mydb = 'mydatabase';
    $table_name = 'Products';
    $itemDescription = $_GET["itemDescription"];
    $weight = $_GET["weight"];
    $cost = $_GET["cost"];
    $numberAvaiable = $_GET["numberAvaiable"];
    $connect = mysqli_connect($server, $user, $pass);

    if (!$connect) {
        die ("Cannot connect to $server using $user");
    } else {
        if ($itemDescription != "" || $weight != "" || $cost != "" || $numberAvaiable != ""){
            $SQLcmd = "INSERT INTO $table_name (Product_desc, Weight, cost, Numb)
                       VALUES ('$itemDescription', '$weight', '$cost', '$numberAvaiable')";
            mysqli_select_db($connect, $mydb);
            if (mysqli_query($connect, $SQLcmd, $resultMode = MYSQLI_STORE_RESULT)){
                print ("You added a item in table products");
            } else {
                die ("Add a item Failed SQLcmd=$SQLcmd");
            } 
            mysqli_close($connect);
        } else {
            print ("Please enter all of fields");
        }
    }
?></body></html> 
