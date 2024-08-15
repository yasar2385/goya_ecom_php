(function() {
    if (window.location.hostname.includes("localhost")) {
        document.getElementById('full-name').value = "Test User 3";
        document.getElementById('email').value = "test3@gmail.com";
        document.getElementById('password').value = "Test!3333";
    } else {
        console.log("URL does not contain localhost");
    }
})();
document.querySelector('.signup-form').addEventListener('submit', function(event) {
    event.preventDefault();
    const fullName = document.getElementById('full-name').value;
    const email = document.getElementById('email').value;
    const password = document.getElementById('password').value;
    const errorSpan = document.getElementById('emailError');

    // Clear previous error
    errorSpan.textContent = '';

    // Email validation regex
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

    // Password validation regex (at least 8 characters, one uppercase letter, one lowercase letter, one number, and one special character)
    const passwordRegex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/;

    // Validate email format
    if (!emailRegex.test(email)) {
        alert('Please enter a valid email address.');
        return;
    }

    // Validate strong password
    if (!passwordRegex.test(password)) {
        alert('Password must be at least 8 characters long and include at least one uppercase letter, one lowercase letter, one number, and one special character.');
        return;
    }
    /*
    // Prepare data for API request
    const signupDataTemp = {
        fullName: fullName,
        email: email,
        password: password
    };
    // Simulate a successful login response
    const mockResponse = {
        success: true
    };

    // Handle login response
    if (mockResponse.success) {
        // Redirect to the home page
        window.location.href = 'login.php'; // Change this to your actual home page URL
    } else {
        alert('Login failed.');
    }
    */
    // Prepare data to send
    let signupData = new FormData();
    signupData.append('fullName', fullName);
    signupData.append('email', email);
    signupData.append('password', password);

    // Send the data using Fetch API
    fetch('php/signup_new.php', {
            method: 'POST',
            body: signupData
        })
        .then(response => {
            console.log(response);
            return response.json();
        }) // Parse the response as text
        .then(data => {
            console.log(data);
            // document.getElementById('response').innerText = data;
            // Redirect to the home page
            if (data.code == 205) {
                errorSpan.textContent = data.message;
            } else if (data.code == 200) {
                window.location.href = 'login.php'; // Change this to your actual home page URL
            } else {
                // alert like kindly  try again
            }
        })
        .catch(error => {
            console.log(error);
            console.error('Error:', error);
            // document.getElementById('response').innerText = 'An error occurred. Please try again.';
        });

});