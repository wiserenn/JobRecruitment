<?php
session_start();
$_SESSION["login"]=false;

if (isset($_GET['message'])) {
    $message = $_GET['message'];
    echo '<script>alert("' . $message . '");</script>';
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>User Selection</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    
    <div class="background">
        <div class="shape"></div>
        <div class="shape"></div>
    </div>


    
<form>
<h3>Select your Choice</h3>

<button type="button" onclick="redirectToEmployerLogin()">
    Employer Login
</button>

<button type="button" onclick="redirectToJobSeekerLogin()">
    Job Seeker Login
</button>

   
</form>
    
<script>
    function redirectToEmployerLogin() {
        window.location.href = 'employer_login.php';
    }
    function redirectToJobSeekerLogin() {
            window.location.href = 'job_seeker_login.php';
        }
</script>

</body>

</html>