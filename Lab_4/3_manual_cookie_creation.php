<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cookie Example</title>
</head>
<body>
    <h1>Cookie Creation</h1>

    <!-- Form to create cookie -->
    <form method="POST" action="">
        <label for="cookieName">Cookie Name:</label>
        <input type="text" id="cookieName" name="cookieName" required><br><br>

        <label for="cookieValue">Cookie Value:</label>
        <input type="text" id="cookieValue" name="cookieValue" required><br><br>

        <input type="submit" name="createCookie" value="Create Cookie">
    </form>

    <!-- Form to access cookie -->
    <form method="POST" action="">
        <label for="accessCookieName">Cookie Name to Access:</label>
        <input type="text" id="accessCookieName" name="accessCookieName" required><br><br>

        <input type="submit" name="accessCookie" value="Access Cookie">
    </form>

    <?php
    // Create cookie if form is submitted
    if (isset($_POST['createCookie'])) {
        $cookieName = $_POST['cookieName'];
        $cookieValue = $_POST['cookieValue'];
        setcookie($cookieName, $cookieValue, time() + 86400, "/"); // 86400 seconds = 1 day
        echo "Cookie '$cookieName' created with value '$cookieValue' for 1 day.<br>";
    }

    // Access cookie if form is submitted
    if (isset($_POST['accessCookie'])) {
        $accessCookieName = $_POST['accessCookieName'];
        if (isset($_COOKIE[$accessCookieName])) {
            echo "Cookie '$accessCookieName' is: " . $_COOKIE[$accessCookieName] . "<br>";
        } else {
            echo "Cookie '$accessCookieName' is not set.<br>";
        }
    }
    ?>
</body>
</html>