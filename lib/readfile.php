<?php 
$target_dir = "/home/pserra/public_html/nucleos_wake/uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
error_log($target_file);

$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
// if(isset($_POST["submit"])) {
//     $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
//     if($check !== false) {
//         echo "File is an image - " . $check["mime"] . ".";
//     } else {
//         echo "File is not an image.";
//     }
//     $uploadOk = 1;
// }

// // Check if file already exists
// if (file_exists($target_file)) {
//     echo "Sorry, file already exists.";
//     $uploadOk = 0;
// }
// // // Check file size
// // if ($_FILES["fileToUpload"]["size"] > 500000) {
// //     echo "Sorry, your file is too large.";
// //     $uploadOk = 0;
// // }
// // Allow certain file formats
// if($imageFileType != "csv") {
//         echo "Sorry, only CSV files are allowed.";
//         $uploadOk = 0;
//     }
//     // Check if $uploadOk is set to 0 by an error
//     if ($uploadOk == 0) {
//         echo "Sorry, your file was not uploaded.";
//         // if everything is ok, try to upload file
//     } else {
//         if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
//             echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
//         } else {
//             echo "Sorry, there was an error uploading your file.";
//         }
//     }


// $file = fopen($target_file, 'r');
// while (($line = fgetcsv($file)) !== FALSE) {
//    //$line[0] = '1004000018' in first iteration
//    print_r($line);
// }
// fclose($file);

$fh = fopen($_FILES['csv']['tmp_name'], 'r+');
$lines = array();
while( ($row = fgetcsv($fh, 8192)) !== FALSE ) {
    $lines[] = $row;
}

// Por cada entrada no CSV
// print e echo para debug
foreach ($lines as $line) {
    print_r($line);
    echo "<br><br>";
}

return;


?>