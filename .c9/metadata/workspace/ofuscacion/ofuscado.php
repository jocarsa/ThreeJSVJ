{"filter":false,"title":"ofuscado.php","tooltip":"/ofuscacion/ofuscado.php","undoManager":{"mark":14,"position":14,"stack":[[{"start":{"row":0,"column":0},"end":{"row":6,"column":29},"action":"insert","lines":["<script><?php","require '../src/Packer.php';","error_reporting(E_ALL);","$js = file_get_contents(__DIR__ . '/' . 'test.js');","$packer = new Tholu\\Packer\\Packer($js, 'Normal', true, false, true);","$packed_js = $packer->pack();","echo $packed_js; ?>;</script>"],"id":1}],[{"start":{"row":1,"column":15},"end":{"row":1,"column":16},"action":"remove","lines":["/"],"id":2}],[{"start":{"row":1,"column":14},"end":{"row":1,"column":15},"action":"remove","lines":["c"],"id":3}],[{"start":{"row":1,"column":13},"end":{"row":1,"column":14},"action":"remove","lines":["r"],"id":4}],[{"start":{"row":1,"column":12},"end":{"row":1,"column":13},"action":"remove","lines":["s"],"id":5}],[{"start":{"row":1,"column":11},"end":{"row":1,"column":12},"action":"remove","lines":["/"],"id":6}],[{"start":{"row":1,"column":10},"end":{"row":1,"column":11},"action":"remove","lines":["."],"id":7}],[{"start":{"row":1,"column":9},"end":{"row":1,"column":10},"action":"remove","lines":["."],"id":8}],[{"start":{"row":3,"column":41},"end":{"row":3,"column":45},"action":"remove","lines":["test"],"id":9},{"start":{"row":3,"column":41},"end":{"row":3,"column":42},"action":"insert","lines":["s"]}],[{"start":{"row":3,"column":42},"end":{"row":3,"column":43},"action":"insert","lines":["c"],"id":10}],[{"start":{"row":3,"column":43},"end":{"row":3,"column":44},"action":"insert","lines":["r"],"id":11}],[{"start":{"row":3,"column":44},"end":{"row":3,"column":45},"action":"insert","lines":["i"],"id":12}],[{"start":{"row":3,"column":45},"end":{"row":3,"column":46},"action":"insert","lines":["p"],"id":13}],[{"start":{"row":3,"column":46},"end":{"row":3,"column":47},"action":"insert","lines":["t"],"id":14}],[{"start":{"row":0,"column":8},"end":{"row":1,"column":0},"action":"insert","lines":["",""],"id":15}]]},"ace":{"folds":[],"scrolltop":0,"scrollleft":0,"selection":{"start":{"row":0,"column":0},"end":{"row":7,"column":29},"isBackwards":true},"options":{"guessTabSize":true,"useWrapMode":false,"wrapToView":true},"firstLineState":0},"timestamp":1491839700784,"hash":"a1fc560868053caa47e5c01b3aba60e49c0e0e98"}