<?php
session_start();
session_unset();  
session_destroy(); 
echo'
<script>
alert("You Have Successfully Logged out!");
</script>
';
header("Location: ../index.html"); 
?>
