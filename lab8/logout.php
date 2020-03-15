<?php
 unset($_SESSION['id']);
 unset($_SESSION['password']);
 $_SESSION = array();
 session_destroy();