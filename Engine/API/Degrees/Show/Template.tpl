<div id="blueprint-show">
    <h1><?php echo $entity->getTitle(); ?></h1>
    <hr/>
    <a href="javascript:void(0)" onclick="TARDIS.Degrees.getCollection();">&blacktriangleleft; Back</a> &diams;
    <a href="javascript:void(0)" onclick="TARDIS.Degrees.edit('<?php echo $entity->getUid(); ?>')">Edit</a> &diams;
    <a href="javascript:void(0)" onclick="TARDIS.Problems.collection('<?php echo $entity->getUid(); ?>')">Problems list</a>
    <hr/>
    <?php echo $entity->getParse(); ?>
</div>