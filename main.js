// Get the enroll link element
const enrollLink = document.getElementById('enrollLink').querySelector('a');

// Add event listener to the link
enrollLink.addEventListener('click', function(event) {
  // Prevent default link behavior
  event.preventDefault();

  // Disable the link text
  enrollLink.textContent = 'Enrollment in progress...';

  // Optionally, you can also disable the link itself
  enrollLink.classList.add('disabled');
});
