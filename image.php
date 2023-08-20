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

    echo $targetFileName;
}


function imageOptimization($src)
{

    $source = \Tinify\fromFile($src);
}
