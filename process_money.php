<?php
session_start();



if(!empty($_POST)) {
    $add_gold = 0;
    $building = $_POST["building"];
    switch($building){
        
        case "farm":
            $add_gold = random_int(10,20);
            break;

        case "cave":
            $add_gold = random_int(5,10);
            break;

        case "house":
            $add_gold = random_int(2,5);
            break;

        case "casino":
            if($_SESSION["gold"] < 50) {
                array_push($_SESSION["activities"], ["class" => "red", "message" => "You do not have enough gold to enter casino."]);
                header("Location: index.php");
                die;
            }
            $add_gold = random_int(-50, 50);
            break;
            
        default:
            $_SESSION["gold"] = 0;
            array_push($_SESSION["activities"], ["class" => "red", "message" => "Cheaters never prosper."]);
            header("Location: index.php");
            die;

    }
    $_SESSION["gold"] = $_SESSION["gold"] + $add_gold;

    $date = date("F j, Y, g:i a");
    $activity = [];
    if($add_gold >= 0) {
        $activity["class"] = "green";
        $activity["message"] = "You entered a $building and earned $add_gold gold. $date";
    } else {
        $activity["class"] = "red";
        $activity["message"] = "You entered a casino and lost $add_gold gold. $date";
    }
    array_push($_SESSION["activities"], $activity);

    header("Location: index.php");

} else if(!empty($_GET)) {
    if($_GET["reset"] == true) {
        session_destroy();
        header("Location: index.php");
    }
}