<?php

namespace Symfony\Component\Mailer;
require_once __DIR__ . '/../vendor/autoload.php';

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

use Symfony\Component\Mailer\Mailer;
use Symfony\Component\Mailer\Transport;
use Symfony\Component\Mime\Address;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;




// 郵件伺服器的設定
$smtpHost = 'smtp.gmail.com'; // 郵件伺服器的主機名稱
$smtpPort = 465; // 郵件伺服器的連接埠
$smtpUsername = 'hsinnichen12@gmail.com'; // 郵件伺服器的使用者名稱
$smtpPassword = 'tyyplskqdsgpibtl'; // 郵件伺服器的密碼 

// 初始化 Mailer

$transport = Transport::fromDsn("smtps://$smtpUsername:$smtpPassword@$smtpHost");
$mailer = new Mailer($transport);

// 取得寄件者和收件者的信箱、帳號和密碼
session_start();
$senderEmail = 'hsinnichen12@gmail.com';
$senderName = '失智症決策輔助系統管理人員';
$recipientEmail = $_SESSION['user_email'];
$account = $_SESSION['user_account'];
$password = $_SESSION['user_randompassword'];

$htmlContent = '
<h3>歡迎您加入失智症醫療決策輔助系統！</h3>
<p>您的帳號資訊如下：</p>
=============================
<p>帳號：' . $account . '</p>
<p>密碼：' . $password . '</p>
=============================

<p>!!! 請登入系統並更新您的相關基本資訊及密碼 !!!</p>';

$email = (new Email())
    ->from(new Address($senderEmail, $senderName))
    ->to(new Address($recipientEmail))
    ->subject('失智症決策輔助系統管理_帳號資訊')
    ->html($htmlContent);;

try {
    $mailer->send($email);
    echo "<script>window.location.href = 'manage.php';</script>";
} catch (TransportExceptionInterface $e) {
    echo "<script>alert('郵件寄送失敗！請手動寄信');</script>";
}

?>