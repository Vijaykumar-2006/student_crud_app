<?php include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name']; $email = $_POST['email'];
    $age = $_POST['age']; $gender = $_POST['gender'];
    $course = $_POST['course'];

    if ($name && $email && $gender && $course) {
        $stmt = $conn->prepare("INSERT INTO students (name, email, age, gender, course) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("ssiss", $name, $email, $age, $gender, $course);
        $stmt->execute();
        header("Location: index.php");
    } else {
        echo "Please fill all required fields.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Student</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
    <h2>Add New Student</h2>
    <form method="POST">
        <input type="text" name="name" placeholder="Enter full name" required>
        <input type="email" name="email" placeholder="Enter email address" required>
        <input type="number" name="age" placeholder="Enter age">
        <select name="gender" required>
            <option value="">-- Select Gender --</option>
            <option>Male</option>
            <option>Female</option>
        </select>
        <input type="text" name="course" placeholder="Enter course name" required>
        <input type="submit" value="Add Student">
    </form>
</div>
</body>
</html>
