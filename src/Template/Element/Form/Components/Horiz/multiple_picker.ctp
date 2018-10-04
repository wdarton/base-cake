<?php
use Cake\Utility\Inflector;
echo $this->Html->script('select2.min.js',['block' => 'css']);
echo $this->Html->css('select2.min.css',['block' => 'css']);
echo $this->Html->css('select2-bootstrap.css',['block' => 'css']);

$formOptions = [];

if (!isset($dataValue2)) {
	foreach ($dataSet as $data) {
		$formOptions[$data->$dataId] = $data->$dataValue;
	}
} else {
	foreach ($dataSet as $data) {
		$formOptions[$data->$dataId] = $data->$dataValue.' - '.$data->$dataValue2;
	}
}

$pluralId = Inflector::pluralize($id);

echo $this->Form->control($pluralId,[
	'options' => $formOptions,
	'label' => Inflector::humanize($pluralId),
	'multiple' => 'multiple',
]);
// Replace underscores with dashes to make javascript happy
$id = str_replace('_', '-', $id);
?>

<script type="text/javascript">
	$('#<?= $id ?>').select2({
	    theme: "bootstrap",
	    width: '100%'
	});

</script>