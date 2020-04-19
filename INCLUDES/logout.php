<?php

include '../CORE/init.php';

$getFromU->logout();

if ($getFromU->loggedIn() === false) {
    header('Location:' . BASE_URL . 'index.php');
} else {

    header('Location:' . BASE_URL . 'index.php');

}
