<?php

session_start();

include_once "../database/env.php";


// ================= TEXT DATA =================

$title             = $_REQUEST['title'];
$job_type          = $_REQUEST['job_type'];
$cta_text          = $_REQUEST['cta_text'];
$cta_link          = $_REQUEST['cta_link'];
$short_description = $_REQUEST['short_description'];
$moto              = $_REQUEST['moto'];
$exp               = $_REQUEST['exp'];
$clients           = $_REQUEST['clients'];
$projects          = $_REQUEST['projects'];


// ================= CHECK OLD BANNER =================

$query = "SELECT * FROM banners";

$res = mysqli_query($db, $query);

if(mysqli_num_rows($res) > 0){

    $oldBanner = mysqli_fetch_assoc($res);

    // ================= DELETE OLD CV =================

    $cvDelete = '../' . $oldBanner['cv'];

    if($oldBanner['cv'] && file_exists($cvDelete)){

        unlink($cvDelete);

    }


    // ================= DELETE OLD IMAGE =================

    $imgDelete = '../' . $oldBanner['image'];

    if($oldBanner['image'] && file_exists($imgDelete)){

        unlink($imgDelete);

    }


    // ================= DELETE OLD DATABASE DATA =================

    $query = "DELETE FROM banners";

    mysqli_query($db, $query);

}


// ================= FILE DATA =================

$cv    = $_FILES['cv'];
$image = $_FILES['image'];

$errors = [];

$cvExt  = null;
$imgExt = null;


// ================= CV VALIDATION =================

if($cv['size'] > 0){

    $cvInfo = pathinfo($cv['name']);

    $cvExt = strtolower($cvInfo['extension']);

    if($cvExt != 'pdf' && $cvExt != 'jpg'){

        $errors['cv_error'] = "File not supported. Only PDF or JPG allowed.";

    }

}


// ================= IMAGE VALIDATION =================

if($image['size'] > 0){

    $imgInfo = pathinfo($image['name']);

    $imgExt = strtolower($imgInfo['extension']);

    $supportedTypes = ['jpg', 'png', 'webp'];

    if(!in_array($imgExt, $supportedTypes)){

        $errors['image_error'] = "Image not supported.";

    }
    else if(($image['size'] / 1000) > 2000){

        $errors['image_error'] = "Image should be under 2000KB.";

    }

}


// ================= ERROR CHECK =================

if(count($errors) > 0){

    $_SESSION['form_errors'] = $errors;

    header("Location: ../admin/banner.php");

    exit();

}
else{

    // ================= CREATE UPLOAD FOLDER =================

    if(!file_exists('../uploads')){

        mkdir('../uploads');

    }


    $cvPath  = null;
    $imgPath = null;


    // ================= CV UPLOAD =================

    if($cv['size'] > 0){

        $cvName = uniqid() . "." . $cvExt;

        $cvPath = "uploads/" . $cvName;

        move_uploaded_file(
            $cv['tmp_name'],
            "../uploads/" . $cvName
        );

    }


    // ================= IMAGE UPLOAD =================

    if($image['size'] > 0){

        $imgName = uniqid() . "." . $imgExt;

        $imgPath = "uploads/" . $imgName;

        move_uploaded_file(
            $image['tmp_name'],
            "../uploads/" . $imgName
        );

    }


    // ================= INSERT QUERY =================

    $query = "INSERT INTO `banners`
    (
        `job_type`,
        `moto`,
        `title`,
        `short_description`,
        `cta`,
        `cta_links`,
        `cv`,
        `experience`,
        `projects`,
        `clients`,
        `image`
    )

    VALUES
    (
        '$job_type',
        '$moto',
        '$title',
        '$short_description',
        '$cta_text',
        '$cta_link',
        '$cvPath',
        '$exp',
        '$projects',
        '$clients',
        '$imgPath'
    )";


    $res = mysqli_query($db, $query);


    // ================= REDIRECT =================

    header("Location: ../admin/banner.php");

    exit();

}

?>