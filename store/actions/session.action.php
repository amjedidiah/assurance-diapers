
<?php 
    session_start();
    
    function getUser($session_id) {  
        require("connect.action.php");
        $user = $mysqli->query("SELECT * FROM users WHERE id='$session_id'");
        return $user->fetch_assoc();
        
        mysqli_close();
    }
?>