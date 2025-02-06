<?php include ('db_config.php');


?>



<style>

    /* Basic reset */



body {
    font-family: Arial, sans-serif;
    display: flex;
}

/* Sidebar Styling */
#sidebar {
    width: 250px;
    height: 100vh;
    background-color: #333;
    color: #fff;
    transition: width 0.3s;
    padding-top: 50px;
    position: fixed;
}

#sidebar.collapsed {
    width: 50px;
}

#sidebar button {
    background: none;
    border: none;
    color: white;
    font-size: 30px;
    cursor: pointer;
    padding: 10px;
    text-align: center;
    width: 100%;
}

#sidebar-content {
    margin-top: 40px;
}

.dropdown {
    margin: 10px 0;
}

.dropbtn {
    background-color: #444;
    color: white;
    border: none;
    padding: 10px;
    width: 100%;
    text-align: left;
    cursor: pointer;
}

.dropbtn:focus {
    outline: none;
}

.dropdown-content {
    display: none;
    background-color: #555;
    padding: 10px;
}

.dropdown-content a {
    color: white;
    text-decoration: none;
    display: block;
    padding: 5px;
}

.dropdown-content a:hover {
    background-color: #777;
}

/* Main Content Area */
#main-content {
    margin-left: 250px;
    padding: 20px;
    flex-grow: 1;
    transition: margin-left 0.3s;
}

#main-content.collapsed {
    margin-left: 50px;
}

</style>

</head>
<body>
    <div id="dashboard">
        <!-- Sidebar -->
        <div id="sidebar">
            <button id="toggle-btn" onclick="toggleSidebar()">☰</button>
            <div id="sidebar-content">
                <div class="dropdown">
                    <button class="dropbtn" onclick="toggleDropdown('menu1')">Menu 1 ▼</button>
                    <div id="menu1" class="dropdown-content">
                        <a href="#">Item 1.1</a>
                        <a href="#">Item 1.2</a>
                        <a href="#">Item 1.3</a>
                    </div>
                </div>
                <div class="dropdown">
                    <button class="dropbtn" onclick="toggleDropdown('menu2')">Menu 2 ▼</button>
                    <div id="menu2" class="dropdown-content">
                        <a href="#">Item 2.1</a>
                        <a href="#">Item 2.2</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main Content Area -->
        <div id="main-content">
            <h1>Dashboard Content</h1>
            <p>Welcome to the dashboard. Here you can navigate through different menus in the sidebar.</p>
        </div>
    </div>

    <script src="script.js"></script>

</body>
</html>
