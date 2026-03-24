<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';
$mail = new PHPMailer(true);


$mail->CharSet = 'UTF-8';
$mail->SMTPDebug = 0;
//$mail->SMTPDebug = SMTP::DEBUG_SERVER;
$mail->isSMTP(); 

$mail->Host = 'smtp.beget.com';                     
$mail->SMTPAuth = true;                                   
$mail->Username   = '';  
$mail->Password   = '';
//$mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;           
$mail->SMTPSecure = 'ssl';  
$mail->Port = 465;  
    

$mail->setLanguage('ru', 'phpmailer/language/directory/');
$mail->IsHTML(true);

$mail->setFrom('fromwhere@gmail.com', 'Заявка с формы');
$mail->addAddress('vladimir.milkov@gmail.com');
$mail->Subject = 'Заявка с сайта';

$head = '  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta name="color-scheme" content="light dark" />
  <meta name="supported-color-schemes" content="light dark" />
  <title>ALT</title>
  <style type="text/css">
    @import url("https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap");

    table {
      border-spacing: 0;
      mso-cellspacing: 0;
      mso-padding-alt: 0;
    }

    td {
      padding: 0;
    }

    #outlook a {
      padding: 0;
    }

    a {
      text-decoration: none;
      color: #e8fbfa;
      font-size: 16px;
    }

    @media screen and (max-width: 599.98px) {}

    @media screen and (max-width: 399.98px) {
      .mobile-padding {
        padding-right: 10px !important;
        padding-left: 10px !important;
      }

      .mobile-col-padding {
        padding-right: 0 !important;
        padding-left: 0 !important;
      }

      .two-columns .column {
        width: 100% !important;
        max-width: 100% !important;
      }

      .two-columns .column img {
        width: 100% !important;
        max-width: 100% !important;
      }

      .three-columns .column {
        width: 100% !important;
        max-width: 100% !important;
      }

      .three-columns .column img {
        width: 100% !important;
        max-width: 100% !important;
      }
    }

    /* Custom Dark Mode Colors */
    :root {
      color-scheme: light dark;
      supported-color-schemes: light dark;
    }

    @media (prefers-color-scheme: dark) {

      table,
      td {
        background-color: #06080B !important;
      }

      h1,
      h2,
      h3,
      p {
        color: #ffffff !important;
      }
    }
  </style>';

$body = '<center style="width: 100%;table-layout:fixed;background-color: #dde0e1;padding-top: 40px;padding-bottom: 40px;">
    <div style="max-width: 600px;background-color: #fafdfe;box-shadow: 0 0 10px rgba(0, 0, 0, .2);">

      <!-- Preheader (remove comment) -->
      <div
        style="font-size: 0px;color: #fafdfe;line-height: 1px;mso-line-height-rule:exactly;display: none;max-width: 0px;max-height: 0px;opacity: 0;overflow: hidden;mso-hide:all;">
        
      </div>
      <!-- End Preheader (remove comment) -->

      <!--[if (gte mso 9)|(IE)]>
        <table width="600" align="center" border="0" cellspacing="0" cellpadding="0" role="presentation"
          style="color:#1C1E23;">
        <tr>
        <td>
      <![endif]-->

      <table align="center" border="0" cellspacing="0" cellpadding="0" role="presentation"
        style="color:#1C1E23;font-family: "Poppins",sans-serif, Arial, Helvetica;background-color: #fafdfe;Margin:0;padding:0;width: 100%;max-width: 600px;">
        <!-- Logo -->
        <!-- End Logo -->

        <!-- Hero -->
        <tr>
          <td style="padding: 0px 24px 25px 24px;">
            <table border="0" cellspacing="0" cellpadding="0" role="presentation"
              style="width: 100%; max-width: 600px;">
              <tr>
                <td>
                  <div style="height: 1px; width: 100%;background-color:#f3f3f3;"></div>
                </td>
              </tr>
              <tr>
                <td style="padding: 19px 0 10px 0;">
                  <!-- <p style="margin: 0;font-weight: 400;font-size: 16px;line-height: 25px;color: #525F7F;">
                    Please update your plugin
                  </p> -->
                </td>
              </tr>
              <tr>
                <td style="padding: 0 0 35px 0;">
                  <h1 style="margin: 0;font-weight: 400;font-size: 30px;line-height: 1;color: #1C1E23;">Заявка с сайта</h1>
                </td>
              </tr>
              
              <tr>
                <td style="padding: 0 0 8px 0;">
                  <p style="margin: 0;font-weight: 400;font-size: 20px;line-height: 25px;color: #1C1E23;text-align:left;">Имя: <span
                      style="font-weight: 400; color: #489DFF;">'.$_POST['name'].'</span></p>
                </td>
              </tr>
              <tr>
                <td style="padding: 0 0 8px 0;">
                  <p style="margin: 0;font-weight: 400;font-size: 20px;line-height: 25px;color: #1C1E23;text-align:left;">Телефон: <span
                      style="font-weight: 400; color: #489DFF;">'.$_POST['phone'].'</span></p>
                </td>
              </tr>
              <tr>
                <td style="padding: 0 0 8px 0;">
                  <p style="margin: 0;font-weight: 400;font-size: 20px;line-height: 25px;color: #1C1E23;text-align:left;">Комментарий: <span
                      style="font-weight: 400; color: #489DFF;">'.$_POST['comment'].'</span></p>
                </td>
              </tr>
              

            </table>
          </td>
        </tr>
        <!-- End Hero -->

        <!-- Popular -->
        <!-- End Popular -->

        <!-- Footer -->

        <!-- End Footer -->
      </table>

      <!--[if (gte mso 9)|(IE)]>
        </td>
        </tr>
        </table>
      <![endif]-->

    </div>
  </center>';

$mail->Head = $head;
$mail->Body = $body;

//$mail->msgHTML('');
if(!$mail->send()){
    $message = 'Ошибка';
} else{
    $message = 'Данные отправлены';
}

$responce = ['message' => $mail->ErrorInfo];

header('Content-type: application/json');
echo    json_encode($responce);
?>