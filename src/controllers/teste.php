<?php
// Controller Temporário

$datas = [];
for($yaerDiff = 1;$yaerDiff >= 0; $yaerDiff--) {
    $dataD = date('Y') - $yaerDiff;
    for($month = 1; $month <= 12; $month++) {
        $date = new DateTime("{$dateD}-{$month}-1");
        $datas[$date->format('Y-m')] = strftime('%B de %Y', $date->getTimestamp());
    }
}

foreach($datas as $key => $values) {
    echo $values;
    echo '<br>';
}