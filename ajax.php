<?php
if (isset($_REQUEST['action'])) {
    $action = $_REQUEST['action'];

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
            if (session_status() === PHP_SESSION_NONE) {
                session_start();
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
            $gender = $_POST['gender'];

            if ($username == "") {
                echo json_encode(array(
                    "success" => false,
                    "message" => "Username cannot be empty."));
                break;
            }
            if ($password == "") {
                echo json_encode(array(
                    "success" => false,
                    "message" => "Password cannot be empty."));
                break;
            }
            if ($gender == "") {
                echo json_encode(array(
                    "success" => false,
                    "message" => "Please select Gender"));
                break;
            }
            if (strlen($username) > 20) {
                echo json_encode(array(
                    "success" => false,
                    "message" => "Username cannot be longer than 20 characters."));
                break;
            }
            if ($gender != 'boy' && $gender != 'girl') {
                echo json_encode(array(
                    "success" => false,
                    "message" => "Dodgy injection detected."));
                break;
            }


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
                $stmt = $pdo->prepare("INSERT INTO pkmnjourney_users (username, password, gender) VALUES (:username, :password, :gender)");
                $stmt->bindParam(':username', $username);
                $stmt->bindParam(':password', $hashedPassword);
                $stmt->bindParam(':gender', $gender);

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

        case "savecurrentsteps":
            if (session_status() === PHP_SESSION_NONE) {
                session_start();
            }
            $username = $_SESSION['username'];
            $currentsteps = $_POST['currentsteps'];

            // Check if the username already exists
            $stmt = $pdo->prepare("SELECT * FROM pkmnjourney_users WHERE username = :username");
            $stmt->bindParam(':username', $username);
            $stmt->execute();
            $existingUser = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($existingUser) {
                // User exists
                $lastRecordedSteps = $existingUser['steps'];
                //I wonder if the client side can be out of sync with the server side
                //todo: check if the client side is out of sync with the server side
                if ($currentsteps == $lastRecordedSteps + 1) {
                    // Increment by exactly one
                    $stmt = $pdo->prepare("UPDATE pkmnjourney_users SET steps = :currentsteps WHERE username = :username");
                    $stmt->bindParam(':username', $username);
                    $stmt->bindParam(':currentsteps', $currentsteps);
                    $stmt->execute();

                    echo json_encode(array(
                        "success" => true,
                        "message" => "Current steps saved."));
                }
                else {
                    // Invalid increment
                    echo json_encode(array(
                        "success" => false,
                        "message" => "Invalid steps increment."));
                }
            }
            else {
                // User not found
                echo json_encode(array(
                    "success" => false,
                    "message" => "User not found."));
            }
        break;

        case "getuserdata":
            if (session_status() === PHP_SESSION_NONE) {
                session_start();
            }
            $username = $_SESSION['username'];
            $userData = array();

            // Check if the username already exists
            $stmt = $pdo->prepare("SELECT * FROM pkmnjourney_users WHERE username = :username");
            $stmt->bindParam(':username', $username);
            $stmt->execute();
            $existingUser = $stmt->fetch(PDO::FETCH_ASSOC);
            foreach ($existingUser as $key => $value) {
                if ($key != "password") {
                    $userData[$key] = $value;
                }

                if ($key == 'user_id') {
                    $userData['trainer_id'] = sprintf("%08d", $value);
                }
                else if ($key == 'registration_date') {
                    $userData['registration_date'] = date("Y-m-d", strtotime($value));
                }

            }

            if ($existingUser) {
                // Username already taken
                echo json_encode(array(
                    "success" => true,
                    "data" => $userData));
            }
            else {
                echo json_encode(array(
                    "success" => false,
                    "message" => "Current steps not retrieved."));
            }
        break;

        case "getmultiplayerdata":
            if (session_status() === PHP_SESSION_NONE) {
                session_start();
            }
            $username = $_SESSION['username'];
            $userData = array();

            // Check if the username already exists
            $stmt = $pdo->prepare("SELECT * FROM pkmnjourney_users WHERE username != :username");
            $stmt->bindParam(':username', $username);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

            if ($result) {
                foreach ($result as $row) {
                    $userDataRow = array();
                    foreach ($row as $key => $value) {
                        if ($key == "username" || $key == "steps" || $key == "gender") {
                            $userDataRow[$key] = $value;
                        }
                        if ($key == 'user_id') {
                            $userDataRow['trainer_id'] = sprintf("%08d", $value);
                        }
                    }
                    $userData[] = $userDataRow;
                }

                // Data retrieval successful
                echo json_encode(array(
                    "success" => true,
                    "data" => $userData));
            }
            else {
                // No matching users found
                echo json_encode(array(
                    "success" => false,
                    "message" => "Current steps not retrieved."));
            }
        break;

        case "getevents":
            if (session_status() === PHP_SESSION_NONE) {
                session_start();
            }
            $eventData = array();

            // Check if the username already exists
            $stmt = $pdo->prepare("SELECT * FROM pkmnjourney_events");
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            if ($result) {
                foreach ($result as $row) {
                    $eventData[] = $row;
                }
                // Data retrieval successful
                echo json_encode(array(
                    "success" => true,
                    "data" => $eventData));
            }
            else {
                // No matching users found
                echo json_encode(array(
                    "success" => false,
                    "message" => "Current steps not retrieved."));
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