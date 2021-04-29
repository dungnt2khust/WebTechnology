<html><head><title>query</title>

<style>
.item2 { grid-area: menu; }
.item3 { grid-area: main; }


.grid-container {
  display: grid;
  grid-template-areas:
    'menu main main ';
  grid-gap: 10px;
  padding: 10px;
}

.grid-container > div {
  
  text-align: center;
  padding: 20px 0;

}
</style>
</head>
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
    
    
    $SQLcmd = "SELECT  * FROM  $table_name";
    
mysqli_select_db($connect, $mydb);
$result =mysqli_query($connect, $SQLcmd);
//print($result);

if(isset($_GET['name'])){
    //echo "aaaaa";
    $name=$_GET['name'];$addr=$_GET['addr'];$city=$_GET['city'];$phone=$_GET['phone'];$url=$_GET['url'];
    $SQLcmd = "INSERT INTO businesses (Name, Address, City, Telephone, URL)
    VALUES('$name','$addr','$city','$phone','$url')";
    
    mysqli_select_db($connect, $mydb);
    
    if (mysqli_query($connect, $SQLcmd, $resultMode = MYSQLI_STORE_RESULT)){
        $SQLcmd = "SELECT  * FROM  businesses WHERE Name='$name'";
       
        mysqli_select_db($connect, $mydb);
        $businessID =mysqli_query($connect, $SQLcmd);
        $id;
        while($rowid = mysqli_fetch_assoc($businessID)){
            $id=$rowid['BusinessID'];

        }
        echo $id;
        echo $rowid['BusinessID'];
        foreach ($_GET['cate'] as $cateSelect)
        {
            $SQLcmd = "INSERT INTO biz_categories (CategoryID,BusinessID)
            VALUES('$cateSelect',$id)";
            
            mysqli_select_db($connect, $mydb);
            
            if (mysqli_query($connect, $SQLcmd, $resultMode = MYSQLI_STORE_RESULT)){
                print '<font size="4" color="blue" >INSERT INTO';
                print "<i>$table_name</i> in database<i>$mydb</i><br></font>";
                print "Successfully";
            }else{
                die ("Insert Failed SQLcmd=$SQLcmd");
            }
        }
        print '<font size="4" color="blue" >INSERT INTO';
        print "<i>$table_name</i> in database<i>$mydb</i><br></font>";
        print "Successfully";
    } else {
        die ("Insert Failed SQLcmd=$SQLcmd");
    }
}

mysqli_close($connect);
}
?>
<h1>Business Registration  </h1>
<form  action="">
	<div class="grid-container">
		<div class="item2">
    		<label for="cate">Click on one or control click on multiple categories:</label>
    		</br>
    		<select id="cate" style="width: 400px;height: 100px;" name="cate[]"  multiple>
    		    <?php 
    		          while($row = mysqli_fetch_assoc($result)){
    		              echo "<option value=\"". $row['CategoryID'] . "\">". $row['Title'] ."</option>";
                    }
    		    ?>

    		</select><br><br>
		</div>
  <div class="item3">
	<table>
			<tr>
				<td>Business Name : </td>
				<td><input type="text" size="60" name="name" required ></td>
			</tr>
			<tr>
				<td>Address : </td>
				<td><input type="text" size="60"  name="addr"></td>
			</tr>
			<tr>
				<td>City : </td>
				<td><input type="text" size="60"  name="city"></td>
			</tr>
			<tr>
				<td>Telephone </td>
				<td><input type="text" size="60"name="phone"></td>
			</tr>
			<tr>
				<td>URL  </td>
				<td><input type="text" size="60"  name="url"></td>
			</tr>

			
		</table>
</div>  

</div>
<input type="SUBMIT" value="Add business">
</form>

</body>