<?php include("Controllers/SessionController.php"); include("resources/views/header.php"); ?>

    <!-- CSS FILES -->
    <?php include("resources/css/app.css.php"); ?>
    <style>video{width: 100vw; height: 100vh; object-fit: cover; position: fixed; top: 0; left: 0;}</style>

    <title>Yönlendiriliyorsunuz...</title>
</head>
<body>

    <video autoplay muted loop src="public/video/welcome.mp4"></video>

    <?php include("Controllers/WelcomeController.php");  ?>

    <!-- JS FILES -->
    <?php include("resources/js/app.js.php"); ?>
	
</body>
</html>