<?php
include_once 'header.php';
?>
<style>
    body {
        background-image: url("assets/img/bglogin.png");
        background-repeat: no-repeat;
        background-size: cover;
        background-color: #008837;
    }

    .login-container {
        max-width: 400px;
        margin: auto;
        margin-top: 50px;
    }

    .card {
        border: none;
    }
</style>
<body>
<div class="container login-container">
    <div class="card">
        <div class="card-body">
            <form id="login-form">
                <h1 class="card-title text-center mb-4">Login</h1>
                <p class="card-text">To register an account click <a href="javascript:void(0);" onclick="switchForm()"><b>here</b></a></p>

                <div id="error-message" class="alert alert-danger" style="display: none;"></div>

                <div class="mb-3">
                    <label for="username" class="form-label"><i class="fa-solid fa-user"></i> Username:</label>
                    <input type="text" class="form-control" id="username" name="username" placeholder="" required>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label"><i class="fa-solid fa-key"></i> Password:</label>
                    <input type="password" class="form-control" id="password" name="password" required>
                </div>
                <button type="button" id="login-btn" class="btn btn-primary btn-block">Login</button>
            </form>

            <form id="register-form" class="register-form" style="display: none;">
                <h1 class="card-title text-center mb-4">Register</h1>
                <p class="card-text">Already have an account? Click <a href="javascript:void(0);" onclick="switchForm()"><b>here</b></a> to login.</p>

                <div id="error-message-register" class="alert alert-danger" style="display: none;"></div>
                <div>
                    <div class="mb-3">
                        <label for="register-username" class="form-label"><i class="fa-solid fa-user"></i> Username:</label>
                        <input type="text" class="form-control" id="register-username" name="register-username" placeholder="" required>
                    </div>
                    <div class="mb-3">
                        <label for="register-password" class="form-label"><i class="fa-solid fa-key"></i> Password:</label>
                        <input type="password" class="form-control" id="register-password" name="register-password" required>
                    </div>
                    <button type="button" id="register-btn" class="btn btn-primary btn-block">Register</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    function switchForm() {
        $("#login-form").toggle();
        $("#register-form").toggle();
    }

    $(document).ready(function () {
        $("#login-btn").on("click", function () {
            var username = $("#username").val();
            var password = $("#password").val();

            $.ajax({
                type: "POST",
                url: "/ajax.php?action=login",
                data: {
                    username: username,
                    password: password
                },
                success: function (response) {
                    response = JSON.parse(response);
                    if (response.success) {
                        // Successful login
                        //$("#success-message").text(response.message).show();
                        location.href = "/index.php";
                    } else {
                        // Login failed
                        $("#error-message").text(response.message).show();
                    }
                },
                error: function (xhr, status, error) {
                    console.error(xhr.responseText);
                    $("#error-message").text("An error occurred while processing your request.").show();
                }
            });
        });

        $("#register-btn").on("click", function () {
            var username = $("#register-username").val();
            var password = $("#register-password").val();

            $.ajax({
                type: "POST",
                url: "/ajax.php?action=register",
                data: {
                    username: username,
                    password: password
                },
                success: function (response) {
                    response = JSON.parse(response);
                    if (response.success) {
                        // Successful login
                        //$("#success-message").text(response.message).show();
                        location.href = "/index.php";
                    } else {
                        // Login failed
                        $("#error-message").text(response.message).show();
                    }
                },
                error: function (xhr, status, error) {
                    console.error(xhr.responseText);
                    $("#error-message").text("An error occurred while processing your request.").show();
                }
            });
        });

        $("#password").keypress(function (e) {
            if (e.which === 13 || e.key === "Enter") {
                $("#login-btn").click();
            }
        });

        $("#register-password").keypress(function (e) {
            if (e.which === 13 || e.key === "Enter") {
                $("#register-btn").click();
            }
        });
    });
</script>

</body>
</html>