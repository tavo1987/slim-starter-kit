<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>
        <?= isset($title) ? $title : getenv('META_TITLE'); ?>
    </title>

    <!--STYLES-->
    <link href='https://fonts.googleapis.com/css?family=Lato:400,700,900' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="css/style.css">

    <!--META TAGS-->
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta name="description" content="<?= getenv('META_DESCRIPTION')?>">
    <meta name="author" content="<?= getenv('META_AUTHOR')?>">

    <!--META TAGS FACEBOOK-->
    <meta property="og:title" content="<?= getenv('OG_TITLE')?>">
    <meta property="og:description" content="<?= getenv('OG_DESCRIPTION')?>">
    <meta property="og:img" content="<?= getenv('OG_IMAGE')?>">
    <meta property="og:site_name" content="<?= getenv('OG_SITE_NAME')?>">
    <meta property="og:locale" content="<?= getenv('OG_LOCATE')?>">

</head>
<body>
    <?= $templateContent?>
    <script src="js/app.min.js"></script>
</body>
</html>