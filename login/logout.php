<?php
session_start();

unset($_SESSION["s_idx"]);
unset($_SESSION["s_name"]);
unset($_SESSION["s_id"]);
unset($_SESSION["s_mobile"]);
unset($_SESSION["s_email"]);
unset($_SESSION["s_addr"]);



echo "
    <script>
        location.href=\"../index.php\";
    </script>
";
?>