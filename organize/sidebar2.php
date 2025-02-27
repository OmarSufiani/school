<?php 

$role = $_SESSION['role']; 

// Can be 'superadmin', 'admin', 'staff', 'student'
?>

<!-- Font Awesome for Icons -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">

<!-- Custom CSS -->
<style>
    /* Global Styles */

/* Global Styles */

/* Sidebar */
.sidebar {
    height: 100vh; /* Full viewport height */
    width: 250px;
    position: absolute;
    top: 60px; /* Adjust this based on header height */
    left: 0;
    background-color: #2c3e50;
    color: white;
    transition: all 0.3s;
    padding-top: 20px;
    z-index: 50;
    overflow-y: auto; /* Make it scrollable */
    padding-bottom: 20px; /* Optional padding to prevent content from being cut off */
}

.sidebar.collapsed {
    width: 60px; /* When collapsed, reduce the sidebar width */
}

.sidebar-header {
    text-align: center;
    margin-bottom: 30px;
}

.sidebar-header h3 {
    font-size: 24px;
    font-weight: bold;
    transition: all 0.3s;
}

.sidebar.collapsed .sidebar-header h3 {
    display: none;
}

.sidebar ul {
    list-style-type: none;
    padding: 0;
    margin: 0; /* Remove any extra margin */
}

.sidebar ul li {
    margin: 15px 0;
}

.sidebar ul li a {
    color: white;
    text-decoration: none;
    font-size: 18px;
    display: flex;
    align-items: center;
    padding: 10px;
    border-radius: 4px;
    transition: 0.3s;
}

.sidebar ul li a:hover {
    background-color: #34495e;
}

.sidebar ul li a i {
    margin-right: 15px;
}

.sidebar ul li a.collapsed i {
    margin-right: 0;
}

.sidebar ul li .dropdown-menu {
    display: none;
    padding-left: 30px;
}

.sidebar ul li a.collapsed + .dropdown-menu {
    display: block;
}

.toggle-btn {
    position: absolute;
    top: 20px;
    right: 20px;
    cursor: pointer;
    font-size: 20px;
    color: white;
}

/* Main Content */

.main-content.collapsed {
    margin-left: 60px; /* When sidebar is collapsed, offset less */
}

/* Mobile Responsiveness */
@media (max-width: 768px) {
    .sidebar {
        width: 100%;
        height: auto;
    }

    .main-content {
        margin-left: 0;
    }
}
</style>

