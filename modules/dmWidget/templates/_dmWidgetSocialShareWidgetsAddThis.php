<div class="addthis_toolbox addthis_default_style<?php 
    if ($style != "default") echo " addthis_".$style;
?>">
<?php
foreach ($services as $service) {
?>
    <a class="addthis_button_<?php echo $service; ?>"></a>
<?php
}
?>
<?php if (isset($use_addthis_counter) && $use_addthis_counter) { ?>
    <a class="addthis_counter addthis_<?php echo $addthis_counter_style; ?>"></a>
<?php } ?>
</div>
<script type="text/javascript" src="http://s7.addthis.com/js/250/addthis_widget.js#pubid=<?php // TODO add config ?>"></script>