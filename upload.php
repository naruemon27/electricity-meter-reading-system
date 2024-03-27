<?php
$target_dir = "uploads/";

// สร้างชื่อไฟล์ใหม่โดยใช้ฟังก์ชัน uniqid() เพื่อป้องกันการซ้ำกันของชื่อไฟล์
$target_file = $target_dir . uniqid() . '_' . basename($_FILES["imageFile"]["name"]);

$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

// ตรวจสอบว่าไฟล์ที่อัปโหลดเป็นภาพหรือไม่
if (isset($_POST["submit"])) {
    $check = getimagesize($_FILES["imageFile"]["tmp_name"]);
    if ($check === false) {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}

// ตรวจสอบว่าไฟล์ที่อัปโหลดมีขนาดเกินขนาดที่กำหนดหรือไม่
if ($_FILES["imageFile"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}

// ตรวจสอบว่าไฟล์ที่อัปโหลดมีนามสกุลที่อนุญาตหรือไม่
$allowedExtensions = ["jpg", "jpeg", "png", "gif"];
if (!in_array($imageFileType, $allowedExtensions)) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}

// ตรวจสอบว่ามีไฟล์ที่มีชื่อเดียวกันอยู่แล้วหรือไม่
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}

// ตรวจสอบว่ามีข้อผิดพลาดในการอัปโหลดไฟล์หรือไม่
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
} else {
    // พยายามอัปโหลดไฟล์
    if (move_uploaded_file($_FILES["imageFile"]["tmp_name"], $target_file)) {
        echo "The file " . basename($_FILES["imageFile"]["name"]) . " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
?>
