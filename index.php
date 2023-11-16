<?php
include_once 'header.php';

if (!isset($_SESSION["logged_in"]) || $_SESSION["logged_in"] !== true) {
    header("Location: login.php");
    exit(); // Use exit() instead of die()
}
?>
<body>
<div id="background"></div>
<p>Hello <?= $_SESSION['username'] ?></p>
<button id="move" type="button" class="btn btn-secondary" style="position: absolute; bottom: 20px; left: 50%; transform: translateX(-50%)">Move</button>
<button id="logout" type="button" class="btn btn-secondary" style="position: absolute; top: 20px; right: 20px;">Logout</button>
<img id="character" alt="character" style="position: absolute; bottom: 100px; left: 10%;"/>

</body>
<script>
    $(document).ready(function () {
        var backgroundOffset = 0; //start offset for background
        var backgroundSpeed = 0.3; //set backgroundSpeed
        var defaultcharacter = 1; //set default character to 1.png
        var gender = 'boy';
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
            'background-position': 'left ' + backgroundOffset + 'px bottom'
        };
        $('#character').attr('src', 'assets/potagonist/m' + defaultcharacter + '.png');
        $('#background').css(backgroundDay);

        $('#move').click(function () {
            BackgroundMovement();
            CharacterMovement(gender);
        });

        function CharacterMovement(gender) {
            defaultcharacter++;
            if (gender === 'boy') {
                $('#character').attr('src', 'assets/potagonist/m' + defaultcharacter + '.png').fadeIn(400);
            } else if (gender === 'girl') {
                $('#character').attr('src', 'assets/potagonist/f' + defaultcharacter + '.png').fadeIn(400);
            }
            if (defaultcharacter === 4) {
                defaultcharacter = 1;
            }
        }

        function BackgroundMovement() {
            backgroundOffset -= 30; // Adjust the value according to your needs
            backgroundSpeed = 0.3; // Adjust the value according to your needs
            $('#background').css('background-position', 'left ' + backgroundOffset + 'px bottom').css('transition', 'background-position ' + backgroundSpeed + 's ease');
        }

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
