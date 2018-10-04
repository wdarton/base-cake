<strong>Address</strong>
<hr>
<?php

	if (isset($entity->id)) {
		echo $this->Form->control('line_1', ['value' => $entity->address->line_1]);
		echo $this->Form->control('line_2', ['value' => $entity->address->line_2]);
		echo $this->Form->control('line_3', ['value' => $entity->address->line_3]);
		echo $this->Form->control('municipality', ['value' => $entity->address->municipality]);
		echo $this->Form->control('region', ['value' => $entity->address->region]);
		echo $this->Form->control('postal_code', ['value' => $entity->address->postal_code]);
		echo $this->Form->control('iso3166_country_id', [
			'options' => $entity->countries,
			'value' => $entity->address->iso3166_country_id,
			'label' => 'Country',
		]);
	} else {
		echo $this->Form->control('line_1');
		echo $this->Form->control('line_2');
		echo $this->Form->control('line_3');
		echo $this->Form->control('municipality');
		echo $this->Form->control('region');
		echo $this->Form->control('postal_code');
		echo $this->Form->control('iso3166_country_id', [
			'options' => $entity->countries,
			'label' => 'Country',
			'default' => 236
		]);
	}
?>
<hr>

<script type="text/javascript">

	if ($('#modal').length) {
		$('#iso3166-country-id').select2({
		    theme: "bootstrap",
		    dropdownParent: $("#modal"),
		    width: '100%'
		});
	} else {
		$('#iso3166-country-id').select2({
		    theme: "bootstrap",
		    width: '100%'
		});
	}


</script>