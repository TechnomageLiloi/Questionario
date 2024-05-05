<div id="testing-<?php echo $entity->getKey(); ?>" class="testing-card">

    <table style="width: 100%;">
        <tr>
            <td style="width: 50%;"><?php echo $entity->getParseTheory(); ?></td>
            <td style="text-align: right;">
                <video src="<?php echo $entity->getDataElement('video'); ?>" controls></video>
            </td>
        </tr>
    </table>

    <hr/>

    <input type="text" class="comment" style="width: 100%;">
    <hr/>
    <a href="javascript:void(0)" class="butn" onclick="Testing.checkDone($('#testing-<?php echo $entity->getKey(); ?>'), <?php echo $entity->getKey(); ?>, 1);" style="background-color: #f1fff1;color: green;border-color: green;">Done</a>
    <a href="javascript:void(0)" class="butn" onclick="Testing.checkDone($('#testing-<?php echo $entity->getKey(); ?>'), <?php echo $entity->getKey(); ?>, 0);">Undone</a>


</div>