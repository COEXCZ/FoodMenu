<?php
/**
 * @package workshops
 * @subpackage build
 */
function getChunkContent($filename) {
    $o = file_get_contents($filename);
    $o = trim(str_replace(array('<?php','?>'),'',$o));
    return $o;
}
$chunks = array();

/* course chunks */
$chunks[1]= $modx->newObject('modChunk');
$chunks[1]->fromArray(array(
    'id' => 1,
    'name' => 'Category',
    'description' => '',
    'snippet' => getChunkContent($sources['chunks'].'category.chunk.tpl'),
),'',true,true);

$chunks[2]= $modx->newObject('modChunk');
$chunks[2]->fromArray(array(
    'id' => 2,
    'name' => 'Dish',
    'description' => '',
    'snippet' => getChunkContent($sources['chunks'].'dish.chunk.tpl'),
),'',true,true);

return $chunks;
