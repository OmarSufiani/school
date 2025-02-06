// Toggle sidebar visibility
function toggleSidebar() {
    const sidebar = document.getElementById("sidebar");
    const content = document.getElementById("main-content");
    
    sidebar.classList.toggle("collapsed");
    content.classList.toggle("collapsed");
    
    const isCollapsed = sidebar.classList.contains("collapsed");
    document.getElementById("toggle-btn").innerText = isCollapsed ? "►" : "☰";
}

// Toggle dropdown content visibility
function toggleDropdown(menuId) {
    const menu = document.getElementById(menuId);
    menu.style.display = menu.style.display === "block" ? "none" : "block";
}
