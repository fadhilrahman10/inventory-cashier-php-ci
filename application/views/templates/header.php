<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />
    <meta name="description" content="" />
    <meta name="author" content="" />

    <title>Dashboard - Your Best Marketplace</title>

    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet" />
    <link href="<?=base_url();?>assets/style/main.css" rel="stylesheet" />
    <?php if (isset($addon_style)): ?>
    <?php foreach ($addon_style as $dt): ?>
    <link rel="stylesheet" href="<?=$dt;?>">
    <?php endforeach;?>
    <?php endif?>
  </head>

  <body>
