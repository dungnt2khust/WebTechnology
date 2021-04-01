<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercise</title>
</head>
<body>
    <form ACTION ="http://localhost/PHP/Lab%202.1/Exercise.php" METHOD="GET">
        Your name: &ensp; &ensp; &ensp; <input type="text" name="name">
        <br></br>
        Your university:   &nbsp;<input type="text" name="university"> 
        <br></br>
        Your class: &ensp; &ensp; &nbsp;&ensp;<input type="text" name="class">
        <br></br>
        Your hobbies:
        <br>
       <br>
        <?php include 'include.php'; ?>
        <br>
        <input type="SUBMIT" value="Click To Submit">
        <input type="RESET" value="Erase and Restart">

    </form>
</body>
</html>