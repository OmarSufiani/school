<?php
// Database connection
include('db_config.php');

// Create connection


// Fetch all users from the database
$sql = "SELECT * FROM users";
$result = $conn->query($sql);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Handle edit and delete actions
    if (isset($_POST['edit'])) {
        // Update record
        $id = $_POST['id'];
        $name = $_POST['name'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];

        $update_sql = "UPDATE users SET name='$name', email='$email', phone='$phone' WHERE id=$id";
        $conn->query($update_sql);
    } elseif (isset($_POST['delete'])) {
        // Delete record
        $id = $_POST['id'];
        $delete_sql = "DELETE FROM users WHERE id=$id";
        $conn->query($delete_sql);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Users</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            padding: 20px;
        }
        h1 {
            text-align: center;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        table, th, td {
            border: 1px solid #ddd;
        }
        th, td {
            padding: 10px;
            text-align: center;
        }
        button {
            padding: 6px 12px;
            margin: 5px;
            cursor: pointer;
        }
        button.edit-btn {
            background-color: #4CAF50;
            color: white;
        }
        button.delete-btn {
            background-color: #f44336;
            color: white;
        }
        #editForm {
            display: none;
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: white;
            padding: 20px;
            border: 1px solid #ddd;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }
        #editForm input {
            display: block;
            margin: 10px 0;
            padding: 8px;
            width: 100%;
        }
    </style>
</head>
<body>
    <h1>Manage Users</h1>

    <table id="userTable">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = $result->fetch_assoc()): ?>
                <tr data-id="<?php echo $row['id']; ?>">
                    <td><?php echo $row['id']; ?></td>
                    <td class="username"><?php echo $row['username']; ?></td>
                    <td class="email"><?php echo $row['email']; ?></td>
                  
                    <td>
                        <button class="edit-btn" onclick="openEditForm(<?php echo $row['id']; ?>)">Edit</button>
                        <button class="delete-btn" onclick="deleteUser(<?php echo $row['id']; ?>)">Delete</button>
                    </td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>

    <!-- Edit Form -->
    <div id="editForm">
        <h2>Edit User</h2>
        <form id="editUserForm" method="POST">
            <input type="hidden" name="id" id="editId">
            <label for="name">Name:</label>
            <input type="text" name="name" id="editName" required><br>
            <label for="email">Email:</label>
            <input type="email" name="email" id="editEmail" required><br>
           
            <button type="submit" name="edit">Save</button>
            <button type="button" onclick="closeEditForm()">Cancel</button>
        </form>
    </div>

    <script>
        function openEditForm(id) {
            const row = document.querySelector(`tr[data-id="${id}"]`);
            document.getElementById('editId').value = row.querySelector('.name').textContent;
            document.getElementById('editName').value = row.querySelector('.name').textContent;
            document.getElementById('editEmail').value = row.querySelector('.email').textContent;
            document.getElementById('editPhone').value = row.querySelector('.phone').textContent;
            document.getElementById('editForm').style.display = 'block';
        }

        function closeEditForm() {
            document.getElementById('editForm').style.display = 'none';
        }

        function deleteUser(id) {
            if (confirm("Are you sure you want to delete this user?")) {
                const formData = new FormData();
                formData.append("id", id);
                formData.append("delete", true);

                fetch("", {
                    method: "POST",
                    body: formData
                }).then(response => {
                    location.reload(); // Reload the page to reflect changes
                });
            }
        }
    </script>
</body>
</html>

<?php
// Close database connection
$conn->close();
?>
