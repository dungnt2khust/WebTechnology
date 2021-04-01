<html>
    <head><title>Personal Information</title></head>
    <body>
        <font size=5> Thank you: Got your input.</font>
        <br>
        <?php
            $name = $_GET["name"];
            $university = $_GET["university"];
            $class = $_GET["class"];
            $hobbies = $_GET["hobbies"];
            print("<br>Hello, $name");
            print("<br>You are studying at: $class, $university");
            print("<br>Your hobby is:");
            print("<ul>");
            foreach ($hobbies as $hobby) {
                print("<li>$hobby</li>");
            }
            print("</ul>");
        ?>
    </body>
</html>