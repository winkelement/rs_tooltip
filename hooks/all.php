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

function HookRs_tooltipAllThumblistextra()
    {
    global $baseurl,$tooltip_display_theme,$tooltip_collection_show,$tooltip_maxwidth;
    if ($tooltip_collection_show)
        {
        ?>
        <script>
        jQuery(document).ready(function()
            {
            jQuery(".CollectionPanelShell").find('img').tooltipster(
                {
                animation: 'fade',
                updateAnimation: null,
        		<?php if ($tooltip_maxwidth) { echo 'maxWidth: ' . $tooltip_maxwidth . ','; } ?>
                theme: 'tooltipster-<?php echo $tooltip_display_theme; ?>',
                contentAsHTML: true,
                content: '<i class="fa fa-spinner fa-pulse fa-2x fa-fw"></i>',
                functionBefore: function(instance, helper)
                    {
                    var $origin = jQuery(helper.origin);
                    if ($origin.data('loaded') !== true)
                        {
                        var ref = $origin.closest(".CollectionPanelShell").attr("id").replace("ResourceShell", "");
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
    }
