<?php

function HookRs_tooltipSearchEndofsearchpage()
    {
    global $baseurl,$tooltip_display_theme,$tooltip_maxwidth;
    ?>
    <script>
    jQuery(document).ready(function()
        {
        jQuery(".ResourcePanel, .ImageStripLink").find('img').tooltipster(
            {
            animation: 'fade',
            updateAnimation: null,
            <?php if ($tooltip_maxwidth) { echo 'maxWidth: ' . $tooltip_maxwidth . ','; } ?>
            theme: 'tooltipster-<?php echo $tooltip_display_theme; ?>',
            contentAsHTML: true,
            content: '<i class="fa fa-cog fa-spin fa-2x"></i>',
            functionBefore: function(instance, helper)
                {
                var $origin = jQuery(helper.origin);
                if ($origin.data('loaded') !== true)
                    {
                    var ref = $origin.closest(".ResourcePanel, .ImageStripLink").attr("id").replace("ResourceShell", "").replace("ResourceStrip", "");
                    jQuery.get('<?php echo $baseurl;?>/plugins/rs_tooltip/include/generate.php', {ref: ref}, function(data)
                        {
                        instance.content(data);
                        $origin.data('loaded', true);
                        });
                    }
                }
            });

        });
    </script>
    <?php
    }
