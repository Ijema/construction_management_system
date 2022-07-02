<?php
if (!empty($_FILES['image'])){  
  for ($i = 0; isset($_FILES['image']['name'][$i]); $i++) {
   $allowed = array('jpg', 'jpeg', 'png', 'bmp', 'tiff', 'gif');
   $fileName = $_FILES['image']['name'][$i];
   $fileSize = $_FILES['image']['size'][$i];
   $fileExt = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));

   if (!in_array($fileExt, $allowed)) {
    $errors[] = 'Incorrect file type. Only allowed: ' . implode(', ', $allowed) . '';
   }
   if ($fileSize > 2097152) {
    $errors[] = "$fileName exceeds the maximum file size of 2 MB";
   }
  }

  for ($i = 0; isset($_FILES['image']['name'][$i]); $i++) {
   $fileBase = basename($_FILES['image']['name'][$i]);
   $fileName = pathinfo($fileBase, PATHINFO_FILENAME);
   $fileExt = pathinfo($fileBase, PATHINFO_EXTENSION);
   $fileTmp = $_FILES['image']['tmp_name'][$i];
   $fileDst = 'images/images/'.basename($_FILES['image']['name'][$i]);
   for ($j = 0; file_exists($fileDst); $j++) {
    $fileDst = "images/images/$fileName-$j.$fileExt";
   }
   if (move_uploaded_file($fileTmp, $fileDst)) {
    $output[$fileBase] = "Stored $fileBase OK";
   } 
  }
 }
 ?>