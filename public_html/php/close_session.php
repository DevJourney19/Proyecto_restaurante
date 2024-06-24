<?php
session_start();
session_destroy();

header("location: ../login_signup.php?logout=true");
?>;