<?php include 'db.php';

$id = $_GET['id'];
$result = $conn->query("SELECT * FROM students WHERE id=$id");
$row = $result->fetch_assoc();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name']; $email = $_POST['email'];
    $age = $_POST['age']; $gender = $_POST['gender'];
    $course = $_POST['course'];

    $stmt = $conn->prepare("UPDATE students SET name=?, email=?, age=?, gender=?, course=? WHERE id=?");
    $stmt->bind_param("ssissi", $name, $email, $age, $gender, $course, $id);
    $stmt->execute();
    header("Location: index.php");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Student</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
    <h2>Edit Student</h2>
    <form method="POST">
        <input type="text" name="name" value="<?= htmlspecialchars($row['name']) ?>" placeholder="Enter full name" required>
        
        <input type="email" name="email" value="<?= htmlspecialchars($row['email']) ?>" placeholder="Enter email" required>
        
        <input type="number" name="age" value="<?= htmlspecialchars($row['age']) ?>" placeholder="Enter age">
        
        <select name="gender" required>
            <option value="">-- Select Gender --</option>
            <option value="Male" <?= $row['gender'] == "Male" ? "selected" : "" ?>>Male</option>
            <option value="Female" <?= $row['gender'] == "Female" ? "selected" : "" ?>>Female</option>
        </select>
        
        <input type="text" name="course" value="<?= htmlspecialchars($row['course']) ?>" placeholder="Enter course name" required>
        
        <input type="submit" value="Update Student">
    </form>
</div>
</body>
</html>
