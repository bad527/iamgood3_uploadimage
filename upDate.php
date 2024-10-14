<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    require_once("dbtools.inc.php");
    $link=create_connection();
    $id=$_GET["id"];
    $sql="SELECT * FROM `talk` WHERE `id`='$id'";
    $result=mysqli_query($link,$sql);
    $row=mysqli_fetch_assoc($result);
    mysqli_free_result($result);
    ?>
    <form action="upDate_action" name="upDate_form" method="post">
    <input type="int" name="id" value="<?php echo $row["id"]?>">
    <table width="800" align="center">
            <tr>
                <td colspan="2" align="center"><p>輸入新的留言</p></td>
            </tr>
            <tr>
                <td width="15%">作者:</td>
                <td width="85%"><input type="text" name="name" value="<?php echo $row["name"]?>"  size="50"></td>
            </tr>
            <tr>
                <td width="15%">信箱:</td>
                <td width="85%"><input type="text" name="gmail" value="<?php echo $row["gmail"]?>" size="50"></td>
            </tr>
            <tr>
                <td width="15%">性別:</td>
                <td width="85%">男:<input type="radio" name="sex" value="1" <?php if($row["sex"]==1) echo "checked";?>>
                女:<input type="radio" name="sex" value="0"  <?php if($row["sex"]==0) echo "checked";?>></td>
            </tr>
            <tr>
                <td width="15%">主旨:</td>
                <td width="85%"><input type="text" name="subject" value="<?php echo $row["subject"]?>" size="50"></td>
            </tr>
            <tr>
                <td width="15%">內容:</td>
                <td width="85%"><textarea name="content" cols="50" rows="5"><?php echo $row["content"]?></textarea></td>
            </tr>
            <tr>
                <td colspan="2" align="center"><input type="submit" value="送出"></td>
            </tr>
        </table>
    </form>
    
</body>
</html>