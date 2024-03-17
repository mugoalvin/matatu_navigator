<?php
// error_reporting(E_ALL);
// ini_set("display_errors", 1);

session_start();
include('../../model/manager/class.php');

$updatedDataObj = (object)$_POST;
$updatedDataObj->id = $_SESSION['matatuDetails']->id;
$imageData = (object)$_FILES['matatuImage'];

if (isset($imageData) && $imageData->error === 0) {
    $updatedDataObj->image = explode(' ', $_SESSION['matatuDetails']->name)[0].$_SESSION['matatuDetails']->city;
    $imageData->name = $updatedDataObj->image.'.'.explode('/', $imageData->type)[1];

    $tempName = $imageData->tmp_name;
    $imageName = $updatedDataObj->image. '.' .explode('/', $imageData->type)[1];
    $fileType = $imageData->type;

    $allowedTypes = array('image/jpeg', 'image/png', 'image/gif');
    if (!in_array($fileType, $allowedTypes)) {
        die('Invalid file type. Only JPEG, PNG, and GIF allowed.');
    }

    $targetDir = '../../images/';
    $targetFile = $targetDir . $imageName;
    $updatedDataObj->image = $imageName;
    $updateMatatuImage = true;

    if (!move_uploaded_file($tempName, $targetFile)) {
        die('Failed to upload image.');
    }
}
else {
    echo "ELSE<br><br>";
    $updateMatatuImage = false;
}

$classObj = new managerClass;
if ($classObj->updateProfile($updatedDataObj, 'matatuCompanies', $updateMatatuImage)) {
    $_SESSION['isMatatuProfileUpdated'] = true;
    header('Location: ../../php/manager/update_details.php');
}
?>