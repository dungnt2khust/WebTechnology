<?php
    $hobbies = array("Listen to music",
                    "Reading book",
                    "Go for a walk",
                    "Sports",
                    "Programming",
                    "Watch movie",
                    "Traveling",
                    "Fitness",
                    "Learning English",
                    "Board games",
                    "Guitar",
                    "Piano",
                    "Ukulele",
                    "Hip hop",
                    "Cosplay",
                    "Shopping",
                    "Hiking",
                    "Cycling",
                    "Exercising",
                    "Drawing",
                    "Painting",
                    "Cooking",
                    "Gardening",
                    "Collecting things",
                    "Fishing",
                    "Skating",
                    "Photography",
                    "Mobile games",
                    "Play computer games"
                    );
    $size = sizeof($hobbies);
    $input1 = "<input type=\"checkbox\" id=\"hobby"; 
    $input2 = "name=\"hobbies[]\" value=\"";
    $input4 = "<label for=\"hobby";
    $input5 = "\">";
    $input6 = "</label>";
    for ($i = 0; $i < $size; $i++) {
        $input3 = (string)($i + 1)."\" ";
        print("&ensp; &ensp;");
        print($input1.$input3.$input2.$hobbies[$i].$input5);
        print($input4.$input3.$input5.$hobbies[$i].$input6);
        print("<br>");
    }
?>
