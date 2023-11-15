<?php
if (isset($_GET['action'])) {
    $action = $_GET['action'];

    // Connect to your MySQL database using PDO
    try {
        loadEnv(__DIR__ . '/.env');
        $db_host = $_ENV['DB_HOST'];
        $db_user = $_ENV['DB_USER'];
        $db_password = $_ENV['DB_PASSWORD'];
        $db_name = $_ENV['DB_NAME'];

        $pdo = new PDO("mysql:host=$db_host;dbname=$db_name", $db_user, $db_password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        die("Connection failed: " . $e->getMessage());
    }

    switch ($action) {
        case "login":
            if (session_status() === PHP_SESSION_NONE) {
                session_start();
            }
            // Login
            $username = strtolower($_POST['username']);
            $password = $_POST['password'];

            // Prepare the statement
            $stmt = $pdo->prepare("SELECT * FROM pkmnjourney_users WHERE LOWER(username) = :username");
            $stmt->bindParam(':username', $username);
            $stmt->execute();
            $user = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($user) {
                // Verify the password
                if (password_verify($password, $user['password'])) {
                    // Password is correct, set session variable
                    $_SESSION['logged_in'] = true;
                    $_SESSION['username'] = $user['username'];
                    echo json_encode(array(
                        "success" => true,
                        "message" => "You have been logged in."));
                }
                else {
                    // Invalid username or password
                    echo json_encode(array(
                        "success" => false,
                        "message" => "Invalid username or password."));
                }
            }
            else {
                // Invalid username or password
                echo json_encode(array(
                    "success" => false,
                    "message" => "Invalid username or password."));
            }

        break;

        case "logout":
            // Logout
            if (session_status() === PHP_SESSION_ACTIVE) {
                session_destroy();
            }
            echo json_encode(array(
                "success" => true,
                "message" => "You have been logged out."));
        break;

        case "register":
            // Registration
            if (session_status() === PHP_SESSION_NONE) {
                session_start();
            }
            $username = $_POST['username'];
            $usernamelower = strtolower($_POST['username']);
            $password = $_POST['password'];

            // Check if the username already exists
            $stmt = $pdo->prepare("SELECT * FROM pkmnjourney_users WHERE LOWER(username) = :username");
            $stmt->bindParam(':username', $usernamelower);
            $stmt->execute();
            $existingUser = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($existingUser) {
                // Username already taken
                echo json_encode(array(
                    "success" => false,
                    "message" => "Username already exists. Please choose a different one."));
            }
            else {
                // Insert new user into the database
                $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
                $stmt = $pdo->prepare("INSERT INTO pkmnjourney_users (username, password) VALUES (:username, :password)");
                $stmt->bindParam(':username', $username);
                $stmt->bindParam(':password', $hashedPassword);

                if ($stmt->execute()) {
                    $_SESSION['logged_in'] = true;
                    $_SESSION['username'] = $username;
                    echo json_encode(array(
                        "success" => true,
                        "message" => "Registration successful. You can now log in."));
                }
                else {
                    echo json_encode(array(
                        "success" => false,
                        "message" => "Registration failed. Please try again later."));
                }
            }

        break;

        default:
            echo json_encode(array(
                "success" => false,
                "message" => "Invalid action specified."));
    }

    // Close the database connection
    $pdo = null;
}
else {
    echo json_encode(array(
        "success" => false,
        "message" => "No action specified."));
}


function loadEnv($filePath) {
    $lines = file($filePath, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    foreach ($lines as $line) {
        if (strpos($line, '=') !== false) {
            list($key, $value) = explode('=', $line, 2);
            $key = trim($key);
            $value = trim($value);
            putenv("$key=$value");
            $_ENV[$key] = $value;
            $_SERVER[$key] = $value;
        }
    }
}