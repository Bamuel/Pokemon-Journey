<?php
// Include the header after the session check
include_once 'header.php';
// Check if the "logged_in" session variable is not set or is not true
if (!isset($_SESSION["logged_in"]) || $_SESSION["logged_in"] !== true) {
    header("Location: login.php");
    exit(); // Use exit() instead of die()
}
?>
<body>
<div id="background"></div>
<p>Hello <?= $_SESSION['username'] ?></p>
<button id="step" type="button" class="btn btn-secondary">Step</button>
<button id="logout" type="button" class="btn btn-secondary">Logout</button>

</body>
<script>
    $(document).ready(function () {
        var backgroundDay = {
            'width': '100%',
            'height': '100%',
            'position': 'fixed',
            'top': '0',
            'left': '0',
            'z-index': '-1',
            'margin': '0',
            'padding': '0',
            'background-image': 'url("assets/img/bg_day.png")',
            'background-size': 'cover',
            'background-color': '#78c7f7',
            'background-repeat': 'repeat-x',
            'background-position': 'left bottom'
        };
        var backgroundOffset = 0;
        $('#background').css(backgroundDay);

        $('#step').click(function () {
            //speed
            backgroundOffset -= 60; // Adjust the value according to your needs
            $('#background').css('background-position', 'left ' + backgroundOffset + 'px bottom');
        });

        $('#logout').click(function () {
            $.ajax({
                url: "ajax.php",
                type: "POST",
                data: {
                    action: "logout"
                },
                dataType: "json",
                success: function (data) {
                    if (data.success) {
                        window.location.href = "login.php";
                    }
                }
            });
        });

    });
</script>
</html>
