<?php
session_start();

// Capturing Text Data
$title             = $_REQUEST['title'];
$job_type          = $_REQUEST['job_type'];
$cta_text          = $_REQUEST['cta_text'];
$cta_link          = $_REQUEST['cta_link'];
$short_description = $_REQUEST['short_description'];
$moto              = $_REQUEST['moto'];
$exp               = $_REQUEST['exp'];
$clients           = $_REQUEST['clients'];
$projects          = $_REQUEST['projects'];



// Capturing File Data
$cv    = $_FILES['cv'];
$image = $_FILES['image'];
$errors =[];
$cvExt = null;

/**
 * For Debugging: 
 * Uncomment the lines below to see the structure of your uploaded files
 */
/*
echo "<pre>";
print_r($_FILES);
echo "</pre>";
*/
#




if ($cv['size'] > 0) {
    $cvPath = (pathinfo($cv['name']));
    $cvExt = $cvPath['extension'];

    if ($cvExt != 'pdf' && $cvExt != 'jpg') {
        $errors['cv_error'] = "File not supported. Supported files are pdf or jpg.";
    }
}



// 265406540
if ($image['size'] > 0) {
    $imgPath = pathinfo($image['name']);
    $imgExt = $imgPath['extension'];
    $supportedTypes = ['jpg', 'png', 'webp'];

    if (!in_array($imgExt, $supportedTypes)) {
        $errors['image_error'] = "Image not supported. Supported types are " . join(", ", $supportedTypes);
    } else if (($image['size'] / 1000) > 2000) {
        $errors['image_error'] = "img should be around 200kb";
    }
}


if(count($errors) >0){
  $_SESSION['form_errors'] = $errors;
  header("Location: ../admin/banner.php");
} else{

if($cv['size'] >0){
    if(!file_exists('../uploads')){
      mkdir('../uploads');
    }


    $cvName= uniqid(). ".$cvExt";
    $uploadFile = move_uploaded_file($cv['tmp_name'], "../uploads/". $cvName);
  
}
}


?>