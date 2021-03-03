<?php 
    error_reporting(0);
    ob_start();
    session_start();

    $msg = '';

    if($_SESSION['valid'] === true){
        include './comm/baseURL.php';
        header("Location: ".$baseURL);
    }    
    else if (isset($_POST['forgetPass']) && !empty($_POST['email'])) 
    {
        $email = $_POST['email'];
        include './comm/db.php';
        include './comm/baseURL.php';
        $sql = "SELECT * FROM user WHERE email='$email' && status=1"; 
        $result = $conn->query($sql);
        $row = $result -> fetch_array(MYSQLI_ASSOC);
        if(mysqli_num_rows($result) > 0)
        {
            $msg = 'Please check your mail for reset your password';
        }
        else
        {
            $msg = 'Entered email is not registered';
        }
    }

?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Forgot Password | Eye</title>
    <?php include('./comm/headerLinks.php') ?>
</head>

<body class="fp-page">
    <div class="fp-box">
        <div class="logo">
            <a href="javascript:void(0);">Admin<b>BSB</b></a>
            <small>Admin BootStrap Based - Material Design</small>
        </div>
        <div class="card">
            <div class="body">
                <form id="forgot_password" method="POST">
                    <div class="msg">
                        Enter your email address that you used to register. We'll send you an email with your username and a
                        link to reset your password.</br><h5 class = "form-signin-heading" style="color:red;"><?= $msg ?></h5>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">email</i>
                        </span>
                        <div class="form-line">
                            <input type="email" class="form-control" name="email" placeholder="Email" required autofocus>
                        </div>
                    </div>

                    <button class="btn btn-block btn-lg bg-pink waves-effect" name="forgetPass" type="submit">RESET MY PASSWORD</button>

                    <div class="row m-t-20 m-b--5 align-center">
                        <a href="login.php">Sign In!</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <?php include('./comm/footerLinks.php') ?>
</body>

</html>