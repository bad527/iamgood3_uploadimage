<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script>
        function Delete(id){
            if(confirm("確認是否刪除")){
                window.location.href="delete.php?id="+id;
            }
        }
        function upDate(id) {
            window.location.href="upDate.php?id="+id;
        }

        // 打開新頁面選擇圖片
        function upload_select() {
            window.open('upload_select.php', '_blank', 'width=600,height=400'); // 開新窗口選擇圖片
        }

        // 接收選擇的圖片路徑，並替換 + 按鈕為圖片預覽
        function replacePlusButton(imagePath) {
            const plusButton = document.getElementById('plusButton');
            plusButton.outerHTML = "<img src='" + imagePath + "' style='width: 150px; height: 150px; object-fit: cover;' alt='已選圖片'>";
        }
    </script>
</head>
<body>
    <?php
    require_once("dbtools.inc.php");
    $link=create_connection();
    $sql="SELECT * FROM `talk` ORDER BY `id` DESC";
    $result=execute_sql($link,"iamgood",$sql);
    
    
    echo "<table width='800' align='center' border='1'>";
    $j=1;
    while($row=mysqli_fetch_assoc($result)){
        echo "<tr><td><div class='message-box'><td>";
        echo "作者:".$row["name"]."&nbsp&nbsp&nbsp  id:".$row["id"]."<br>";
        echo "信箱:".$row["gmail"]."<br>";
        if($row["sex"]==1){
            echo "男<br>";
        }else{
            echo "女<br>";
        }
        echo "主旨:".$row["subject"]."<br>";
        echo "<button class='del-btn' onclick='Delete(".$row["id"].")'>x</button>";
        echo "<button class='update-btn' onclick='upDate(".$row["id"].")'>修改</button>";
        echo "內容:<br><textarea name='".$row["content"]."' cols='50' rows='5' readonly>".$row["content"]."</textarea><br>";
        // +號按鈕
        echo "<button type='button' id='plusButton' onclick='upload_select()'>+</button>";
        echo "<img src='upload_file/".$row["images"]."'";
        $j++;
        echo "<div><td><tr>";
       
    }
    echo "</table>";
    ?>
    <form action="post.php" name="postForm" method="post">
        <table width="800" align="center">
            <tr>
                <td colspan="2" align="center"><p>輸入新的留言</p></td>
            </tr>
            <tr>
                <td width="15%">作者:</td>
                <td width="85%"><input type="text" name="name" size="50"></td>
            </tr>
            <tr>
                <td width="15%">信箱:</td>
                <td width="85%"><input type="text" name="gmail" size="50"></td>
            </tr>
            <tr>
                <td width="15%">性別:</td>
                <td width="85%">男:<input type="radio" name="sex" value="1">
                女:<input type="radio" name="sex" value="0"></td>
            </tr>
            <tr>
                <td width="15%">主旨:</td>
                <td width="85%"><input type="text" name="subject" size="50"></td>
            </tr>
            <tr>
                <td width="15%">內容:</td>
                <td width="85%"><textarea name="content" cols="50" rows="5"></textarea></td>
            </tr>
            <tr>
                <td colspan="2" align="center"><input type="submit" value="送出"></td>
            </tr>
        </table>
    </form>
    <form action="upload.php" enctype="multipart/form-data" method="post">
        <!-- 隱藏的文件上傳按鈕 -->
        <input type="file" id="fileInput" name="image" multiple>
        
        
        <br><br>

        <input type="submit" value="submit" name="submit">
    </form>
</form>
</body>
</html>