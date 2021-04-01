<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Date Time Process</title>
</head>
<body>
    <p>Enter your name and select date and time for the appoinment</p>
    <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="GET">
    <table>
    <tr>
        <td>Your name:</td>
        <td><input type="text" name="name"></td>
    </tr>
    <tr>
        <td>Date:</td>
        <td>
            
            <select id="day" name="day" >
            <?php
                    for($i = 1; $i <= 31; ++$i){
                        echo "<option>$i</option>" ;
                    }
            ?>
            </select>
            <select id="month" name="month" onselect="selection()">
            <?php
                    for($i = 1; $i <= 12; ++$i){
                        echo "<option>$i</option>" ;
                    }
            ?>
            </select>
            <select id="year" name="year" onselect="selection()">
            <?php
                    for($i = 1600; $i <= 2021; ++$i){
                        echo "<option>$i</option>" ;
                    }
            ?>
            </select>
        </td>
    </tr>
    <tr>
        <td>Time:</td>
    
        <td>
            <select name="hour">
                <?php
                    for($i = 0; $i <= 24; ++$i){
                        echo "<option>$i</option>" ;
                    }
                ?>
            </select>
            <select name="minute">
            <?php
                    for($i = 0; $i <= 59; ++$i){
                        echo "<option>$i</option>" ;
                    }
            ?>
            </select> 
            <select name="second">
            <?php
                    for($i = 0; $i <= 59; ++$i){
                        echo "<option>$i</option>" ;
                    }
            ?>
            </select> 
        </td>
    </tr>
    <tr>
    <td><input type="Submit" value="Submit"></td>
    <td><input type="Reset" value= "Reset"></td>
    </tr>
    </table>
    <?php
        $day = $_GET["day"]; $month = $_GET["month"]; $year = $_GET["year"];
        $hour = $_GET["hour"]; $minute = $_GET["minute"]; $second=$_GET["second"];
        
        
        if(array_key_exists("name", $_GET)){
            echo "Hi $_GET[name] <br>";
            echo "You have choose to have an appointment on $hour:$minute:$second, $day/$month/$year";
            echo "<br><br>";
            echo "More infomation <br><br>";
            $string1 = "AM";
            if($hour > 12 ){
                $hour = $hour - 12;
                $string1 = "PM";
            }
            echo "In 12 hours, the time and date is $hour:$minute:$second $string1, $day/$month/$year <br>";
            $day30 = array(4,6,9,11);
            $day31 = array(1,3,5,7,8,10,12);
            if(in_array($month, $day30)){
                echo "This month has 30 days!";
            }
            if(in_array($month,$day31)){
                echo "This month has 31 days!";
            }
            if($month == 2){
                if($year % 4 == 0){
                    if($year % 100 == 0 & $year % 400 != 0){
                        echo "This month has 28 days !";
                    }
                    else
                        echo "This month has 29 days !";
                }
                else{
                    echo "This month has 28 days !";
                }
            }
            
        }
        
        
    ?>
   
    </form>
</body>
</html>