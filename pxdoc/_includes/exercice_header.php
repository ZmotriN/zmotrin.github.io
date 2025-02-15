<?php
$target = pathinfo($PAGE->file, PATHINFO_DIRNAME).S.'exercice.json';
file_put_contents($target, json_encode(php_file_info($PAGE->file), JSON_PRETTY_PRINT));
?>

            <div id="subhead">
                <div id="breadcrumb">
                    <div id="breadcrumb_normal"><?php print_breadcrumb(); ?></div>
                    <div id="breadcrumb_index"><?php print_breadcrumb_index(); ?></div>
                </div>
                <h1 id="title"><?php echo strip_tags($PAGE->title); ?></h1>
            </div>
            <article>
                <div id="contents">
                    <!-- EXERCICE HEADER EOF -->
