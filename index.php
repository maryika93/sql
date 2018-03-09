<?php

$connect = mysqli_connect("localhost", "mtipikina", "neto1539", "global");
$connect->set_charset("utf8");
$res = mysqli_query($connect,"select * from books");

if (!empty($_POST)) {
    $ISBN = $_POST['ISBN'];
    $name = $_POST['name'];
    $author = $_POST['author'];
    $resISBN = mysqli_query($connect,"select * from books where isbn like %$ISBN%");
    while ($dataISBN = mysqli_fetch_array($resISBN)) {
        echo '<pre>';
        print_r($dataISBN);
    }

    $resname = mysqli_query($connect,"select * from books where name like %$name%");
    while ($dataname = mysqli_fetch_array($resname)) {
        echo '<pre>';
        print_r($dataname);
    }

    $resauthor = mysqli_query($connect,"select * from books where author like %$author%");
    while ($dataauthor = mysqli_fetch_array($resauthor)) {
        echo '<pre>';
        print_r($dataauthor);
    }
}
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
    <?php while ($data = mysqli_fetch_array($res)){ ?>
        <tr>
            <td align="center"><?php echo $data['name']?></td>
            <td align="center"><?php echo $data['author']?></td>
            <td align="center"><?php echo $data['year']?></td>
            <td align="center"><?php echo $data['isbn']?></td>
            <td align="center"><?php echo $data['genre']?></td>
        </tr>
    <?php } ?>
</table>
</body>
</html>


<form method="post" action="" enctype="multipart/form-data">
    <label>Фильтр по ISBN</label>
    <input type="text" placeholder="ISBN" name="ISBN"><br/>
    <label>Фильтр по названию</label>
    <input type="text" placeholder="name" name="name"><br/>
    <label>Фильтр по автору</label>
    <input type="text" placeholder="author" name="author">
    <input type="submit" value="Фильтровать"><br/><br/>
</form>
