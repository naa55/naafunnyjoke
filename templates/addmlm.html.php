<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form action="" method="post">
        <input type="hidden" name="mlm[id]"
        value="<?php $joke['id'] ?? ''?>">
        <label for="name">Type your joke here:
        </label>
        <textarea id="joketext" name="mlm[name]" rows="3"
        cols="40"><?=$mlm['name'] ?? ''?></textarea>
        <input type="submit" name="submit" value="Save">
    </form>
</body>
</html>