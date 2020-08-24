<?php 
use PHPMailer\PHPMailer\PHPMailer;

if(isset($_POST['nameSuccess']) && isset($_POST['emailSuccess'])){
    $nameSuccess = $_POST['nameSuccess'];
    $emailSuccess = $_POST['emailSuccess'];
    $msg_subject = $_POST['msg_subject'];
    $message = $_POST['message'];

    require_once "PHPMailer/PHPMailer.php";
    require_once "PHPMailer/SMTP.php";
    require_once "PHPMailer/Exception.php";

    $mail = new PHPMailer();

    //smtp settings
    $mail->isSMTP();
    $mail->Host = "smtp.gmail.com";
    $mail->SMTPAuth = true;
    $mail->Username = "chuyendaik99@gmail.com";
    $mail->Password = 'chuyenvn';
    $mail->Port = 465;
    $mail->SMTPSecure = "ssl";

    //email settings
    $mail->isHTML(true);
    $mail->setFrom($emailSuccess, $nameSuccess);
    $mail->addAddress("chuyendaik99@gmail.com");
    $mail->Subject = ("Contact");
    $mail->Body = 'DỮ LIỆU NHẬN ĐƯỢC <br>  Name: ' .$nameSuccess . '<br> Email: ' .$emailSuccess . '<br> Nội dung: ' .$msg_subject . '<br> Nội dung: ' .$message;
   


    if($mail->send()){
        $status = "success";
        $response = "Email is sent!";
    }
    else
    {
        $status = "failed";
        $response = "Something is wrong: <br>" . $mail->ErrorInfo;
    }

    exit(json_encode(array("status" => $status, "response" => $response)));
}

?>