
            <div id="subhead">
                <div id="breadcrumb">
                    <div id="breadcrumb_normal"><?php print_breadcrumb(); ?></div>
                    <div id="breadcrumb_index"><?php print_breadcrumb_index(); ?></div>
                </div>
                <h1 id="title"><?php if($PAGE->icon): ?><img src="<?php echo $PAGE->icon?>">&nbsp;<?php endif; ?><?php echo strip_tags($PAGE->title); ?></h1>
            </div>
            <article>
                <div id="contents">
                    <!-- ARTICLE HEADER EOF -->
