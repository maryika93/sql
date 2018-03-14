<?php

$connect = mysqli_connect("localhost", "mtipikina", "neto1539", "global");
$connect->set_charset("utf8");
?>

<html>
<head>
    <meta charset="utf-8">
    <title> Книги </title>
</head>
<body>
<table width="100%", border="1", align="center", cellpadding="10">
    <tr>
        <td align="center"> Название </td>
        <td align="center"> Автор </td>
        <td align="center"> Год </td>
        <td align="center"> isbn </td>
        <td align="center"> Жанр </td>
    </tr>
    <?php if (empty($_POST)) {
        $res = mysqli_query($connect,"select * from books");
        while ($data = mysqli_fetch_array($res)) { ?>
            <tr>
                <td align="center"><?php echo $data['name'] ?></td>
                <td align="center"><?php echo $data['author'] ?></td>
                <td align="center"><?php echo $data['year'] ?></td>
                <td align="center"><?php echo $data['isbn'] ?></td>
                <td align="center"><?php echo $data['genre'] ?></td>
            </tr>
        <?php }
    }?>
    <?php if (!empty($_POST['isbn'])) {
        $isbn = $_POST['isbn'];
        $resisbn = mysqli_query($connect,"select * from books where isbn like '%$isbn%'");
        while ($data = mysqli_fetch_array($resisbn)) { ?>
            <tr>
                <td align="center"><?php echo $data['name'] ?></td>
                <td align="center"><?php echo $data['author'] ?></td>
                <td align="center"><?php echo $data['year'] ?></td>
                <td align="center"><?php echo $data['isbn'] ?></td>
                <td align="center"><?php echo $data['genre'] ?></td>
            </tr>
        <?php }
    }?>
    <?php if (!empty($_POST['name'])) {
        $name = $_POST['name'];
        $resname = mysqli_query($connect,"select * from books where name like '%$name%'");
        while ($data = mysqli_fetch_array($resname)) { ?>
            <tr>
                <td align="center"><?php echo $data['name'] ?></td>
                <td align="center"><?php echo $data['author'] ?></td>
                <td align="center"><?php echo $data['year'] ?></td>
                <td align="center"><?php echo $data['isbn'] ?></td>
                <td align="center"><?php echo $data['genre'] ?></td>
            </tr>
        <?php }
    }?>
    <?php if (!empty($_POST['author'])) {
        $author = $_POST['author'];
        $resauthor = mysqli_query($connect,"select * from books where author like '%$author%'");
        while ($data = mysqli_fetch_array($resauthor)) { ?>
            <tr>
                <td align="center"><?php echo $data['name'] ?></td>
                <td align="center"><?php echo $data['author'] ?></td>
                <td align="center"><?php echo $data['year'] ?></td>
                <td align="center"><?php echo $data['isbn'] ?></td>
                <td align="center"><?php echo $data['genre'] ?></td>
            </tr>
        <?php }
    }?>
</table>
</body>
</html>


<form method="post" action="" enctype="multipart/form-data">
    <label>Фильтр по isbn</label>
    <input type="text" placeholder="isbn" name="isbn"><br/>
    <label>Фильтр по названию</label>
    <input type="text" placeholder="name" name="name"><br/>
    <label>Фильтр по автору</label>
    <input type="text" placeholder="author" name="author">
    <input type="submit" value="Фильтровать"><br/><br/>
</form>
