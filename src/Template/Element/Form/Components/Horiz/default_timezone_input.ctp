<?php
echo $this->Html->script('select2.min.js',['block' => 'css']);
echo $this->Html->css('select2.min.css',['block' => 'css']);
echo $this->Html->css('select2-bootstrap.css',['block' => 'css']);

$timezoneArray = [];
$tzIdents = timezone_identifiers_list();
$dt = new DateTime('now');

foreach($tzIdents as $zone)
{
    $thisTz = new DateTimeZone($zone);
    $dt->setTimezone($thisTz);
    $offset = $dt->format('P');
    $timezoneArray[$zone] = $zone . " (UTC/GMT {$offset})";
}

echo $this->Form->control('default_timezone', [
    'type' => 'select',
    'options' => $timezoneArray,
]);

?>
<script type="text/javascript">
	$('#default-timezone').select2({
	    theme: "bootstrap",
		width: '100%'
	});
</script>
