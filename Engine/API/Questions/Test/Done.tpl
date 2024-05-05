<div id="testing-<?php echo $entity->getKey(); ?>" class="testing-card">
    <?php echo $entity->getParseTheory(); ?>
    <hr/>

    <input type="text" class="comment" style="width: 100%;">
    <hr/>
    <a href="javascript:void(0)" class="butn" onclick="Testing.checkDone($('#testing-<?php echo $entity->getKey(); ?>'), <?php echo $entity->getKey(); ?>, 1);" style="background-color: #f1fff1;color: green;border-color: green;">Done</a>
    <a href="javascript:void(0)" class="butn" onclick="Testing.checkDone($('#testing-<?php echo $entity->getKey(); ?>'), <?php echo $entity->getKey(); ?>, 0);">Undone</a>


</div>