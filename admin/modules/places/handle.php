<?php
include('../../config/config.php');

$idbrowse = $_GET['idbrowse'];
$email = $_POST['email'];

$query_browse = mysqli_query($mysqli, "SELECT * FROM browses,place_types,browse_crt WHERE browses.id_place_type=place_types.id_place_type AND browses.id_browse='$idbrowse'");
while ($row_browse = mysqli_fetch_array($query_browse)) {
    $placeName = $row_browse['placeName'];
    $lat = $row_browse['lat'];
    $lng = $row_browse['lng'];
    $address = $row_browse['address'];
    $image = $row_browse['image'];
    $desc = $row_browse['description'];
    $type = $row_browse['id_place_type'];
    $id_user = $row_browse['id_user'];
}
$query_images = mysqli_query($mysqli, "SELECT * FROM browse_img WHERE id_browse='$idbrowse'");
$query_criteria = mysqli_query($mysqli, "SELECT * FROM browses,browse_crt WHERE browses.id_browse=browse_crt.id_browse AND browses.id_browse='$idbrowse'");

if (isset($_POST['browse'])) {
    $sql_browse = "INSERT INTO places(placeName,lat,lng,address,image,description,id_place_type,id_user) VALUES('$placeName','$lat','$lng','$address','$image','$desc','$type','$id_user')";
    mysqli_query($mysqli, $sql_browse);
    $id_place = mysqli_insert_id($mysqli);
    foreach ($query_images as $key => $value) {
        $images = $value['img'];
        mysqli_query($mysqli, "INSERT INTO images(id_place,image) VALUES('$id_place','$images')");
    }
    foreach ($query_criteria as $key => $value) {
        $criterias = $value['criteria'];
        mysqli_query($mysqli, "INSERT INTO criterias(criteria,id_place) VALUES('$criterias','$id_place')");
    }
    mysqli_query($mysqli, "UPDATE users SET id_role=1 WHERE id_user='$id_user'");
    mysqli_query($mysqli, "DELETE FROM browse_img WHERE id_browse='$idbrowse'");
    mysqli_query($mysqli, "DELETE FROM browse_crt WHERE id_browse='$idbrowse'");
    mysqli_query($mysqli, "DELETE FROM browses WHERE id_browse='$idbrowse'");
    header("Location:../../index.php?action=quanlydiadiemxanh&query=xem");
    sendEmailSuccess($email, $placeName);
} 
if (isset($_POST['delete'])) {
    $sql = "SELECT * FROM browses WHERE id_browse='$idbrowse' LIMIT 1";
    $query = mysqli_query($mysqli, $sql);
    while ($row = mysqli_fetch_array($query)) {
        unlink('../../../supplier/uploads/'.$row['image']);
    }
    $img = mysqli_query($mysqli, "SELECT * FROM browse_img WHERE id_browse='$idbrowse'");
    while ($row_img = mysqli_fetch_array($img)) {
        unlink('../../../supplier/uploads/'.$row_img['img']);
    }
    mysqli_query($mysqli, "DELETE FROM browse_img WHERE id_browse='$idbrowse'");
    mysqli_query($mysqli, "DELETE FROM browse_crt WHERE id_browse='$idbrowse'");
    mysqli_query($mysqli, "DELETE FROM browses WHERE id_browse='$idbrowse'");
    header('Location:../../index.php?action=duyetdiadiemxanh&query=xem');
    sendEmailFail($email, $placeName);
}
?>

<?php
function sendEmailSuccess($email, $placeName)
{
    require "../../../PHPMailer-master/src/PHPMailer.php";
    require "../../../PHPMailer-master/src/SMTP.php";
    require "../../../PHPMailer-master/src/Exception.php";
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
        $mail->addAddress($email);
        $mail->isHTML(true);  // Set email format to HTML
        $mail->Subject = 'Đăng ký địa điểm xanh thành công';
        $noidungthu = 'Chào bạn! Địa điểm xanh "'.$placeName.'" mà bạn đăng ký đã được xét duyệt thành công. Cảm ơn bạn!';
        $mail->Body = $noidungthu;
        $mail->smtpConnect(array(
            "ssl" => array(
                "verify_peer" => false,
                "verify_peer_name" => false,
                "allow_self_signed" => true
            )
        ));
        $mail->send();
    } catch (Exception $e) {
        echo 'Error: ', $mail->ErrorInfo;
    }
}

function sendEmailFail($email, $placeName)
{
    require "../../../PHPMailer-master/src/PHPMailer.php";
    require "../../../PHPMailer-master/src/SMTP.php";
    require "../../../PHPMailer-master/src/Exception.php";
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
        $mail->addAddress($email);
        $mail->isHTML(true);  // Set email format to HTML
        $mail->Subject = 'Đăng ký địa điểm xanh không thành công';
        $noidungthu = 'Chào bạn! Chúng tôi xin thông báo rằng địa điểm "'.$placeName.'" mà bạn đăng ký chưa đủ điều kiện để trở thành địa điểm xanh. Cảm ơn bạn!';
        $mail->Body = $noidungthu;
        $mail->smtpConnect(array(
            "ssl" => array(
                "verify_peer" => false,
                "verify_peer_name" => false,
                "allow_self_signed" => true
            )
        ));
        $mail->send();
    } catch (Exception $e) {
        echo 'Error: ', $mail->ErrorInfo;
    }
}
?>