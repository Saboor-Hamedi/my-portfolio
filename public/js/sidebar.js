// JavaScript for sidebar toggle on small screens
const sidebarToggle = document.getElementById('sidebarToggle');
const sidebar = document.getElementById('default-sidebar');

sidebarToggle.addEventListener('click', () => {
    sidebar.classList.toggle('-translate-x-full');
});
