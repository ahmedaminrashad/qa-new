<?php
include("main-var.php");
$subject = 'Your Account is now on Leave';
$first_line = 'Following action has been taken to your account at www.'.$site_nameC.'';
$first_para = 'This is a confirmation email that we have put your account on <strong>leave till '.$leavedate.'</strong>. Your account will remain active with us and we will contact you as our system otify us about leave ovnr date. If you have any question in this regard, feel free to ask anything.';
$second_para = 'Hope you are satified with our services.';
$bottom_line = 'This is a software generated request. If you have any dispute over this email. Please contact as soon as possible.';
$bottom = '<strong>Admin '.$site_nameC.'</strong>
<br>'.$site_nameS.'
<br>E-mail: '.$email1.'<br>
<br>Phone:<br>
'.$phone1.'<br>
'.$phone2.'<br>';
?>