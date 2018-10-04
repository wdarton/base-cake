<?php
	use Cake\I18n\Time;
	$time = new Time($time);
	$time->timezone = $currentUser->default_timezone;

	echo $time;
?>
