<?php
include_once 'header.php';

if (!isset($_SESSION["logged_in"]) || $_SESSION["logged_in"] !== true) {
    header("Location: login.php");
    exit(); // Use exit() instead of die()
}
?>
<style>
    body, html {
        overflow: hidden;
    }

    #menu_buttons {
        position: absolute;
        top: 70px;
        right: 20px;
        display: block;
        text-align: left;
    }

    #menu_buttons span {
        margin-bottom: 10px;
        display: block;
        padding: 10px 20px 10px 20px;
        background: #8a8a8a;
        border-radius: 7px;
    }

    #menu_buttons span a {
        color: white; /* Text color */
        text-decoration: none;
    }

    #menu_buttons span a:hover {
        color: #007bff; /* Hover color */
    }
</style>
<body>
<div id="background"></div>
<button id="move" type="button" class="btn btn-secondary" style="position: absolute; bottom: 20px; left: 50%; transform: translateX(-50%)"><i class="fa-solid fa-person-walking"></i> Move</button>
<span class="btn btn-secondary" style="position: absolute; top: 20px; left: 20px;">Steps: <span id="currentstep">0</span></span>
<button id="ToggleMenu" type="button" class="btn btn-secondary" style="position: absolute; top: 20px; right: 20px;"><i id="toggle_icon" class="fa-solid fa-bars fa-fw"></i></button>
<div id="menu_buttons" style="display: none">
    <span id="pokedex" class=""><a href="#">Pokedex</a></span>
    <span id="pokemon" class=""><a href="#">Pokemon</a></span>
    <span id="user" class=""><a href="#"><i class="fa-solid fa-user fa-fw"></i> <?= $_SESSION['username'] ?></a></span>
    <span id="save" class=""><a href="#"><i class="fa-solid fa-floppy-disk fa-fw"></i> Save</a></span>
    <span id="options" class=""><a href="#"><i class="fa-solid fa-gear fa-fw"></i> Options</a></span>
    <span id="logout" class=""><a href="#"><i class="fa-solid fa-right-from-bracket fa-fw"></i> Logout</a></span>
</div>

<img id="character" alt="character" style="position: absolute; bottom: 100px; left: 10%;"/>

</body>
<script>
    $(document).ready(function () {
        var currentsteps = 0;
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


        $("#ToggleMenu").click(function () {
            $("#menu_buttons").toggle();
            $("#toggle_icon").toggleClass('fa-bars fa-xmark');
        });

        $('#move').click(function () {
            BackgroundMovement();
            CharacterMovement(gender);
            currentsteps++;
            $('#currentstep').text(currentsteps);
        });

        function CharacterMovement(gender) {
            defaultcharacter++;
            if (gender === 'boy') {
                $('#character').attr('src', 'assets/potagonist/m' + defaultcharacter + '.png').fadeIn(400);
            } else if (gender === 'girl') {
                $('#character').attr('src', 'assets/potagonist/f' + defaultcharacter + '.png').fadeIn(400);
            }
            if (defaultcharacter === 4) {
                defaultcharacter = 0;
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

    // Disable pinch zoom and double-tap zoom
    document.addEventListener('gesturestart', function (e) {
        e.preventDefault();
    });

    // Disable scrolling
    document.addEventListener('touchmove', function (e) {
        e.preventDefault();
    });
</script>
</html>
