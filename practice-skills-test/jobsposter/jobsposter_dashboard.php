<?php

include "../util/dbhelper.php";

$db = new DbHelper;

$employees = $db->getAllRecords("employees");

$allEmployees = $db->join_employee_details_leave();

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin dashboard</title>
</head>

<body>
   <center><h1>Welcome Jobposter Dash Board</h1></center>
   <center>Number of Studenst</center>
   <br>
   <center><table>
        <thead>
            <tr>
                <th>ID</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Age</th>
                <th>Position</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($employees as $employee): ?>
                <tr>
                    <td>
                        <?php echo $employee["id"] ?>
                    </td>
                    <td>
                        <?php echo $employee["fname"] ?>
                    </td>
                    <td>
                        <?php echo $employee["lname"] ?>
                    </td>
                    <td>
                        <?php echo $employee["age"] ?>
                    </td>
                    <td>
                        <?php echo $employee["position"] ?>
                    </td>
                    <td>
                        <a href="editEmployee.php?id=<?php echo $employee["id"] ?>">&#9998;</a>
                        <a href="../logic/jobposter_delete_employee.php?id=<?php echo $employee["id"] ?>">&times;</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
   </center>
</body>

</html>