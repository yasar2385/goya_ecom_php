function TEST_ENV(data) {
    if (window.location.hostname.includes("localhost")) {
        if (data) {
            var log_root = document.querySelector('.login-report');
            var frag = document.createRange().createContextualFragment(data);
            if (log_root) log_root.append(frag);
        } else {
            document.getElementById('email').value = "test1@gmail.com";
            document.getElementById('password').value = "Test!1111";            
        }
    } else {
        console.log("URL does not contain localhost");
    }
}


document.addEventListener("DOMContentLoaded", function() {
    TEST_ENV();
});
if (document.querySelector('login-form')) {
    document.querySelector('login-form').addEventListener('submit', function(event) {
        event.preventDefault();
        TEST_ENV();
        const email = document.getElementById('email').value;
        const password = document.getElementById('password').value;
        const rememberMe = document.getElementById('remember-me').checked;

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
        const loginData = {
            email: email,
            password: password,
            rememberMe: rememberMe
        };
        
        // Simulate a successful login response
        const mockResponse = {
            success: true
        };

        // Handle login response
        if (mockResponse.success) {
            // Redirect to the home page
            window.location.href = 'home.php'; // Change this to your actual home page URL
        } else {
            alert('Login failed.');
        }
        */
        // Prepare data to send
        let loginData = new FormData();
        loginData.append('email', email);
        loginData.append('password', password);

        // Send the data using Fetch API

        // fetch('../backend/login.php', {
        //         method: 'POST',
        //         body: loginData
        //     })
        //     .then(response => response.json())
        //     .then(data => {
        //         if (data && data.success) {
        //             // Redirect to a protected page or dashboard
        //             window.location.href = 'home.php';
        //         } else {
        //             console.log("There was an issue with the database or login");
        //             // Handle errors
        //         }
        //     })
        //     .catch(error => {
        //         console.error('Error:', error);
        //         // document.getElementById('response').innerText = 'An error occurred. Please try again.';
        //     });
    });
}