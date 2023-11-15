<?php
// Include the header after the session check
include_once 'header.php';
//print_r($_SESSION);
?>
<body>
<div id="background"></div>
<p>Hello <?= $_SESSION['username'] ?></p>
<!-- Your page content goes here -->
</body>
<script>
    $(document).ready(function () {
        var bodyStyles = {
            'width': '100%',
            'height': '100%',
            'position': 'fixed',
            'top': '0',
            'left': '0',
            'z-index': '-1',
            'margin': '0',
            'padding': '0',
            'background-image': 'url("assets/img/bg day.png")',
            'background-size': 'cover',
            'background-color': '#78c7f7',
            'background-repeat': 'repeat-x',
            'background-position': 'left bottom'
        };

        $('#background').css(bodyStyles);

    });
</script>
</html>
