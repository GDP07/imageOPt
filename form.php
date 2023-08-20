<?php

require_once("vendor/autoload.php");

\Tinify\setKey("kGC1rd1m2LmvQS7cL0D5qCgHCj8J9mGY");

if (isset($_POST['submit'])) {
    session_start(); // Start the session
    $source = \Tinify\fromFile($_FILES['image']['tmp_name']);

    $targetDirectory = "uploads/";
    $originalFileName = $_FILES['image']['name'];
    $extension = pathinfo($originalFileName, PATHINFO_EXTENSION);
    $targetFileName = generateUniqueID() . '.' . $extension;
    $targetFilePath = $targetDirectory . $targetFileName;

    // Save the optimized image to the uploads folder
    $source->toFile($targetFilePath);

    echo $source;

    echo $targetFileName;
}

function generateUniqueID()
{
    $timestamp = microtime(true);
    $random = mt_rand();
    $userSpecificValue = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : '';
    $uniqueID = md5($timestamp . $random . $userSpecificValue);
    return $uniqueID;
}

?>

<form method="POST" enctype="multipart/form-data">

    <input type="file" name="image">
    <input type="submit" name="submit">

</form>