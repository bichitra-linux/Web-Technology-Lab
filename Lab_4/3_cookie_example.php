
<?php
// Create cookie
setcookie("user", "John Doe", time() + (86400 * 1), "/"); // 86400 = 1 day

// Access cookie
if(isset($_COOKIE["user"])) {
    echo "User is: " . $_COOKIE["user"];
} else {
    echo "User is not set.";
}
?>
