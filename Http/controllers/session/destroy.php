<?php
//log the user out


use Core\Authenticator;

Authenticator::logout();
header('location: /');
exit();