<?php include("../includes/a_config.php");?>

<!DOCTYPE html>
<html>
<head>
    <title>OS</title>
    <link rel="stylesheet" href="../css/global.css">
    <link rel="stylesheet" href="../css/normalize.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../css/insert-page.css">
</head>
<body>

<div class="grid-container">

    <?php include("../includes/main-navigation.php");?>

    <section class="nav-trail">
        
        <h1>Operating System</h1>
        <div class="mini-nav">
	        <ul>
	            <li>
	                <a  <?php if ($CURRENT_PAGE == "User Homepage") {?>active<?php }?> href="/Playground/Admin-Pages/admin-homepage.php">Home</a>
                </li>
                <li>
	                <a  <?php if ($CURRENT_PAGE == "User Homepage") {?>active<?php }?> href="/Playground/Admin-Pages/admin-add-screen.php">Add Components</a>
                </li>
            </ul>
        </div>

    </section>

    <main>
    <form class="content" method="POST" action="insert-os-process.php">
			<p>Enter a OS into the OS Table  </p>
		  	<p>OS ID: 
          		<input type="text" name="os_id"/>
		  	</p>
		  	<p>OS Name:
			  	<input type="text" name="os_name"/></p>			  
		
            <input class="content-button" type="submit">
        </form>
    </main>

    <?php include("../includes/footer.php");?>

</div>

</body>
</html>