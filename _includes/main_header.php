<!DOCTYPE html>
<html lang="fr-ca">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="icon" type="image/x-icon" href="<?php echo $PAGE->shared; ?>images/favicon.ico">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Rubik:ital,wght@0,300;0,400;0,600;1,400&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="<?php echo $PAGE->shared; ?>styles/styles.css">
        <link rel="stylesheet" href="<?php echo $PAGE->shared; ?>styles/highlight.min.css">
        <!-- <link rel="stylesheet" href="<?php echo $PAGE->shared; ?>styles/video-js.min.css"> -->
        <!-- <link rel="stylesheet" href="<?php echo $PAGE->shared; ?>styles/swiper-bundle.min.css"> -->
        <script src="<?php echo $PAGE->shared; ?>jscripts/commons.js"></script>
        <script src="<?php echo $PAGE->shared; ?>jscripts/highlight.min.js"></script>
        <!-- <script src="<?php echo $PAGE->shared; ?>jscripts/howler.min.js"></script> -->
        <!-- <script src="<?php echo $PAGE->shared; ?>jscripts/swiper-bundle.min.js"></script> -->
        <script src="<?php echo $PAGE->shared; ?>jscripts/vue.global.prod.js"></script>
        <script>const shared = '<?php echo $PAGE->shared; ?>';</script>
        <title><?php echo strip_tags($PAGE->title); ?></title>
    </head>
    <body>
        <script>document.body.className = localStorage.getItem('darkmode') === 'true' ? 'dark' : 'light';</script>
        <a id="top"></a>
        <header>
            <div id="logo" @click="goToTop()">
                <svg class="logo-tim" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1202.33 303.71">
                    <path d="M785.69 166.81l16.26 16.26 16.26-16.26L930.56 54.46v226.25h-257V54.67l112.13 112.14zM650.56.71v303h303V.71h-1.77L801.95 150.54 652.12.71h-1.56zM324.48.46v303h303V.46h-303zm129.93 129.93c-13.08 13.08-13.08 34.29 0 47.38 9.41 9.41 23.02 12.05 34.79 7.92l94.77 94.77H347.48v-257h257v236.49l-94.77-94.77c4.13-11.77 1.48-25.39-7.92-34.79-13.09-13.08-34.3-13.08-47.38 0zM206.47 0L0 206.48V303h303V0h-96.53zM23 280v-64l85.62-85.62 119.87 119.87L249 229.74 129.13 109.87 216 23h64v257H23z"></path>
                </svg>
            </div>
            <div title="Dark mode" id="lightswitch" class="lightswitch--on" ref="lightswitch" @click="lightswitch()"></div>
        </header>
        <main>
            <!-- MAIN HEADER EOF -->