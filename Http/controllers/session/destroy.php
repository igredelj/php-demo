<?php

// Log user out.

use Core\Authenticator;

(new Authenticator)->logout();
// Redirect user.
header('location: /');
exit();