<script>
<?php
require 'Packer.php';
error_reporting(E_ALL);
$js = file_get_contents(__DIR__ . '/' . 'script.js');
$packer = new Tholu\Packer\Packer($js, 'Normal', true, false, true);
$packed_js = $packer->pack();
echo $packed_js; ?>;</script>