<!DOCTYPE html>
<html lang="fr>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <?= $this->Html->meta('icon') ?>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.4/tailwind.min.css">
    <?php //= $this->AssetMix->script('app'); ?>

    <?= $this->AssetMix->script('app'); ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>
<body>
    <?= $this->Inertia->make($page, 'app', ''); ?>
</body>
</html>
