<?php include("includes/a_config.php");?>
<!DOCTYPE html>
<html>
<head>
    <title>DTDb Profile Page</title>
    <link rel="stylesheet" href="css/global.css">
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/index_page.css">
</head>
<body>

<div class="grid-container">

    <section class="app-header">
      <div class="logo-index"></div>
    </section>

    <main>
      <div class="button-container">
        <div class="button-container">
        <a href="User-Pages/user-homepage.php">
          <button>User</button>
        </a>
        <a href="Mod-Pages/mod-homepage.php">
          <button>Moderator</button>
        </a>
        <a href="Admin-Pages/admin-homepage.php">
          <button>Administrator</button>
        </a>
      </div>
    </main>

    <?php include("includes/footer.php");?>

</div>



</body>
</html>