<?php
include_once(dirname(__FILE__) . '/../lib/init.php');
$fh = fopen(dirname(__FILE__) . '/rando.txt', 'r');
if ($fh) {
	$counter = 0;
	// skip the first line
	$line = fgets($fh, 4096);
	$sources = array('google', 'facebook', 'mail');
	
	while (($line = fgets($fh, 4096)) !== false) {
		$line_parts = explode("\t", $line);

		\GunFE\Lead::clear();
		$lead = \GunFE\Lead::getInstance();
		$lead->setClientId(1);
		$lead->setOfferId(rand(1,3));
		$lead->setValue('ip', rand(100,254) . '.' . rand(1,254) . '.' . rand(1,254) . '.' . rand(1,254));
		$lead->setValue('firstname', $line_parts[1]);
		$lead->setValue('lastname', $line_parts[2]);
		$lead->setValue('address', $line_parts[3]);
		$lead->setValue('city', $line_parts[4]);
		$lead->setValue('state', $line_parts[5]);
		$lead->setValue('zip', $line_parts[6]);
		$lead->setValue('country', $line_parts[7]);
		$lead->setValue('email', $line_parts[8]);
		$lead->setValue('phone', $line_parts[9]);
		$lead->setValue('birth_date', $line_parts[10]);
		$lead->setValue('occupation', $line_parts[11]);
		$lead->setValue('gender', $line_parts[0]);
		$lead->setValue('s1', $sources[rand(0,2)]);
		$lead->setValue('s2', rand(1000,1100));
		
		$lead->setValue('click', 1);
		
		if ($counter % 5 == 0) {
			$lead->setValue('partial', 1);
		}
		if ($counter % 500 == 0) {
			echo "Adding conversion: " . $line_parts[8] . "\n";
			$lead->setValue('conversion', 1);
		}
		
		$lead->save(true);
		
		if ($counter % 100 == 0) {
			echo "Lead saved: " . $lead->getId() . "\n";
		}
		
		
		
		$counter++;
	}
	fclose($fh);
}
