<?php

function HookRs_tooltipAllAdditionalheaderjs()
    {
    global $baseurl,$tooltip_display_theme;
    ?>
    <link rel="stylesheet" href="<?php echo $baseurl;?>/plugins/rs_tooltip/lib/tooltipster/css/tooltipster.bundle.min.css" type="text/css" />
    <?php
    if ($tooltip_display_theme !== 'default')
        {
        ?>
        <link rel="stylesheet" href="<?php echo $baseurl;?>/plugins/rs_tooltip/lib/tooltipster/css/plugins/tooltipster/sideTip/themes/tooltipster-sideTip-<?php echo $tooltip_display_theme; ?>.min.css" type="text/css" />
        <?php
        }
     ?>
    <script src="<?php echo $baseurl;?>/plugins/rs_tooltip/lib/tooltipster/js/tooltipster.bundle.min.js"></script>
    <?php
    }
