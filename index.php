<?php
include 'db.php';


if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['name']) && isset($_POST['age'])) {
    $name = $_POST['name'];
    $age = $_POST['age'];
    $sql = "INSERT INTO users (name, age, status) VALUES ('$name', '$age', 0)";
    $conn->query($sql);
    
    
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Task 2 - Web Development</title>
    <style>
        body { font-family: Arial, sans-serif; text-align: center; margin-top: 50px; }
        form { margin-bottom: 20px; }
        input, button { margin: 0 5px; padding: 5px; }
        table { margin: 0 auto; border-collapse: collapse; width: 50%; }
        th, td { border: 1px solid #ccc; padding: 8px; text-align: center; }
        th { background-color: #f4f4f4; }
        button { cursor: pointer; }
    </style>
</head>
<body>

    <form method="POST" action="">
        <label>Name:</label>
        <input type="text" name="name" required>
        <label>Age:</label>
        <input type="number" name="age" required>
        <button type="submit">Submit</button>
    </form>

    <table>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Age</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
        <?php
       
        $sql = "SELECT * FROM users";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>" . $row['id'] . "</td>
                        <td>" . $row['name'] . "</td>
                        <td>" . $row['age'] . "</td>
                        <td id='status-" . $row['id'] . "'>" . $row['status'] . "</td>
                        <td><button onclick='toggleStatus(" . $row['id'] . ")'>Toggle</button></td>
                      </tr>";
            }
        }
        ?>
    </table>

    <script>
    function toggleStatus(id) {
        fetch('toggle_status.php?id=' + id)
        .then(response => response.text())
        .then(newStatus => {
            
            document.getElementById('status-' + id).innerText = newStatus;
        });
    }
    </script>

</body>
</html>