<?php

    session_start();

    session_unset();

    session_destroy();
?>


    <script>
        alert('Sign Out Successfully.');
        window.open('../index.php','_self');
    </script>