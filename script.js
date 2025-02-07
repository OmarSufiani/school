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




function editUser(id) {
    // Open the edit form and populate it with data from the selected row
    const row = document.querySelector(`tr[data-id="${id}"]`);
    document.getElementById('editId').value = row.cells[0].textContent;
    document.getElementById('editName').value = row.cells[1].textContent;
    document.getElementById('editEmail').value = row.cells[2].textContent;
    document.getElementById('editPhone').value = row.cells[3].textContent;

    document.getElementById('editForm').classList.remove('hidden');
}

function closeEditForm() {
    document.getElementById('editForm').classList.add('hidden');
}

function deleteUser(id) {
    if (confirm("Are you sure you want to delete this user?")) {
        window.location.href = `delete.php?id=${id}`;
    }
}

