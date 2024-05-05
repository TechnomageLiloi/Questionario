<a href="javascript:void(0)" onclick="TARDIS.Lessons.edit('<?php echo $entity->getUid(); ?>')">Edit</a>
<div id="blueprint-show">
    <h1><?php echo $entity->getTitle(); ?></h1>
    <hr/>
    <?php echo $entity->getParse(); ?>
</div>