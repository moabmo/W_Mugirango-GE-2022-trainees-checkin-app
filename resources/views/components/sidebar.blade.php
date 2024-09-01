<!-- Link to stylesheet -->
<link rel="stylesheet" href="{{ asset('css/sidebar.css') }}">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">

<div id="sidebar" class="sidebar">
    <button class="toggle-button" id="toggleSidebar">
        <i class="fas fa-bars"></i>
    </button>
    <h4 class="sidebar-header">Admin Dashboard</h4>
    <ul class="sidebar-menu">
        <li>
            <a href="/admin/dashboard">
                <i class="fas fa-th-large icon"></i> <!-- Updated icon -->
                <span class="text">Dashboard</span>
            </a>
        </li>
        <li>
            <a href="/admin/reports">
                <i class="fas fa-chart-line icon"></i>
                <span class="text">Reports</span>
            </a>
        </li>
        <li>
            <a href="/admin/trainees">
                <i class="fas fa-users icon"></i>
                <span class="text">Trainees List</span>
            </a>
        </li>
        <li>
            <a href="/dashboard">
                <i class="fas fa-download icon"></i>
                <span class="text">Downloads</span>
            </a>
        </li>
    </ul>
</div>

<script>
    // Check localStorage to set the initial state of the sidebar
    document.addEventListener('DOMContentLoaded', function() {
        var sidebar = document.getElementById('sidebar');
        var toggleButton = document.getElementById('toggleSidebar');
        
        // Set sidebar state based on localStorage
        if (localStorage.getItem('sidebarCollapsed') === 'true') {
            sidebar.classList.add('collapsed');
            toggleButton.querySelector('i').className = 'fas fa-chevron-left'; // Set icon for collapsed state
        } else {
            sidebar.classList.remove('collapsed');
            toggleButton.querySelector('i').className = 'fas fa-bars'; // Set icon for expanded state
        }

        // Add click event listener to toggle button
        toggleButton.addEventListener('click', function() {
            var isCollapsed = sidebar.classList.toggle('collapsed');
            localStorage.setItem('sidebarCollapsed', isCollapsed);
            // Update toggle button icon based on sidebar state
            this.querySelector('i').className = isCollapsed ? 'fas fa-chevron-left' : 'fas fa-bars';
        });
    });
</script>
