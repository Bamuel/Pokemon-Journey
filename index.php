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
        color: white; /* Text color */
    }

    @font-face {
        font-family: 'pokeball';
        src: url('assets/customicons/pokeball.eot');
        src: url('assets/customicons/pokeball.eot?5fv3ss#iefix') format('embedded-opentype'),
        url('assets/customicons/pokeball.ttf?5fv3ss') format('truetype'),
        url('assets/customicons/pokeball.woff?5fv3ss') format('woff'),
        url('assets/customicons/pokeball.svg?5fv3ss#pokeball') format('svg');
        font-weight: normal;
        font-style: normal;
        font-display: block;
    }

    .icon-pokeball {
        /* use !important to prevent issues with browser extensions that change fonts */
        font-family: 'pokeball' !important;
        speak: never;
        font-style: normal;
        font-weight: normal;
        font-variant: normal;
        text-transform: none;
        line-height: 1;

        /* Better Font Rendering =========== */
        -webkit-font-smoothing: antialiased;
        -moz-osx-font-smoothing: grayscale;
    }

    .icon-pokeball:before {
        content: "\e900";
    }


</style>
<body>
<div id="background"></div>
<div id="move" style="position: fixed; bottom: 0; width: 100%; height: 150px;">
    <button type="button" class="btn btn-secondary" style="position: relative; left: 50%; top: 50%; transform: translateY(-50%)  translateX(-50%); box-sizing: border-box;">
        <i class="fa-solid fa-person-walking"></i> Move
    </button>
</div>
<span class="btn btn-secondary" style="position: fixed; top: 20px; left: 20px;">Steps: <span id="currentstep">0</span></span>
<button id="ToggleMenu" type="button" class="btn btn-secondary" style="position: fixed; top: 20px; right: 20px;"><i id="toggle_icon" class="fa-solid fa-bars fa-fw"></i></button>
<div id="menu_buttons" style="display: none; cursor: pointer">
    <span id="pokemon" data-bs-toggle="modal" data-bs-target="#userPokemon"><i class="icon-pokeball"></i> Pokemon</span>
    <span id="user" data-bs-toggle="modal" data-bs-target="#userModal"><i class="fa-solid fa-user fa-fw"></i> <?= $_SESSION['username'] ?></span>
    <span id="options" data-bs-toggle="modal" data-bs-target="#userOptions"><i class="fa-solid fa-gear fa-fw"></i> Options</span>
    <span id="logout"><i class="fa-solid fa-right-from-bracket fa-fw"></i> Logout</span>
</div>

<div class="modal fade menu-modal" id="userPokemon" tabindex="-1" role="dialog" aria-labelledby="userPokemonLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Pokemon</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" style="display: inline-flex;">
                <p>Cool Pokemon Here</p>
            </div>
            <div class="modal-footer">
                <p>xxx/xxx Pokemon Discovered</p>
            </div>
        </div>
    </div>
</div>
<div class="modal fade menu-modal" id="userModal" tabindex="-1" role="dialog" aria-labelledby="userModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Trainer Card</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" style="display: inline-flex;">
                <img id="profile_image" style="padding-right: 30px">
                <div id="profileabout">
                    <pre>Trainer ID: <span id="profile_trainer_id"></span></pre>
                    <pre>Pokemon Seen: <span id="profile_pokemon_seen"></span></pre>
                    <pre>Pokemon Caught: <span id="profile_pokemon_caught"></span></pre>
                    <pre>Start Date: <span id="profile_start_date"></span></pre>
                </div>
            </div>
            <div class="modal-footer">
                <div style="display: inline-flex">
                    <img id="profile_badge1" style="width: 30px; padding: 5px" src="assets/img/badge0.png">
                    <img id="profile_badge2" style="width: 30px; padding: 5px" src="assets/img/badge0.png">
                    <img id="profile_badge3" style="width: 30px; padding: 5px" src="assets/img/badge0.png">
                    <img id="profile_badge4" style="width: 30px; padding: 5px" src="assets/img/badge0.png">
                    <img id="profile_badge5" style="width: 30px; padding: 5px" src="assets/img/badge0.png">
                    <img id="profile_badge6" style="width: 30px; padding: 5px" src="assets/img/badge0.png">
                    <img id="profile_badge7" style="width: 30px; padding: 5px" src="assets/img/badge0.png">
                    <img id="profile_badge8" style="width: 30px; padding: 5px" src="assets/img/badge0.png">
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade menu-modal" id="userOptions" tabindex="-1" role="dialog" aria-labelledby="userOptionsLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Options</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <label for="musicVolume">Music Volume</label>
                <input type="range" class="form-range" id="musicVolume" min="0" max="100">

                <label for="seVolume">SE Volume</label>
                <input type="range" class="form-range" id="seVolume" min="0" max="100">

                <label for="textSpeed">Text Speed</label>
                <select class="form-select" id="textSpeed">
                    <option value="slow">Slow</option>
                    <option value="medium" selected>Medium</option>
                    <option value="fast">Fast</option>
                </select>
                <br>

                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="battleEffects">
                    <label class="form-check-label" for="battleEffects">Battle Effects</label>
                </div>

                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="battleStyle">
                    <label class="form-check-label" for="battleStyle">Battle Style</label>
                </div>

                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="multiplayercheck">
                    <label class="form-check-label" for="multiplayercheck">Multiplayer</label>
                </div>

                <hr>
                <button type="button" class="btn btn-primary mt-3">Change Password</button>
            </div>
            <div class="modal-footer">
                <p>Developed by <a href="https://github.com/Bamuel/Pokemon-Journey" target="_blank">Bamuel</a></p>
            </div>
        </div>
    </div>
