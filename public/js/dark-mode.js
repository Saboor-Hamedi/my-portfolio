document.addEventListener('DOMContentLoaded', function() {
  const darkModeSwitch = document.getElementById('darkModeSwitch'); // Remove the # symbol
  const body = document.body;

  // Check if dark mode is already enabled
  if (localStorage.getItem('darkMode') === 'true') {
    body.classList.add('dark');
    darkModeSwitch.checked = true;
  }

  darkModeSwitch.addEventListener('change', function() {
    if (this.checked) {
      body.classList.add('dark');
      localStorage.setItem('darkMode', 'true');
    } else {
      body.classList.remove('dark');
      localStorage.setItem('darkMode', 'false');
    }
  });
});