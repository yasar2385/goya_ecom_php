<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Account Form</title>
    <link rel="stylesheet" href="assets/css/edit.css">
</head>
<body>
    <div class="modal">
        <div class="modal-content">
            <h2>My Account</h2>
            <form id="account-form">
                <label for="full-name">Full Name</label>
                <input type="text" id="full-name" name="full-name" placeholder="rjohn" required>
                
                <label for="email">Email Id</label>
                <input type="email" id="email" name="email" placeholder="rj31@gmail.com" required>
                
                <label for="dob">Date of Birth</label>
                <input type="date" id="dob" name="dob" placeholder="dd-mm-yyyy">
                
                <div class="form-row">
                    <div class="form-group">
                        <label for="phone">Phone</label>
                        <input type="tel" id="phone" name="phone" placeholder="+91">
                    </div>
                    <div class="form-group">
                        <label for="gender">Gender</label>
                        <input type="text" id="gender" name="gender">
                    </div>
                </div>
                
                <label for="location">Location</label>
                <input type="text" id="location" name="location" placeholder="Location">
                
                <div class="button-group">
                    <button type="button" class="cancel-button">Cancel</button>
                    <button type="submit" class="save-button">SAVE</button>
                </div>
            </form>
        </div>
    </div>
    <script src="assets/js/edit.js"></script>
</body>
</html>
