<?php

/*登录发送错误*/
function get_ajax_res($status,$message)
{
  $data['status']  = $status;
  $data['message'] = $message;
  return $data;
}

/*发送邮箱*/
function sendMail($to, $subject, $content)
{
  Vendor('PHPMailer.PHPMailerAutoload');

  $mailer = new PHPMailer();

  $mailer->isSMTP();
  $mailer->Host = C('MAIL_HOST');
  $mailer->SMTPAuth = C('MAIL_AUTH');
  $mailer->Username = C('MAIL_USERNAME');
  $mailer->Password = C('MAIL_PASSWORD');
  $mailer->CharSet  = C('MAIL_CHARSET');
  $mailer->Port = C('MAIL_PORT');

  $mailer->From = C('MAIL_USERNAME');
  $mailer->FromName = C('MAIL_FROMNAME');
  $mailer->addAddress($to);
  $mailer->isHTML(C('MAIL_HTML'));
  $mailer->Subject = $subject;
  $mailer->Body = $content;

  if($mailer->send()) {
      return true; 
  }else{
      return false;
  }
}






?>