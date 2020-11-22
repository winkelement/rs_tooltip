<?php

include_once "../../../include/db.php";
include_once "../../../include/authenticate.php";

$ID = filter_input(INPUT_GET, 'ref', FILTER_VALIDATE_INT);

if (!$ID)
    {
    exit ('Error: No resource id provided or id not an valid integer.');
    }

global $tooltip_display_fields,$tooltip_display_ID,$tooltip_show_fieldname;

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
    if ($tooltip_show_fieldname) 
        {
        $fieldname_array = sql_query("select title from resource_type_field where ref = $tfield");
        $fieldname = '<td>' . lang_or_i18n_get_translated($fieldname_array[0]["title"],'fieldtitle-') . ':</td>';
        } 
    else 
        {
        $fieldname = '';
        }
    if ($data != '')
        {
        $content .= '<tr>' . $fieldname . '<td>' . $data . '</td></tr>';
        }  
    }
    
$content .= '</table>';

echo $content;
