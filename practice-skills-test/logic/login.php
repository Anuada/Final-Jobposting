<?php

require_once "../util/dbhelper.php";

$db = new DbHelper();

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $account_type = $_POST['account_type'];

   
    $username = htmlspecialchars($username);
    $password = htmlspecialchars($password);
    $account_type = htmlspecialchars($account_type);

    if (!empty($username) && !empty($password) && !empty($account_type)) {
        
        if ($account_type == 'admin' || $account_type == 'employee' || $account_type == 'jobposter')  {
            
            if ($account_type == 'admin') {
                $admin_login = $db->getRecord('admin', ['username' => $username, 'password' => $password]);
                if ($admin_login != null) {
                    header('Location: ../admin/admin_dashboard.php?m=ADMIN+LOGIN+SUCCESSFUL');
                    exit();
                }
            } elseif ($account_type == 'employee') {
                $user_login = $db->getRecord('employee', ['username' => $username, 'password' => $password]);
                if ($user_login != null) {
                    header('Location: ../employee/employee_dashboard.php?m=employee+LOGIN+SUCCESSFUL');
                    exit();
                } 
            } elseif ($account_type == 'jobposter') {
                $user_login = $db->getRecord('jobposter', ['username' => $username, 'password' => $password]);
                if ($user_login != null) {
                    header('Location: ../jobsposter/index.php?m=employee+LOGIN+SUCCESSFUL');
                    exit();
                } 
            } 
           
            header('Location: ../login.php?m=INVALID+USERNAME+OR+PASSWORD');
            exit();
        } else {
            
            header('Location: ../login.php?m=INVALID+ACCOUNT+TYPE');
            exit();
        }
    } else {
       
        header('Location: ../login.php?m=FILL+OUT+THE+MISSING+FIELDS');
        exit();
    }
}

