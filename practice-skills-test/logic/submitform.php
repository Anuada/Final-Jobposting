<?php

include "../util/dbhelper.php";

$db = new DbHelper;


if (isset($_POST["submit"])) {
    $name = $_POST["name"];
    $work = $_POST["work"];
    $email = $_POST["email"];
    
    if (!empty(trim($name)) && !empty(trim($work)) && !empty(trim($email))) {
        $addEmployee = $db->addRecord("applywork", ["name" => $name, "work" => $work, "email" => $email]);
        if ($addEmployee > 0) {
            header("Location: ../employee/view_work.php?m=EMPLOYEE+DELETED+SUCCESSFULLY");
            exit();
        } else {
            header("Location: ../?m=NO+DATA+WAS+ADDED");
            exit();
        }
    } else {
        header("Location: ../");
        exit();
    }
} else {
    header("Location: ../");
    exit();
}


