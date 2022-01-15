<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>MLM List Below beware</h1>
    <?php if(isset($error)) :?>
        <p><?=$error?></p>
    <?php else : ?>
            <p>
                <?php foreach($mlms as $mlm) : ?>
                <?=htmlspecialchars($mlm["name"], ENT_QUOTES, "UTF-8") ?>
                <form action="index.php?route=mlm/edit/id" method="post">
                    <input type="hidden" name="id" value="<?=$mlm['id']?>">
                    <input type="submit" value="Edit">
                </form>
                <form action="index.php?route=mlm/delete" method="post">
                        <input type="hidden" name="id"
                        value="<?=$mlm["id"]?>">
                        <input type="submit" value="Delete">
                </form>
                <form action="index.php?route=mlm/favoriate" method='post'>
                     <input type="hidden" name="id" value="<?=$mlm["id"]?>">
                <input type="submit"  value="favoriate"/>
                </form>
            </p>
            <?php endforeach;?>
            <?php endif;?>
            <li><a href="index.php?route=mlm/edit">Add new mlm</a></li>
            <li><a href="index.php?route=mlm/favlist">Favoriate</a></li>

</body>
</html>