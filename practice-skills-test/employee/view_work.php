<?php
include "../util/dbhelper.php";

$db = new DbHelper;

$uploadwork = $db->getAllRecords("uploadwork");


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
            margin-top: 10%;
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

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>JOBPOSTER</th>
                <th>WORK</th>
                <th>DATE</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($uploadwork as $work): ?>
                <tr>
                    <td>
                        <?php echo $work["id"] ?>
                    </td>
                    <td>
                        <?php echo $work["Jobname"] ?>
                    </td>
                    <td>
                        <?php echo $work["postDate"] ?>
                    </td>
                    <td>
                        <?php echo $work["postDate"] ?>
                    </td>
                    <td>
                        <a href="apply.php"> APPLY NOW</a>
                        
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

</body>

</html>

