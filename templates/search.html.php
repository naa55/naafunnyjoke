<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="index.php?route=mlm/search" method="post">
        <input type="text" name="search" placeholder="Search">
        <button type="submit" name="submit-search"></button>
    </form>
    <?php var_dump($result) ?>
    <?php if(isset($error)) : ?>
        <?=$error?>
    <?else :?>
        <?php foreach($result as $mlm) :?>
            <?=htmlspecialchars($mlm["name"], ENT_QUOTES, "UTF-8") ?>
        <?php endforeach; ?>
        <?php endif; ?>
</body>
</html>