<?php 
    error_reporting(0);
    ob_start();
    session_start();

    $msg = '';

    if($_SESSION['valid'] === true){
        include './comm/baseURL.php';
        header("Location: ".$baseURL);
    }    
    else if (isset($_POST['login']) && !empty($_POST['username']) && !empty($_POST['password'])) 
    {
        $username = $_POST['username'];
        $password = md5($_POST['password']);
        include './comm/db.php';
        include './comm/baseURL.php';
        $sql = "SELECT * FROM user WHERE (email='$username' or phone='$username') && password='$password' && status=1"; 
        $result = $conn->query($sql);
        $row = $result -> fetch_array(MYSQLI_ASSOC);
        if(mysqli_num_rows($result) > 0)
        {
            if($row['emp_type'] !== 'superadmin'){
                $branch = $row['branch'];
                $sql1 = "SELECT * FROM branch WHERE branch_name='$branch' and status=1"; 
                $result1 = $conn->query($sql1);
                $row1 = $result1 -> fetch_array(MYSQLI_ASSOC);
                if(mysqli_num_rows($result1) > 0) {
                    $_SESSION['username']   = $row['email'];
                    $_SESSION['uName']      = $row['name'];
                    $_SESSION['empType']    = $row['emp_type'];
                    $_SESSION['branch']     = $row['branch'];
                    $_SESSION['valid']      = true;
                    $_SESSION['timeout']    = time();
                    include './comm/loginL.php';
                    header("Location: ".$baseURL);
                } else {
                    $msg = 'User not exist!';
                }
            } else{
                $_SESSION['username']   = $row['email'];
                $_SESSION['uName']      = $row['name'];
                $_SESSION['empType']    = $row['emp_type'];
                $_SESSION['branch']     = $row['branch'];
                $_SESSION['valid']      = true;
                $_SESSION['timeout']    = time();
                include './comm/loginL.php';
                header("Location: ".$baseURL);
            }  
        }
        else
        {
            $msg = 'Wrong username or password';
        }
    }

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Sign In | My Eye Care</title>
    <?php include('./comm/headerLinks.php') ?>
</head>

<body class="login-page">
    <div class="login-box">
        <div class="logo">
            <a href="javascript:void(0);">My <b>Eye</b> Care</a>
            <small>My Eye Care CRM</small>
        </div>
        <div class="card">
            <div class="body">
                <form id="sign_in" method="POST" autocomplete="false">
                    <div class="msg">Sign in to start your session</br><h5 class = "form-signin-heading" style="color:red;"><?= $msg ?></h5></div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">person</i>
                        </span>
                        <div class="form-line">
                            <input type="text" class="form-control" name="username" placeholder="Email or Phone No." required autocomplete="off">
                        </div>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">lock</i>
                        </span>
                        <div class="form-line">
                            <input type="password" class="form-control" name="password" placeholder="Password" autocomplete="off" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-8 p-t-5">
                            <!-- <input type="checkbox" name="rememberme" id="rememberme" class="filled-in chk-col-pink">
                            <label for="rememberme">Remember Me</label> -->
                            <a href="forgot-password.php">Forgot Password?</a>
                        </div>
                        <div class="col-xs-4">
                            <button class="btn btn-block bg-pink waves-effect" name="login" type="submit">SIGN IN</button>
                        </div>
                    </div>
                    <!-- <div class="row m-t-15 m-b--20">
                        <div class="col-xs-6">
                            <a href="sign-up.html">Register Now!</a>
                        </div>
                        <div class="col-xs-6 align-right">
                            <a href="forgot-password.html">Forgot Password?</a>
                        </div>
                    </div> -->
                </form>
            </div>
        </div>
    </div>

    <?php include('./comm/footerLinks.php') ?>

    
</body>

</html>