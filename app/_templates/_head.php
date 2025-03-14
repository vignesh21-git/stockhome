<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Vignesh">
    <title>Photogram</title>

    <!-- Bootstrap core CSS -->
    <link href="<?=get_config('base_path')?>assets/dist/css/bootstrap.min.css" rel="stylesheet">

    <?php if (file_exists($_SERVER['DOCUMENT_ROOT'] .get_config('base_path').'css/' . basename($_SERVER['PHP_SELF'], ".php") . ".css")) { ?>
        <link href="<?=get_config('base_path')?>css/<?= basename($_SERVER['PHP_SELF'], ".php") ?>.css" rel="stylesheet">
    <? } ?>

</head>