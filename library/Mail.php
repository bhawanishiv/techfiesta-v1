<?php

//Library phpMailer
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

require 'library/PHPMailer/vendor/autoload.php';

class PHPMailer_mine extends PHPMailer {

    public function get_mail_string() {
        return $this->MIMEHeader . $this->MIMEBody;
    }

}

Class Mail {

    function __construct() {
        
    }

    public static function listMailBox($data) {
        $imap = '{imap.asia.secureserver.net:143}';
        $mbox = imap_open($imap, $data['from']['username'], $data['from']['password'], OP_HALFOPEN)
                or die("can't connect: " . imap_last_error());

        $list = imap_list($mbox, $imap, "*");
        echo json_encode($list);
    }

    public static function send($data) {
        $mail = new PHPMailer_mine();
        $res['status'] = false;
        try {
            //Server settings
            $mail->SMTPDebug = false;                                 // Enable verbose debug output
            $mail->isSMTP();                                      // Set mailer to use SMTP
            $mail->Host = 'smtpout.asia.secureserver.net;smtpout.secureserver.net';  // Specify main and backup SMTP servers
            $mail->SMTPAuth = true;                               // Enable SMTP authentication
            $mail->Username = $data['from']['username'];                 // SMTP username
            $mail->Password = $data['from']['password'];                       // SMTP password
            $mail->SMTPSecure = 'STARTTLSs';                            // Enable TLS encryption, `ssl` also accepted
            $mail->Port = 80;                                    // TCP port to connect to
            // $mail->Port = 587;                                    // TCP port to connect to

            $mail->setFrom($data['from']['username'], $data['from']['name']);
            $mail->addAddress($data['to']['email'], $data['to']['name']);     // Add a recipient
            // $mail->addAddress('ellen@example.com');               // Name is optional
            // $mail->addReplyTo('info@example.com', 'Information');
            // $mail->addCC('cc@example.com');
            // $mail->addBCC('bcc@example.com');
            // //Attachments
            if (isset($data['attachments'])) {
                foreach ($data['attachments'] as $attachment) {
                    $mail->addAttachment($attachment);
                }// Add attachments
            }
            // $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
            // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
            //Content
            $mail->isHTML(true);                                  // Set email format to HTML
            $mail->Subject = $data['subject'];
            $mail->Body = $data['body'];
            $mail->AltBody = $data['altBody'];

            if ($mail->send()) {
                $imap = 'imap.asia.secureserver.net:143';
                $conn_str = "{" . $imap . "}";

                $stream = imap_open($conn_str, $data['from']['username'], $data['from']['password']);
                $mail_string = $mail->get_mail_string();

                if (imap_append($stream, '{imap.asia.secureserver.net:143}Sent Items', $mail_string)) {
                    $res['status'] = !$res['status'];
                    $res['data'] = $data['to'];
                }
                imap_close($stream);
            }
        } catch (Exception $e) {
            $response['text'] = $mail->ErrorInfo;
        } finally {
            return $res;
        }
    }

}
