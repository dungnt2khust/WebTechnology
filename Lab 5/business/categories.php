<html><head><title>query</title></head>
<body>
<?php
$server = 'localhost';
$user = 'root';
$pass = 'Dung3112';
$mydb = 'business_service';
$table_name = 'categories';
$connect = mysqli_connect($server, $user, $pass, $mydb);

if (!$connect) {
    die ("Cannot connect to $server using $user");
} else {
    
    if (isset($_GET['cateid'])) {
        $cateid=$_GET['cateid'];$title=$_GET['title'];$desc=$_GET['desc'];
        
        $SQLcmd = "INSERT INTO $table_name (CategoryID, Title, Description)
        VALUES('$cateid','$title','$desc')";
        mysqli_select_db($connect, $mydb);
        
        if (mysqli_query($connect, $SQLcmd, $resultMode = MYSQLI_STORE_RESULT)){
            print '<font size="4" color="blue" >INSERT INTO';
            print "<i>$table_name</i> in database<i>$mydb</i><br></font>";
            print "Successfully";
        } else {
            die ("Insert Failed SQLcmd=$SQLcmd");
        }
        
    }
    
    $SQLcmd = "SELECT  * FROM  $table_name";
    
mysqli_select_db($connect, $mydb);
$result =mysqli_query($connect, $SQLcmd);
//print($result);
if($result){
    echo "<H1>Products list</H1>";
    echo "<table>";
    echo "<tr>";
    echo "<th>CategoryID</th>";
    echo "<th>Title</th>";
    echo "<th>Description</th>";
    echo "</tr>";
    while($row = mysqli_fetch_assoc($result)){
        echo "<tr>";
        echo "<td>" . $row['CategoryID'] . "</td>";
        echo "<td>" . $row['Title'] . "</td>";
        echo "<td>" . $row['Description'] . "</td>";
        echo "</tr>";
    }
    ?>
    	<form action="bizlist.php" method="GET">
			<tr>
				<td><input type="text"  name="cateid"></td>
				<td><input type="text"  name="title"></td>
				<td><input type="text"  name="desc"></td>
			</tr>
			

    <?php 
    echo "</table>";
    echo "<input type=\"SUBMIT\" value=\"Submit\">";
    echo "</form>";
} else {
    die ("select Failed SQLcmd=$SQLcmd");
}




mysqli_close($connect);
}
?>