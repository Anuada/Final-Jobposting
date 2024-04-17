<?php

include "../util/dbhelper.php";

$db = new DbHelper;


if (isset($_POST["submit"])) {
    $Jobname = $_POST["Jobname"];
    $postDate = $_POST["postDate"];
    
    if (!empty(trim($Jobname)) && !empty(trim($postDate))) {
        $uploadWorkname = $db->addRecord("uploadwork", ["Jobname" => $Jobname, "postDate" => $postDate]);
        if ($uploadWorkname > 0) {
            header("Location: ../jobsposter/uploadWorktitle.php?m=EMPLOYEE+DELETED+SUCCESSFULLY");
            exit();
        } else {
            header("Location: ../jobsposter/uploadWorktitle.php");
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


