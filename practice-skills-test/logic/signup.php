<?php

require_once "../util/dbhelper.php";

$db = new DbHelper();

if (isset($_POST['signup'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $account_type = $_POST['account_type'];
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];

    if (!empty(trim($username)) && !empty(trim($password)) && !empty($account_type)) {
        if ($account_type == 'admin') {
            $table_name = 'admin';
        } elseif ($account_type == 'employee') {
            $table_name = 'employee';
        } elseif ($account_type == 'jobposter') {
            $table_name = 'jobposter';
        } else {
            header('Location: ../signup.php?m=INVALID+ACCOUNT+TYPE');
            exit();
        }

        
        $signup = $db->addRecord($table_name, ['username' => $username, 'password' => $password, 'account_type' => $account_type, 'fname' => $fname, 'lname' => $lname]);
        if ($signup > 0) {
            header('Location: ../login.php?m=SUCCESSFULLY+SIGNED+UP');
            exit();
        } else {
            header('Location: ../signup.php?m=ERROR+SIGNING+UP');
            exit();
        }
    } else {
        header('Location: ../signup.php?m=FILL+OUT+THE+MISSING+FIELDS');
        exit();
    }
}

