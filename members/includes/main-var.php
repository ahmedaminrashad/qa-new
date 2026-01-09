<?php
require ("../includes/dbconnection.php");
$sql = "SELECT * FROM settings";
$result = mysqli_query($conn, $sql);
$numberOfRows = mysqli_num_rows($result);
		if ($numberOfRows == 0){
			echo '';
			}
		elseif ($numberOfRows > 0) 
			{
			while ($row = mysqli_fetch_assoc($result)){			
					$sched = $row['id'];
					$name1= $row['name'];
					$title1= $row['title'];
					$site_nameC1= $row['site_nameC'];
					$site_nameS1= $row['site_nameS'];
					$site1= $row['site'];
					$paypal_email1= $row['paypal_email'];
					$CO_number1= $row['CO_number'];
					$email11= $row['email1'];
					$email21= $row['email2'];
					$email31= $row['email3'];
					$social11= $row['social1'];
					$social21= $row['social2'];
					$social31= $row['social3'];
					$about1= $row['about'];
					$phone11= $row['phone1'];
					$phone21= $row['phone2'];
					$phone31= $row['phone3'];
					$blog_url1= $row['blog_url'];
					$contact_url1= $row['contact_url'];
					$skype_zoom1= $row['skype_zoom'];
					$TimeZoneCustome1= $row['TimeZoneCustome'];
					$CO_Sec1= $row['2CO_Sec'];
			}
			}
$name = $name1;
$title = $title1;
$site_nameC = $site_nameC1;
$site_nameS = $site_nameS1;
$site = $site1;
$paypal_email = $paypal_email1;
$CO_number = $CO_number1;
$CO_Sec = $CO_Sec1;
$email1 = $email11;
$email2 = $email21;
$email3 = $email31;
$social1 = '<a href="'.$social11.'" data-original-title="facebook" class="facebook"></a>';
$social2 = '<a href="'.$social21.'" data-original-title="twitter" class="twitter"></a>';
$social3 = '<a href="'.$social31.'" data-original-title="youtube" class="youtube"></a>';
$about = $about1;
$phone1 = ''.$phone11.'<br>';
$phone2 = ''.$phone21.'<br>';
$phone3 = $phone31;
$bottom_line = ''.date("Y").' &copy; Developed by '.$site_nameC.'. <a href="'.$site.'" title="software development" target="_blank">Visit Us</a>';
$blog_url = $blog_url1;
$contact_url = $contact_url1;
$index_bottom_line = '&copy; '.date("Y").' <a href="#" title="software development" target="_blank">Software developed</a> by <a href="'.$site.'" title="software development" target="_blank">'.$site_nameC.'';
$skype_zoom = $skype_zoom1;
$TimeZoneCustome = $TimeZoneCustome1;
?>