</div>

<span id="character" style="position: fixed; bottom: 100px; left: 50px; width: 64px; height: 56px"></span>
<div id="multiplayer"></div>

</body>
<script>
    $(document).ready(function () {
        //$('#userOptions').modal('show');
        //on page load
        load();

        function load() {
            console.log('Loading Data');
            $.ajax({
                url: "ajax.php",
                type: "POST",
                data: {
                    action: "getuserdata"
                },
                dataType: "json",
                success: function (data) {
                    if (data.success) {
                        data = data.data;
                        console.log(data);

                        currentsteps = data.steps;
                        $('#currentstep').text(currentsteps);

                        gender = data.gender;
                        CharacterMovement(gender);

                        $('#profile_pokemon_seen').text(0);
                        $('#profile_pokemon_caught').text(0);
                        $('#profile_trainer_id').text(data.trainer_id);
                        $('#profile_start_date').text(data.registration_date);
                        if (gender === 'boy') {
                            $('#profile_image').attr('src', 'assets/potagonist/trainer000.1.png');
                        } else if (gender === 'girl') {
                            $('#profile_image').attr('src', 'assets/potagonist/trainer001.1.png');
                        } else {
                            $('#profile_image').attr('src', 'assets/potagonist/trainer000.1.png');
                        }

                        setPofileBadge(data);
                        multiplayer();
                        setInterval(multiplayer, 500);
                    }
                },
                error: function (data) {
                    console.log(data);
                }
            });
        }

        function multiplayer() {
            $.ajax({
                url: "ajax.php",
                type: "POST",
                data: {
                    action: "getmultiplayerdata"
                },
                dataType: "json",
                success: function (data) {
                    if (data.success) {
                        $('#multiplayer').empty();
                        var userContainer = $("#multiplayer");
                        console.log(data.data);

                        // Loop through each user data and create a div for each
                        $.each(data.data, function (index, user) {
                            //var heightposition = Math.floor(Math.random() * (161));
                            var heightposition = 160;

                            // Adjust the left position calculation based on currentsteps
                            var leftposition = ((user.steps - currentsteps) * 30) + 50;

                            var spriteSheet = (user.gender === 'boy') ? 'assets/potagonist/ColeRunBW.png' : 'assets/potagonist/BWEllaRunning.png';

                            if (user.steps % 4 === 0) {
                                var backgroundposition = '0px -56px';
                            } else if (user.steps % 4 === 1) {
                                var backgroundposition = '-64px 0px';
                            } else if (user.steps % 4 === 2) {
                                var backgroundposition = '-128px 0px';
                            } else if (user.steps % 4 === 3) {
                                var backgroundposition = '-192px 0px';
                            }

                            var userDiv = $("<div>", {
                                class: "multiplayerUsers", // Add any necessary classes
                                id: user.trainer_id, // Add the id attribute
                                //position: fixed; bottom: 150px; width: 64px; height: 56px
                                css: {
                                    'background-image': 'url(' + spriteSheet + ')',
                                    'background-position': backgroundposition,
                                    'position': 'fixed',
                                    'bottom': heightposition + 'px',
                                    'width': '64px',
                                    'height': '56px',
                                    'left': leftposition + 'px',
                                    'z-index': '-1'
                                    // Add additional styles as needed
                                }
                            });

                            // Append the user div to the container
                            userContainer.append(userDiv);

                            // You can also append user information within the div if needed
                            userDiv.append("<p style='color: black; margin-top: -20px; text-align: center'>" + user.username + "</p>");
                            //userDiv.append("<p>Steps: " + user.steps + "</p>");
                            // Add more user information as needed
                        });
                    }
                },
                error: function (data) {
                    console.log(data);
                }
            });
        }

        function setPofileBadge(data) {
            if (data.badge1 == 1) {
                $('#profile_badge1').attr('src', 'assets/img/badge1.png');
            }
            if (data.badge2 == 1) {
                $('#profile_badge2').attr('src', 'assets/img/badge2.png');
            }
            if (data.badge3 == 1) {
                $('#profile_badge3').attr('src', 'assets/img/badge3.png');
            }
            if (data.badge4 == 1) {
                $('#profile_badge4').attr('src', 'assets/img/badge4.png');
            }
            if (data.badge5 == 1) {
                $('#profile_badge5').attr('src', 'assets/img/badge5.png');
            }
            if (data.badge6 == 1) {
                $('#profile_badge6').attr('src', 'assets/img/badge6.png');
            }
            if (data.badge7 == 1) {
                $('#profile_badge7').attr('src', 'assets/img/badge7.png');
            }
            if (data.badge8 == 1) {
                $('#profile_badge8').attr('src', 'assets/img/badge8.png');
            }
        }

        var backgroundOffset = 0; //start offset for background
        var backgroundSpeed = 0.3; //set backgroundSpeed
        var defaultcharacter = 1; //set default character to 1.png
        var numberOfFramesPerRow = 4; // Define the number of frames per row in the sprite sheet

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

        $('#background').css(backgroundDay);


        $("#ToggleMenu").click(function () {
            $("#menu_buttons").toggle();
            $("#toggle_icon").toggleClass('fa-bars fa-xmark');
            //load(); //reloads data if out of sync, Only possible if the user has multiple tabs open or if the user is using multiple devices
        });
        // Add a click event listener for the userModal
        $(".menu-modal").on('show.bs.modal', function () {
            $("#menu_buttons").toggle();
            $("#toggle_icon").toggleClass('fa-bars fa-xmark');
        });

        function UpdateMultiplayerUsers() {
            $('.multiplayerUsers').each(function () {
                var currentLeft = parseInt($(this).css('left'), 10);
                //$(this).css('left', (currentLeft - 30) + 'px');
                $(this).animate({left: (currentLeft - 30) + 'px'}, {duration: 'fast', easing: 'swing'});
                //console.log($(this).attr('id')); // Log the id attribute
            });

        }

        $('#move').click(function () {
            CharacterMovement(gender);
            BackgroundMovement();
            currentsteps++;
            $('#currentstep').text(currentsteps);
            SaveCurrentSteps(currentsteps);
            UpdateMultiplayerUsers();
        });

        function SaveCurrentSteps(currentsteps) {
            $.ajax({
                url: "ajax.php",
                type: "POST",
                data: {
                    action: "savecurrentsteps",
                    currentsteps: currentsteps
                },
                dataType: "json",
                success: function (data) {
                    if (data.success) {
                        console.log(data);
                    }
                }
            });
        }


        function CharacterMovement(gender) {
            // Specify the sprite sheet image
            if (gender === 'boy') {
                var spriteSheet = 'assets/potagonist/ColeRunBW.png';
            } else if (gender === 'girl') {
                var spriteSheet = 'assets/potagonist/BWEllaRunning.png';
            } else {
                var spriteSheet = 'assets/potagonist/BWEllaRunning.png';
            }


            // Set the dimensions of each frame in the sprite sheet
            var frameWidth = 64;
            var frameHeight = 56;

            // Increase the frame index
            defaultcharacter++;

            // Calculate the position of the current frame in the sprite sheet
            var frameX = (defaultcharacter % numberOfFramesPerRow) * frameWidth;
            var frameY = Math.floor(defaultcharacter / numberOfFramesPerRow) * frameHeight;

            if (gender === 'boy') {
                $('#character').css({
                    'background-image': 'url(' + spriteSheet + ')',
                    'background-position': -frameX + 'px ' + -frameY + 'px',
                })
            } else if (gender === 'girl') {
                // Assuming the girl's sprite sheet is in the same format
                $('#character').css({
                    'background-image': 'url(' + spriteSheet + ')',
                    'background-position': frameX + 'px ' + frameY + 'px'
                })
            }

            // Reset the frame index if it reaches the maximum number of frames
            if (defaultcharacter === 4) {
                defaultcharacter = 0;
            }
        }

        function BackgroundMovement() {
            backgroundOffset -= 30; // Adjust the value according to your needs
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
</script>
</html>
