<?php
include('../organize/db_config.php'); // Database connection file
include('../organize/header.php');
$role = $_SESSION['role']; 

// Retrieve students from the database
$query = "SELECT * FROM students";
$result = mysqli_query($conn, $query);

// Handle delete operation
if (isset($_GET['delete_id'])) {
    $delete_id = $_GET['delete_id'];
    $delete_query = "DELETE FROM students WHERE student_id = $delete_id";
    mysqli_query($conn, $delete_query);
    header("Location: edit.php");
    exit();
}

// Handle editing a student
if (isset($_POST['edit_student'])) {
    $id = $_POST['id'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $sEmail = $_POST['sEmail'];
    $date_of_birth = $_POST['date_of_birth'];
    $gender = $_POST['gender'];
    $subject = $_POST['subject'];
    $address = $_POST['address'];
    $phone_number = $_POST['phone_number'];

    $edit_query = "UPDATE students SET first_name='$first_name', last_name='$last_name', sEmail='$sEmail', date_of_birth='$date_of_birth', gender='$gender', subject=$subject, address='$address', phone_number='$phone_number' WHERE student_id=$id";
    mysqli_query($conn, $edit_query);
    header("Location: edit.php");
    exit();
}

// Handle form submission for adding a new student
if (isset($_POST['add_student'])) {
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $sEmail = $_POST['sEmail'];
    $date_of_birth = $_POST['date_of_birth'];
    $gender = $_POST['gender'];
    $subject = $_POST['subject'];
    $address = $_POST['address'];
    $phone_number = $_POST['phone_number'];

    $insert_query = "INSERT INTO students (first_name, last_name, sEmail, date_of_birth, gender, subject, address, phone_number) VALUES ('$first_name', '$last_name', '$sEmail', '$date_of_birth', '$gender', $subject, '$address', '$phone_number')";
    mysqli_query($conn, $insert_query);
    header("Location: edit.php");
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

<style>
.container {
    margin-top: 90px;
}
</style>

<body>

<div class="container">
    <h2>Student Management</h2>
    <?php if ($role == 'supperAdmin' || $role == 'admin') { ?>
        <!-- Add New Student Form -->
        <form action="" method="POST" class="mb-4">
        
            <div class="mb-3">
                <label for="first_name" class="form-label">First Name:</label>
                <input type="text" class="form-control" id="first_name" name="first_name" required>
            </div>
            <div class="mb-3">
                <label for="last_name" class="form-label">Last Name:</label>
                <input type="text" class="form-control" id="last_name" name="last_name" required>
            </div>
            <div class="mb-3">
                <label for="sEmail" class="form-label">Email:</label>
                <input type="email" class="form-control" id="sEmail" name="sEmail" required>
            </div>
            <div class="mb-3">
                <label for="date_of_birth" class="form-label">Date of Birth:</label>
                <input type="date" class="form-control" id="date_of_birth" name="date_of_birth" required>
            </div>
            <div class="mb-3">
                <label for="gender" class="form-label">Gender:</label>
                <select class="form-select" id="gender" name="gender" required>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                    <option value="Other">Other</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="subject" class="form-label">Subject:</label>
                <input type="number" class="form-control" id="subject" name="subject" required>
            </div>
            <div class="mb-3">
                <label for="address" class="form-label">Address:</label>
                <textarea class="form-control" id="address" name="address"></textarea>
            </div>
            <div class="mb-3">
                <label for="phone_number" class="form-label">Phone Number:</label>
                <input type="text" class="form-control" id="phone_number" name="phone_number">
            </div>
            <button type="submit" name="add_student" class="btn btn-success">Add Student</button>
            <br>
            <a href="../organize/homepage.php" class="btn btn-secondary mt-3" style="background-color: #6c757d; color: white; padding: 10px 20px; border-radius: 5px; text-decoration: none;"> Back
        </a>
        </form>
    <?php } ?>

    <!-- Students List -->
    <h3>List of Students</h3>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th>Age</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($student = mysqli_fetch_assoc($result)) { ?>
                <tr>
                    <td><?php echo $student['student_id']; ?></td>
                    <td><?php echo $student['first_name']; ?></td>
                    <td><?php echo $student['last_name']; ?></td>
                    <td><?php echo $student['sEmail']; ?></td>
                    <td><?php echo $student['date_of_birth']; ?></td>
                    <td>
                        <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#editModal<?php echo $student['student_id']; ?>">Edit</button>
                        <a href="?delete_id=<?php echo $student['student_id']; ?>" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this student?')">Delete</a>
                    </td>
                </tr>

                <!-- Edit Modal -->
                <div class="modal fade" id="editModal<?php echo $student['student_id']; ?>" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="editModalLabel">Edit Student</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="" method="POST">
                                    <input type="hidden" name="id" value="<?php echo $student['student_id']; ?>">
                                    <div class="mb-3">
                                        <label for="first_name" class="form-label">First Name:</label>
                                        <input type="text" class="form-control" id="first_name" name="first_name" value="<?php echo $student['first_name']; ?>" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="last_name" class="form-label">Last Name:</label>
                                        <input type="text" class="form-control" id="last_name" name="last_name" value="<?php echo $student['last_name']; ?>" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="sEmail" class="form-label">Email:</label>
                                        <input type="email" class="form-control" id="sEmail" name="sEmail" value="<?php echo $student['sEmail']; ?>" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="date_of_birth" class="form-label">Date of Birth:</label>
                                        <input type="date" class="form-control" id="date_of_birth" name="date_of_birth" value="<?php echo $student['date_of_birth']; ?>" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="gender" class="form-label">Gender:</label>
                                        <select class="form-select" id="gender" name="gender" required>
                                            <option value="Male" <?php if ($student['gender'] == 'Male') echo 'selected'; ?>>Male</option>
                                            <option value="Female" <?php if ($student['gender'] == 'Female') echo 'selected'; ?>>Female</option>
                                            <option value="Other" <?php if ($student['gender'] == 'Other') echo 'selected'; ?>>Other</option>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="subject" class="form-label">Subject:</label>
                                        <input type="number" class="form-control" id="subject" name="subject" value="<?php echo $student['subject']; ?>" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="address" class="form-label">Address:</label>
                                        <textarea class="form-control" id="address" name="address"><?php echo $student['address']; ?></textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label for="phone_number" class="form-label">Phone Number:</label>
                                        <input type="text" class="form-control" id="phone_number" name="phone_number" value="<?php echo $student['phone_number']; ?>">
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
