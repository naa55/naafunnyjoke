<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Good List</h1>
    <?php if(isset($error)): ?>
        <p><?=$error?></p>
    <?php else : ?>
    <?php foreach($favoriate as $fav): ?>
        <p><?php echo(htmlspecialchars($fav['name'], ENT_QUOTES, 'UTF-8')); ?></p>
        <form action="index.php?route=fav/delete" method="post">
            <input type="hidden" name="id" value="<?=$fav["id"]?>">
            <input type="submit" value="Remove">
        </form>
        <?php endforeach;?>
    <?php endif; ?>
</body>
</html>