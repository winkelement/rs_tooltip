<?php
require_once "../../../include/db.php";
include_once "../../../include/authenticate.php";
require_once "../../../include/general.php";

$ID = filter_input(INPUT_GET, 'ref', FILTER_VALIDATE_INT);

if (!$ID)
    {
    exit ('Error: No resource id provided or id not an valid integer.');
    }

global $tooltip_display_fields,$tooltip_display_ID;

if ($tooltip_display_ID)
    {
    $idinsert = "<th>ID: " . $ID . "</th>";
    }
else
    {
    $idinsert = '';
    }

$content = '';
$content .= '<table style="text-align: left">' . $idinsert;
foreach ($tooltip_display_fields as $tfield)
    {
    $data = ltrim(trim(i18n_get_translated(get_data_by_field ($ID, $tfield))),',');
    if ($data != '')
        {
        $content .= '<tr><td>' . $data . '</tr></td>';
        }
    }
$content .= '</table>';

echo $content;
