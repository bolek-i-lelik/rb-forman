<?php
/* @var $this yii\web\View */
$fileName = 'rusceramica.xlsx';

$data = \moonland\phpexcel\Excel::import($fileName); // $config is an optional
 
$data = \moonland\phpexcel\Excel::widget([
        'mode' => 'import', 
        'fileName' => $fileName, 
        'setFirstRecordAsKeys' => true, // if you want to set the keys of record column with first record, if it not set, the header with use the alphabet column on excel. 
        'setIndexSheetByName' => true, // set this if your excel data with multiple worksheet, the index of array will be set with the sheet name. If this not set, the index will use numeric. 
        'getOnlySheet' => 'sheet1', // you can set this property if you want to get the specified sheet from the excel data with multiple worksheet.
    ]);

?>
<h1>admin/index</h1>

<p>
    You may change the content of this page by modifying
    the file <code><?= __FILE__; ?></code>.
</p>
<?php foreach($data as $dat):?>
	<?= var_dump($dat); echo '<hr>'; ?>
<?php endforeach;?>
<p>Привет мир!</p>