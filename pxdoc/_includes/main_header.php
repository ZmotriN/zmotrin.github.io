<?php

// echo ;


// echo $PAGE->root . 'styles/styles.min.css';
// print_r($PAGE);
$styles = is_file($PAGE->root . 'styles/styles.min.css') ? getRelativePath($PAGE->file, $PAGE->root) . 'styles/styles.min.css' : $PAGE->shared . 'styles/styles.min.css';

?><!-- 

██████╗ ██╗ █████╗ ███╗   ███╗███████╗████████╗██████╗ ██╗ ██████╗██╗  ██╗
██╔══██╗██║██╔══██╗████╗ ████║██╔════╝╚══██╔══╝██╔══██╗██║██╔════╝██║ ██╔╝
██║  ██║██║███████║██╔████╔██║█████╗     ██║   ██████╔╝██║██║     █████╔╝ 
██║  ██║██║██╔══██║██║╚██╔╝██║██╔══╝     ██║   ██╔══██╗██║██║     ██╔═██╗ 
██████╔╝██║██║  ██║██║ ╚═╝ ██║███████╗   ██║   ██║  ██║██║╚██████╗██║  ██╗
╚═════╝ ╚═╝╚═╝  ╚═╝╚═╝     ╚═╝╚══════╝   ╚═╝   ╚═╝  ╚═╝╚═╝ ╚═════╝╚═╝  ╚═╝

-->
<!DOCTYPE html>
<html lang="fr-ca">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="Permissions-Policy" content="interest-cohort=()">
        <meta itemprop="digest" content="<?php echo ($PAGE->password ? md5($PAGE->password) : ''); ?>">
        <meta itemprop="lang" content="<?php echo $PAGE->lang; ?>">
        <meta property="og:locale" content="fr_CA">
        <meta property="og:type" content="article">
        <meta property="og:title" content="<?php echo $PAGE->ogtags->title; ?>">
        <meta property="og:description" content="<?php echo $PAGE->ogtags->description; ?>">
        <meta property="og:url" content="<?php echo $PAGE->ogtags->url; ?>">
        <meta property="og:image" content="<?php echo $PAGE->ogtags->image; ?>">
        <link rel="icon" type="image/x-icon" href="<?php echo $PAGE->shared; ?>images/favicon.ico">
        <!-- <link rel="stylesheet" href="<?php echo $PAGE->shared; ?>styles/styles.min.css"> -->
        <link rel="stylesheet" href="<?php echo $styles; ?>">
        <script>const shared = '<?php echo $PAGE->shared; ?>';</script>
        <script src="<?php echo $PAGE->shared; ?>jscripts/highlight.min.js"></script>
        <script src="<?php echo $PAGE->shared; ?>jscripts/swiper-bundle.min.js"></script>
        <script src="<?php echo $PAGE->shared; ?>jscripts/vue.global.prod.js"></script>
        <script src="<?php echo $PAGE->shared; ?>jscripts/pxdoc.min.js"></script>
        <title><?php echo strip_tags($PAGE->title); ?></title>
    </head>
    <body>
        <script>document.body.classList.add(localStorage.getItem('darkmode') === 'true' ? 'dark' : 'light');</script>
        <a id="top"></a>
        <header>
            <div id="logo" @click="goToTop('<?php echo getProjectRoot(); ?>', '<?php echo getIndexPath(); ?>')" title="Retour à l'accueil"></div>
            <div title="Interrupteur" id="lightswitch" ref="lightswitch" @click="lightswitch()"></div>
        </header>
        <main>
            <!-- MAIN HEADER EOF -->