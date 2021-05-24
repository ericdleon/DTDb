<?php // login.php   make sure to place in personal folder
$db_hostname = 'localhost';
$db_database = 'ejdrutg1_DTDb';
$db_username = 'ejdrutg1_ejd110';
$db_password = 'Typewriter2020!';

//Create the connection to the MySQL database
$db_server = mysqli_connect($db_hostname, $db_username, $db_password, $db_database);
if (!$db_server) die("Unable to connect to MySQL: " . mysql_error());

switch ($_SERVER["SCRIPT_NAME"]) {
    case "/Playground/User-Pages/user-homepage.php":
        $CURRENT_PAGE = "User Homepage"; 
        $PAGE_TITLE = "Homepage";
        break;
    case "/Playground/User-Pages/search.php";
        $CURRENT_PAGE = "Search";
        $PAGE_TITLE = "Results";
        break;
    case "/Playground/User-Pages/device_page.php":
        $CURRENT_PAGE = "Device"; 
        $PAGE_TITLE = "Device";
        break;


    case "/Playground/Mod-Pages/mod-homepage.php":
        $CURRENT_PAGE = "Mod Homepage"; 
        $PAGE_TITLE = "Homepage";
        break;
    case "/Playground/Mod-Pages/search.php";
        $CURRENT_PAGE = "Search";
        $PAGE_TITLE = "Results";
        break;
    case "/Playground/Mod-Pages/device_page.php":
        $CURRENT_PAGE = "Device"; 
        $PAGE_TITLE = "Device";
        break;    


    case "/Playground/Admin-Pages/admin-homepage.php":
        $CURRENT_PAGE = "Admin Homepage"; 
        $PAGE_TITLE = "Homepage";
        break;
    case "/Playground/Admin-Pages/search.php";
        $CURRENT_PAGE = "Search";
        $PAGE_TITLE = "Results";
        break;
    case "/Playground/Admin-Pages/device_page.php":
        $CURRENT_PAGE = "Device"; 
        $PAGE_TITLE = "Device";
        break;


    case "/Playground/contact.php":
        $CURRENT_PAGE = "Contact"; 
        $PAGE_TITLE = "Contact Us";
        break;
    default:
        $CURRENT_PAGE = "Index";
        $PAGE_TITLE = "DTDb Profile Page";
}

?>

