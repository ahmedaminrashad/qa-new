<?php
require ("../includes/dbconnection.php");
error_reporting(0);
  		$anoorani_qaida=$_POST['checkbox1'];
    $anoorani_qaida_number=$_POST['noorani-qaida-number'];
    $anoorani_qaida_des=$_POST['noorani-qaida-des'];
    $anoorani_qaida_next=$_POST['noorani-qaida-next'];
    
    $aquran_reading=$_POST['checkbox2'];
    $aquran_reading_number=$_POST['quran-reading-number'];
    $aquran_reading_des=$_POST['quran-reading-des'];
    $aquran_reading_next=$_POST['quran-reading-next'];
    
    $atajweed_rules=$_POST['checkbox3'];
    $atajweed_rules_number=$_POST['tajweed-rules-number'];
    $atajweed_rules_des=$_POST['tajweed-rules-des'];
    $atajweed_rules_next=$_POST['tajweed-rules-next'];
    
    $amemorization=$_POST['checkbox4'];
    $amemorization_number=$_POST['memorization-number'];
    $amemorization_des=$_POST['memorization-des'];
    $amemorization_next=$_POST['memorization-next'];
    
    $arevision=$_POST['checkbox5'];
    $arevision_number=$_POST['revision-number'];
    $arevision_des=$_POST['revision-des'];
    $arevision_next=$_POST['revision-next'];
    
    $aijaazah=$_POST['checkbox6'];
    $aijaazah_number=$_POST['ijaazah-number'];
    $aijaazah_des=$_POST['ijaazah-des'];
    $aijaazah_next=$_POST['ijaazah-next'];
    
    $astudies=$_POST['checkbox7'];
    $astudies_number=$_POST['studies-number'];
    $astudies_des=$_POST['studies-des'];
    $astudies_next=$_POST['studies-next'];
    
    $asupplication=$_POST['checkbox8'];
    $asupplication_number=$_POST['supplication-number'];
    $asupplication_des=$_POST['supplication-des'];
    $asupplication_next=$_POST['supplication-next'];

    $aarabic=$_POST['checkbox9'];
    $aarabic_number=$_POST['arabic-number'];
    $aarabic_des=$_POST['arabic-des'];
    $aarabic_next=$_POST['arabic-next'];
    $areport=$_POST['report'];
    $adate=$_POST['date'];

    $sql= "UPDATE reports SET noorani_qaida_number = '$anoorani_qaida_number', noorani_qaida_des = '" . mysqli_real_escape_string($conn, $anoorani_qaida_des) . "', noorani_qaida_next = '" . mysqli_real_escape_string($conn, $anoorani_qaida_next) . "', quran_reading_number = '$aquran_reading_number', quran_reading_des = '" . mysqli_real_escape_string($conn, $aquran_reading_des) . "', quran_reading_next = '" . mysqli_real_escape_string($conn, $aquran_reading_next) . "', tajweed_rules_number = '$atajweed_rules_number', tajweed_rules_des = '" . mysqli_real_escape_string($conn, $atajweed_rules_des) . "', tajweed_rules_next = '" . mysqli_real_escape_string($conn, $atajweed_rules_next) . "',
    memorization_number = '$amemorization_number', memorization_des = '" . mysqli_real_escape_string($conn, $amemorization_des) . "', memorization_next = '" . mysqli_real_escape_string($conn, $amemorization_next) . "', revision_number = '$arevision_number', revision_des = '" . mysqli_real_escape_string($conn, $arevision_des) . "', revision_next = '" . mysqli_real_escape_string($conn, $arevision_next) . "',
    ijaazah_number = '$aijaazah_number', ijaazah_des = '" . mysqli_real_escape_string($conn, $aijaazah_des) . "', ijaazah_next = '" . mysqli_real_escape_string($conn, $aijaazah_next) . "', studies_number = '$astudies_number', studies_des = '" . mysqli_real_escape_string($conn, $astudies_des) . "', studies_next = '" . mysqli_real_escape_string($conn, $astudies_next) . "',
    supplication_number = '$asupplication_number', supplication_des = '" . mysqli_real_escape_string($conn, $asupplication_des) . "', supplication_next = '" . mysqli_real_escape_string($conn, $asupplication_next) . "', arabic_number = '$aarabic_number', arabic_des = '" . mysqli_real_escape_string($conn, $aarabic_des) . "', arabic_next = '" . mysqli_real_escape_string($conn, $aarabic_next) . "', date = '$adate' WHERE report_id = '$areport'";
	if ($conn->query($sql) === TRUE) {
	echo "<script>window.open('report-details?ID=".$areport."','_self')</script>";
	}
  	    
?>