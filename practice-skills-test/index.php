<?php

include "./util/dbhelper.php";

$db = new DbHelper;

$employees = $db->getAllRecords("employees");

$allEmployees = $db->join_employee_details_leave();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Management</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
        }

        form {
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 5px;
        }

        input[type="text"] {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            background-color: #4caf50;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #ddd;
        }

        a {
            text-decoration: none;
            color: inherit;
            margin-right: 5px;
        }

        a:hover {
            color: blue;
        }
    </style>
</head>

<body>
    <div class="container">
        <form action="./logic/addEmployee.php" method="post">
            <label for="fname">First Name</label>
            <input type="text" id="fname" name="fname" required>
            <label for="lname">Last Name</label>
            <input type="text" id="lname" name="lname" required>
            <label for="age">Age</label>
            <input type="text" id="age" name="age" required>
            <label for="position">Position</label>
            <input type="text" id="position" name="position" required>
            <input type="submit" value="Add Employee" name="submit">
        </form>

        <table>
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
                            <a href="./logic/deleteEmployee.php?id=<?php echo $employee["id"] ?>">&times;</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>

</html>
