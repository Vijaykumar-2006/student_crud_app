<?php include 'db.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <title>Student Records</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
    <h2>Student Records</h2>
    <a href="add.php">➕ Add New Student</a>
    <table>
        <tr>
            <th>ID</th><th>Name</th><th>Email</th><th>Age</th><th>Gender</th><th>Course</th><th>Actions</th>
        </tr>
        <?php
        $result = $conn->query("SELECT * FROM students");
        while($row = $result->fetch_assoc()) {
            echo "<tr>
                <td>{$row['id']}</td><td>{$row['name']}</td><td>{$row['email']}</td>
                <td>{$row['age']}</td><td>{$row['gender']}</td><td>{$row['course']}</td>
                <td>
                    <a href='edit.php?id={$row['id']}'>Edit</a> | 
                    <a href='delete.php?id={$row['id']}' onclick='return confirm(\"Delete this record?\")'>Delete</a>
                </td>
            </tr>";
        }
        ?>
    </table>
</div>
</body>
</html>
