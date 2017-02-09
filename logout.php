<?php
/**
 * Created by PhpStorm.
 * User: vu.vuong
 * Date: 2/9/2017
 * Time: 5:34 PM
 */
session_start();
session_destroy();
header('Location: index.php');