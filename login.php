<?php
session_start();
include("./admin/config/config.php");

$err = [];
if (isset($_POST['username'])) {
    $username = $_POST['username'];
    $fullName = $_POST['fullName'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $password = $_POST['password'];
    $rePassword = $_POST['rePassword'];
    $query_username = mysqli_query($mysqli, "SELECT username FROM users WHERE username='$username'");
    if (mysqli_num_rows($query_username) > 0) {
        echo "<script>alert('Username đã tồn tại')</script>";
    } elseif (empty($username)) {
        echo "<script>alert('Bạn chưa nhập Username')</script>";
    } elseif (empty($fullName)) {
        echo "<script>alert('Bạn chưa nhập tên')</script>";
    } elseif (empty($email)) {
        echo "<script>alert('Bạn chưa nhập email')</script>";
    } elseif (empty($phone)) {
        echo "<script>alert('Bạn chưa nhập số điện thoại')</script>";
    } elseif (empty($address)) {
        echo "<script>alert('Bạn chưa nhập địa chỉ')</script>";
    } elseif (empty($password)) {
        echo "<script>alert('Bạn chưa nhập mật khẩu')</script>";
    } elseif ($password != $rePassword) {
        echo "<script>alert('Mật khẩu nhập lại không chính xác')</script>";
    } else {
        $pass = md5($password);
        $sql = "INSERT INTO users(name,email,phone,address,username,password,id_role) VALUES('$fullName','$email','$phone','$address','$username','$pass',2)";
        $query = mysqli_query($mysqli, $sql);
        if ($query) {
            $alert = "<script>alert('Đăng ký tài khoản thành công')</script>";
            echo $alert;
            echo "<script> window.location.href='login.php' </script>";
        }
    }
}

if (isset($_POST['login'])) {
    $userName = $_POST['userName'];
    $passWord = md5($_POST['passWord']);
    $captcha = $_POST['captcha'];
    $captchaRandom = $_POST['captcha-rand'];
    if ($captcha != $captchaRandom) {
        $err['captcha'] = "Captcha không hợp lệ";
    } else {
        $sql = "SELECT * FROM users WHERE username='$userName'";
        $query = mysqli_query($mysqli, $sql);
        $data = mysqli_fetch_assoc($query);
        $checkUsername = mysqli_num_rows($query);
        if ($checkUsername == 1) {
            $checkPass = $data['password'];
            if ($checkPass == $passWord) {
                $_SESSION['user'] = $data;
                header("Location:index.php");
            } else {
                $err['passWord'] = "Mật khẩu không chính xác";
            }
        } else {
            $err['userName'] = "Username không tồn tại";
        }
    }
}

if (isset($_POST['send'])) {
    $sendEmail = $_POST['sendEmail'];
    $query_email = mysqli_query($mysqli, "SELECT * FROM users WHERE email='$sendEmail'");
    $checkEmail = mysqli_num_rows($query_email);
    if ($checkEmail == 1) {
        $new_password = substr(md5(rand(0, 999999)), 0, 8);
        $new_pass = md5($new_password);
        mysqli_query($mysqli, "UPDATE users SET password='$new_pass' WHERE email='$sendEmail'");
        sendPassword($sendEmail, $new_password);
    } else {
        echo "<script>alert('Email chưa đăng ký tài khoản')</script>";
    }
}
?>

<?php
function sendPassword($sendEmail, $new_password)
{
    require "PHPMailer-master/src/PHPMailer.php";
    require "PHPMailer-master/src/SMTP.php";
    require 'PHPMailer-master/src/Exception.php';
    $mail = new PHPMailer\PHPMailer\PHPMailer(true); //true:enables exceptions
    try {
        $mail->SMTPDebug = 0; //0,1,2: chế độ debug
        $mail->isSMTP();
        $mail->CharSet  = "utf-8";
        $mail->Host = 'smtp.gmail.com';  //SMTP servers
        $mail->SMTPAuth = true; // Enable authentication
        $mail->Username = 'greenplacemap@gmail.com'; // SMTP username
        $mail->Password = 'ewkoyxetkqxxtfmg';   // SMTP password
        $mail->SMTPSecure = 'ssl';  // encryption TLS/SSL 
        $mail->Port = 465;  // port to connect to                
        $mail->setFrom('greenplacemap@gmail.com', 'Green Place Map');
        $mail->addAddress($sendEmail);
        $mail->isHTML(true);  // Set email format to HTML
        $mail->Subject = 'Cập nhật lại mật khẩu';
        $noidungthu = 'Mật khẩu mới của bạn là: "' . $new_password . '"';
        $mail->Body = $noidungthu;
        $mail->smtpConnect(array(
            "ssl" => array(
                "verify_peer" => false,
                "verify_peer_name" => false,
                "allow_self_signed" => true
            )
        ));
        $mail->send();
        echo "<script>alert('Đã cập nhật mật khẩu mới. Kiểm tra email của bạn để xem mật khẩu')</script>";
    } catch (Exception $e) {
        echo 'Error: ', $mail->ErrorInfo;
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng ký & Đăng nhập</title>
    <!-- link icon  -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <!-- link css  -->
    <link rel="stylesheet" href="./css/style-login.css">
    <!-- link font -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <!-- link bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
</head>

<body>

    <div class="form">

        <!-- register start / đăng ký -->
        <div class="form-container register-container">
            <form method="POST" action="" class="form-action">
                <h1>Create Account</h1>
                <span>Register a new account </span>
                <input type="text" name="username" placeholder="Tên đăng nhập">
                <input type="text" name="fullName" placeholder="Họ và Tên">
                <input type="email" name="email" placeholder="Email">
                <input type="text" name="phone" placeholder="Số điện thoại">
                <input type="text" name="address" placeholder="Địa chỉ">
                <input type="password" name="password" placeholder="Mật khẩu">
                <input type="password" name="rePassword" placeholder="Nhập lại mật khẩu">
                <button class="register" name="register">Đăng Ký</button>
            </form>
        </div>
        <!-- register ends -->

        <!-- sign in start  -->
        <div class="form-container sign-in-container">
            <form method="POST" action="" class="form-action">
                <h1 style="text-align: center;">Welcome to <br> Green Place Map</h1>
                <div class="icon-img" style="text-align: center;">
                    <i class='icon-map bx bx-map'></i>
                    <img src="./css/img/m2.png" alt="" width="12%">
                </div>
                <input type="text" name="userName" placeholder="Username">
                <span class="form-message"><?php echo (isset($err['userName'])) ? $err['userName'] : '' ?></span>
                <input type="password" name="passWord" placeholder="Password">
                <span class="form-message"><?php echo (isset($err['passWord'])) ? $err['passWord'] : '' ?></span>
                <div class="captcha-area">
                    <div class="captcha-img">
                        <span class="captcha"></span>
                        <input type="hidden" id="captcha-rand" name="captcha-rand" value="">
                    </div>
                    <button class="reload-btn"><i class="fa-solid fa-rotate-right"></i></button>
                </div>
                <div class="input-area">
                    <input type="text" placeholder="Enter captcha" maxlength="6" spellcheck="false" required name="captcha">
                    <span class="form-message"><?php echo (isset($err['captcha'])) ? $err['captcha'] : '' ?></span>
                    <!-- <button class="check-btn">Check</button> -->
                </div>
                <div class="status-text"></div>
                <a href="#" data-toggle="modal" data-target="#passwordModal" style="color: #333;"><b><i>Quên mật khẩu?</i></b></a>
                <button class="login" name="login">Đăng Nhập</button>
            </form>
        </div>
        <!-- sign in ends  -->

        <!-- overlay start / lớp phủ -->
        <div class="overlay-container">
            <div class="overlay">
                <div class="overlay-panel left">
                    <h1>Do you have a Green Place Map account?</h1>
                    <p>Click Sign In to go back to login</p>
                    <button class="signIn">Sign In</button>
                </div>
                <div class="overlay-panel right">
                    <h1>Do not have an account?</h1>
                    <p>Click Sign Up to create a new account </p>
                    <button class="signUp">Sign Up</button>
                </div>
            </div>
        </div>
        <!-- overlay ends -->
    </div>

    <div class="modal fade" id="passwordModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Quên mật khẩu?</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="POST" action="">
                    <div class="modal-body">
                        <input type="email" name="sendEmail" placeholder="Nhập email của bạn...">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Huỷ</button>
                        <button type="submit" class="btn btn-primary" name="send">Gửi yêu cầu</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="./js/script-login.js"></script>
    <script src="./js/captcha.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
</body>

</html>