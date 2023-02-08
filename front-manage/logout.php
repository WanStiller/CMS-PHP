<?php
session_start();
error_reporting(0);
include("../partials/configuration.php");
$_SESSION['login']=="";
session_unset();
session_destroy();
?>
<script language="javascript">
history.back(-2);
</script>
