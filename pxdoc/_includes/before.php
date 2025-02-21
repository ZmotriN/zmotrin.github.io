<?php

if(!$PAGE->type) return;
if(!$info = register_page_type($PAGE->type)) return;
if(empty($info['header'])) return;
if(is_string($info['header'])) $info['header'] = [$info['header']];

$PAGE->shared = get_shared($PAGE->file);
$root = str_replace('\\', '/', realpath($PAGE->root)) . '/';
$image = $PAGE->domain . 'pxdoc/images/default.webp';
if($PAGE->image) {
    if($img = realpath(pathinfo($PAGE->file, PATHINFO_DIRNAME) . '/' . $PAGE->image)) {
        $image = str_replace($root, $PAGE->domain, str_replace('\\', '/', $img));
    }
}

$ogtags = new stdClass;
$ogtags->image = $image;
$ogtags->title = strip_tags($PAGE->title) . ' | ' . $PAGE->project;
$ogtags->description  = htmlentities(html_entity_decode(strip_tags(trim($PAGE->abstract)), ENT_QUOTES, 'UTF-8'), ENT_QUOTES, 'UTF-8');
$ogtags->url = str_replace($root, $PAGE->domain, str_replace('\\', '/', pathinfo($PAGE->file, PATHINFO_DIRNAME) . '/'));
$PAGE->ogtags = $ogtags;

foreach($info['header'] as $header) {
    if(!$headerfile = realpath($header)) continue;
    include($header);
}
