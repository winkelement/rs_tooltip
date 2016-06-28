<?php

function HookRs_tooltipSearchEndofsearchpage()
    {
    global $baseurl,$tooltip_display_theme;
    ?>
    <script>
    jQuery(document).ready(function() {
        jQuery(".ResourcePanelShell").find('img').tooltipster({
            animation: 'fade',
            updateAnimation: null,
            theme: 'tooltipster-<?php echo $tooltip_display_theme; ?>',
            contentAsHTML: true,
            content: 'Loading...',
            functionBefore: function(instance, helper) {
                var $origin = jQuery(helper.origin);
                if ($origin.data('loaded') !== true) {
                    var ref = $origin.closest(".ResourcePanelShell").attr("id").replace("ResourceShell", "");
                    jQuery.get('<?php echo $baseurl;?>/plugins/rs_tooltip/include/generate.php', {ref: ref}, function(data) {
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
