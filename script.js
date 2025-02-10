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




// Toggle the visibility of a dropdown menu
const toggleDropdown = (dropdown, menu, isOpen) => {
    dropdown.classList.toggle("open", isOpen);
    menu.style.height = isOpen ? `${menu.scrollHeight}px` : 0;
  };
  // Close all open dropdowns
  const closeAllDropdowns = () => {
    document.querySelectorAll(".dropdown-container.open").forEach((openDropdown) => {
      toggleDropdown(openDropdown, openDropdown.querySelector(".dropdown-menu"), false);
    });
  };
  // Attach click event to all dropdown toggles
  document.querySelectorAll(".dropdown-toggle").forEach((dropdownToggle) => {
    dropdownToggle.addEventListener("click", (e) => {
      e.preventDefault();
      const dropdown = dropdownToggle.closest(".dropdown-container");
      const menu = dropdown.querySelector(".dropdown-menu");
      const isOpen = dropdown.classList.contains("open");
      closeAllDropdowns(); // Close all open dropdowns
      toggleDropdown(dropdown, menu, !isOpen); // Toggle current dropdown visibility
    });
  });
  // Attach click event to sidebar toggle buttons
  document.querySelectorAll(".sidebar-toggler, .sidebar-menu-button").forEach((button) => {
    button.addEventListener("click", () => {
      closeAllDropdowns(); // Close all open dropdowns
      document.querySelector(".sidebar").classList.toggle("collapsed"); // Toggle collapsed class on sidebar
    });
  });
  // Collapse sidebar by default on small screens
  if (window.innerWidth <= 1024) document.querySelector(".sidebar").classList.add("collapsed");