<!-- Sidebar -->
<div class="sidebar">
    <ul>
        <?php if ($role == 'supperAdmin' || $role == 'admin' || $role == 'staff') { ?>
            <li><a href="../organize/homepage.php"><i class="fas fa-tachometer-alt"></i> Dashboard</a></li>
        <?php } ?>

        <?php if ($role == 'supperAdmin' || $role == 'admin' || $role == 'staff' || $role == 'student') { ?>
            <li>
                <a href="javascript:void(0)" onclick="toggleDropdown('regulations')"><i class="fas fa-gavel"></i> Regulations <i class="fas fa-chevron-down"></i></a>
                <ul class="dropdown-menu" id="regulations">
                    <li><a href="#">School Rules</a></li>
                    <?php if ($role == 'supperAdmin' || $role == 'admin' || $role == 'staff') { ?>
                        <li><a href="#">TSC Rules</a></li>
                        <li><a href="#">PTA/BOM Regulations</a></li>
                    <?php } ?>
                </ul>
            </li>
        <?php } ?>

        <?php if ($role == 'supperAdmin' || $role == 'admin' || $role == 'staff' || $role == 'student') { ?>
            <li>
                <a href="javascript:void(0)" onclick="toggleDropdown('accounts')"><i class="fas fa-credit-card"></i> Accounts <i class="fas fa-chevron-down"></i></a>
                <ul class="dropdown-menu" id="accounts">
                    <li><a href="#">Student Areas</a></li>
                    <?php if ($role == 'supperAdmin' || $role == 'admin') { ?>
                        <li><a href="#">Account Balance</a></li>
                    <?php } ?>
                </ul>
            </li>
        <?php } ?>

        <?php if ($role == 'supperAdmin' || $role == 'admin' || $role == 'student') { ?>
            <li><a href="../manage/edit.php"><i class="fas fa-user-graduate"></i> Students</a></li>
        <?php } ?>

        <?php if ($role == 'supperAdmin' || $role == 'admin' || $role == 'staff') { ?>
            <li>
                <a href="javascript:void(0)" onclick="toggleDropdown('personnel')"><i class="fas fa-users"></i> Personnel <i class="fas fa-chevron-down"></i></a>
                <ul class="dropdown-menu" id="personnel">
                    <li><a href="#">Teaching Staff</a></li>
                    <li><a href="#">Non-Teaching Staff</a></li>
                </ul>
            </li>
        <?php } ?>

        <?php if ($role == 'supperAdmin' || $role == 'admin' || $role == 'staff') { ?>
            <li><a href="../manage/user.php"><i class="fas fa-user-cog"></i> Manage User</a></li>
        <?php } ?>

        <?php if ($role == 'supperAdmin' || $role == 'admin' || $role == 'student' || $role == 'staff') { ?>
            <li>
                <a href="javascript:void(0)" onclick="toggleDropdown('resources')"><i class="fas fa-cogs"></i> Resources <i class="fas fa-chevron-down"></i></a>
                <ul class="dropdown-menu" id="resources">
                    <?php if ($role == 'supperAdmin' || $role == 'admin' || $role == 'staff') { ?>
                        <li><a href="upload.php">uploads</a></li>
                    <?php } ?>
                    <li><a href="download.php">files</a></li>
                </ul>
            </li>
        <?php } ?>

        <?php if ($role == 'supperAdmin' || $role == 'admin' || $role == 'staff') { ?>
            <li><a href="../manage/view.php"><i class="fas fa-comments"></i> Communications</a></li>
        <?php } ?>

        <?php if ($role == 'supperAdmin' || $role == 'admin') { ?>
            <li><a href="../manage/student.php"><i class="fas fa-chalkboard-teacher"></i> Admission</a></li>
            
            <!-- Academics Dropdown -->
            <li>
                <a href="javascript:void(0)" onclick="toggleDropdown('academics')"><i class="fas fa-book"></i> Academics <i class="fas fa-chevron-down"></i></a>
                <ul class="dropdown-menu" id="academics">
                    <li><a href="#">Subjects</a></li>
                    <li><a href="#">Curriculum</a></li>
                    <li><a href="../academics/exam.php">Exams</a></li>
                </ul>
            </li>

            <li><a href="#"><i class="fas fa-calendar-alt"></i> Schedule</a></li>
        <?php } ?>

        <?php if ($role == 'supperAdmin' || $role == 'admin' || $role == 'staff') { ?>
            <li><a href="../manage/add.php"><i class="fas fa-cogs"></i> Settings</a></li>
        <?php } ?>

        <?php if ($role == 'supperAdmin' || $role == 'admin' || $role == 'student' || $role == 'staff') { ?>
            <li><a href="#"><i class="fas fa-info-circle"></i> About</a></li>
        <?php } ?>
        
    </ul>
</div>

<!-- Main Content -->
<div class="main-content">
    <!-- Toggle Button -->
    <div class="toggle-btn" onclick="toggleSidebar()">&#9776;</div>

</div>

<!-- JavaScript for Sidebar Toggle and Dropdown -->
<script>
    function toggleSidebar() {
        const sidebar = document.querySelector('.sidebar');
        const mainContent = document.querySelector('.main-content');
        sidebar.classList.toggle('collapsed');
        mainContent.classList.toggle('collapsed');
    }

    function toggleDropdown(id) {
        const menu = document.getElementById(id);
        menu.style.display = menu.style.display === "none" || menu.style.display === "" ? "block" : "none";
    }
</script>
