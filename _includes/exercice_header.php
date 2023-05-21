<?php
$target = pathinfo($PAGE->file, PATHINFO_DIRNAME).S.'exercice.json';
$info = php_file_info($PAGE->file);
$info->title = strip_tags($info->title);
file_put_contents($target, json_encode($info, JSON_PRETTY_PRINT));
?>

            <div id="subhead">
                <div id="breadcrumb"><?php print_breadcrumb(); ?></div>
                <h1 id="title"><?php echo $PAGE->title; ?></h1>
            </div>
            <article>
                <div id="contents">
                    <!-- EXERCICE HEADER EOF -->
