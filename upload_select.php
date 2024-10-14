<?php
require_once("dbtools.inc.php");
$link=create_connection();
// 設定圖片文件夾的路徑
$directory = 'upload_file/';
$images = scandir($directory); // 讀取文件夾中的文件

echo "<h2>選擇一張圖片:</h2>";
echo "<div style='display: flex; flex-wrap: wrap;'>";

foreach ($images as $image) {
    if ($image != "." && $image != "..") {
        $file_extension = pathinfo($image, PATHINFO_EXTENSION);
        if (in_array(strtolower($file_extension), ['jpg', 'jpeg', 'png', 'gif'])) {
            echo "<div style='margin: 10px;'>";
            // 點擊圖片後調用 JavaScript 函數並傳遞圖片路徑
            echo "<img src='" . $directory . $image . "' style='width: 150px; height: 150px; object-fit: cover;
            ' onclick='selectImage(\"$directory$image\")' alt='圖片'>";
            $query=mysqli_query($link,"UPDATE `talk` SET `images`='$image'");
            echo "</div>";
            
        }
    }
}

echo "</div>";
?>

<script>
// 選擇圖片後，將圖片的路徑傳遞回父頁面，並替換 + 按鈕
function selectImage(imagePath) {
    window.opener.replacePlusButton(imagePath); // 呼叫父窗口的函數
    window.close(); // 關閉當前選擇頁面
}
</script>
