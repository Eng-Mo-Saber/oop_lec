<?php

$page = isset($_GET['page']) ? $_GET['page'] : "home";

switch ($page) {
    case "home":
        require_once "../views/home.php";
        break;
    case "cart":
        require_once "../views/cart.php";
        break;
}
