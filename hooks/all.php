<?php

function HookRs_tooltipAllAdditionalheaderjs()
    {
    global $baseurl;
    ?>
    <link rel="stylesheet" href="<?php echo $baseurl;?>/plugins/rs_tooltip/lib/tooltipster/css/tooltipster.bundle.min.css" type="text/css" />
    <script src="<?php echo $baseurl;?>/plugins/rs_tooltip/lib/tooltipster/js/tooltipster.bundle.min.js"></script>
    <?php
    }
