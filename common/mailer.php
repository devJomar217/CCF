<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';


function generateForgotPasswordLink($email, $key){
    $body = '<div style="margin:0;padding:0" bgcolor="#FFFFFF">
                <table width="100%" height="100%" style="min-width:348px" border="0" cellspacing="0" cellpadding="0" lang="en">
                    <tbody>
                        <tr height="32" style="height:32px">
                            <td></td>
                        </tr>
                        <tr align="center">
                            <td>
                                <table border="0" cellspacing="0" cellpadding="0" style="padding-bottom:20px;max-width:516px;min-width:220px">
                                    <tbody>
                                        <tr>
                                            <td width="8" style="width:8px"></td>
                                            <td>
                                                <div style="border-style:solid;border-width:thin;border-color:#dadce0;border-radius:8px;padding:40px 20px" align="center" class="m_-7949188087747382486mdv2rw">
                                                    <img src="https://codeconnect.000webhostapp.com/resource/logo-codeconnect.png" height="50" aria-hidden="true" style="margin-bottom:16px" alt="Code Connect" class="CToWUd" data-bit="iit">
                                                    <div style="font-family:\'Google Sans\',Roboto,RobotoDraft,Helvetica,Arial,sans-serif;border-bottom:thin solid #dadce0;color:rgba(0,0,0,0.87);line-height:32px;padding-bottom:24px;text-align:center;word-break:break-word">
                                                    <div style="font-size:24px">Forgot Password</div>
                                                        <table align="center" style="margin-top:8px">
                                                            <tbody>
                                                                <tr style="line-height:normal">
                                                                </tr>
                                                            </tbody>
                                                        </table> 
                                                    </div>
                                                    <div style="font-family:Roboto-Regular,Helvetica,Arial,sans-serif;font-size:14px;color:rgba(0,0,0,0.87);line-height:20px;padding-top:20px;text-align:left">If you didn\'t generate this forgot password, someone might be using your account. Check and secure your account now.
                                                        <div style="padding-top:32px;text-align:center">
                                                            <a href="http://localhost/ccf/component/login/form-forgot-change-password.php?key='.$key.'" style="font-family:\'Google Sans\',Roboto,RobotoDraft,Helvetica,Arial,sans-serif;line-height:16px;color:#ffffff;font-weight:400;text-decoration:none;font-size:14px;display:inline-block;padding:10px 24px;background-color:#4184f3;border-radius:5px;min-width:90px" target="_blank" data-saferedirecturl="https://www.google.com/url?q=https://accounts.google.com/AccountChooser?Email%3Dforcemindshift@gmail.com%26continue%3Dhttps://myaccount.google.com/alert/nt/1689360587509?rfn%253D20%2526rfnc%253D1%2526eid%253D981215007565641449%2526et%253D0&amp;source=gmail&amp;ust=1689447870813000&amp;usg=AOvVaw1xnwhGPu8XwulukYZmQdv7">
                                                                Change Password
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div style="text-align:left">
                                                    <div style="font-family:Roboto-Regular,Helvetica,Arial,sans-serif;color:rgba(0,0,0,0.54);font-size:11px;line-height:18px;padding-top:12px;text-align:center">
                                                        <div style="direction:ltr">© Code Connect, 
                                                            <a class="m_-7949188087747382486afal" style="font-family:Roboto-Regular,Helvetica,Arial,sans-serif;color:rgba(0,0,0,0.54);font-size:11px;line-height:18px;padding-top:12px;text-align:center">Bulacan State University - Bustos Campus</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td width="8" style="width:8px"></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </td>
                        </tr>
                        <tr height="32" style="height:32px">
                            <td></td>
                        </tr>
                    </tbody>
                </table>
            </div>';
            return $body;
}

if(isset($_POST["action"]) and $_POST["action"] == 'send'){
    $email = $_POST["email"];
    $key = $_POST["key"];
    //$email = 'dev.jomar217@gmail.com';//$_POST["email"];
    
    $mail = new PHPMailer(true);

    try {
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'forcemindshift@gmail.com';
        $mail->Password = 'vlgoezbhpydjcoit';
        $mail->SMTPSecure = 'ssl';
        $mail->Port = 465;
        
        $mail->setFrom('forcemindshift@gmail.com');
        $mail->addAddress($email);
        $mail->isHTML(true);
        $mail->Subject = 'Forgot Password';
        $mail->Body = generateForgotPasswordLink($email, $key);
        $mail->send();

        echo json_encode(array("statusCode"=>200));
    } catch (phpmailerException $e) {
        echo json_encode(array("statusCode"=>500, "error"=>$e->errorMessage()));
    } catch (Exception $e) {
        echo json_encode(array("statusCode"=>500, "error"=>$e->errorMessage()));
    }
    // echo generateForgotPasswordLink('dio.jomar217@gmail.com', 'key');
    // $email = "test";
    // echo '-'. $email . '-';
}


?>