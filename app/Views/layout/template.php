<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Conference</title>

    <!-- css -->
    <!-- <link rel="stylesheet" href=<?= base_url("bower_components/bootstrap/dist/css/bootstrap.min.css")?>> -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href=<?= base_url("bower_components/ionicons/css/ionicons.min.css")?>>
    <link rel="stylesheet" href=<?= base_url("assetsbr/css/main.css")?>>
</head>
<body data-spy="scroll" data-target="#site-nav">
	<?= $this->include('layout/navbar'); ?>
	<?= $this->renderSection('content'); ?>
    <!-- script -->
    <script src=<?= base_url("bower_components/jquery/dist/jquery.min.js")?>></script>
    <script src=<?= base_url("bower_components/bootstrap/dist/js/bootstrap.min.js")?>></script>
    <script src=<?= base_url("bower_components/smooth-scroll/dist/js/smooth-scroll.min.js")?>></script>
    <script src=<?= base_url("assetsbr/js/main.js")?>></script>
</body>
</html>

