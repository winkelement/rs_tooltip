<?php
require_once "../../../include/db.php";
include_once "../../../include/authenticate.php";
require_once "../../../include/general.php";

$ID = filter_input(INPUT_GET, 'ref', FILTER_VALIDATE_INT);

global $tooltip_display_fields;

$content = '';
$content .= '<table style="text-align: left"><th>ID: ' . $ID . '</th>';
foreach ($tooltip_display_fields as $tfield)
    {
    $data = get_data_by_field($ID,$tfield);
    $content .= '<tr><td>' . $data . '</tr></td>';
    }
$content .= '</table>';

echo $content;
