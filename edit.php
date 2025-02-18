<?php
include('db_config.php'); // Database connection file

// Retrieve students from the database
$query = "SELECT * FROM students";
$result = mysqli_query($conn, $query);

// Handle delete operation
if (isset($_GET['delete_id'])) {
    $delete_id = $_GET['delete_id'];
    $delete_query = "DELETE FROM students WHERE id = $delete_id";
    mysqli_query($conn, $delete_query);
    header("Location: students.php");
    exit();
}

// Handle editing a student
if (isset($_POST['edit_student'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $age = $_POST['age'];

    $edit_query = "UPDATE students SET name='$name', email='$email', age=$age WHERE id=$id";
    mysqli_query($conn, $edit_query);
    header("Location: students.php");
    exit();
}

// Handle form submission for adding a new student
if (isset($_POST['add_student'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $age = $_POST['age'];

    $insert_query = "INSERT INTO students (name, email, age) VALUES ('$name', '$email', $age)";
    mysqli_query($conn, $insert_query);
    header("Location: students.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Management</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">
    <h2>Student Management</h2>

    <!-- Add New Student Form -->
    <form action="" method="POST" class="mb-4">
        <div class="mb-3">
            <label for="name" class="form-label">Name:</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email:</label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div>
        <div class="mb-3">
            <label for="age" class="form-label">Age:</label>
            <input type="number" class="form-control" id="age" name="age" required>
        </div>
        <button type="submit" name="add_student" class="btn btn-success">Add Student</button>
    </form>

    <!-- Students List -->
    <h3>List of Students</h3>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Email</th>
                <th>Age</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($student = mysqli_fetch_assoc($result)) { ?>
                <tr>
                    <td><?php echo $student['id']; ?></td>
                    <td><?php echo $student['name']; ?></td>
                    <td><?php echo $student['email']; ?></td>
                    <td><?php echo $student['age']; ?></td>
                    <td>
                        <!-- Edit Button -->
                        <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#editModal<?php echo $student['id']; ?>">
                            Edit
                        </button>
                        <!-- Delete Button -->
                        <a href="?delete_id=<?php echo $student['id']; ?>" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this student?')">Delete</a>
                    </td>
                </tr>

                <!-- Edit Modal -->
                <div class="modal fade" id="editModal<?php echo $student['id']; ?>" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="editModalLabel">Edit Student</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="" method="POST">
                                    <input type="hidden" name="id" value="<?php echo $student['id']; ?>">
                                    <div class="mb-3">
                                        <label for="name" class="form-label">Name:</label>
                                        <input type="text" class="form-control" id="name" name="name" value="<?php echo $student['name']; ?>" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="email" class="form-label">Email:</label>
                                        <input type="email" class="form-control" id="email" name="email" value="<?php echo $student['email']; ?>" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="age" class="form-label">Age:</label>
                                        <input type="number" class="form-control" id="age" name="age" value="<?php echo $student['age']; ?>" required>
                                    </div>
                                    <button type="submit" name="edit_student" class="btn btn-primary">Update Student</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

            <?php } ?>
        </tbody>
    </table>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
