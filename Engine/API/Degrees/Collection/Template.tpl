<link href="<?php echo ROOT_URL; ?>/Engine/API/Degrees/Collection/Style.css" rel="stylesheet" />
<div id="degrees-collection">
    <a href="javascript:void(0)" class="butn" onclick="TARDIS.Degrees.create();">Create</a>
    <?php if($collection->count()): ?>
        <hr/>
        <table>
            <tr>
                <th>Title</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
            <?php foreach($collection as $entity): ?>
                <tr>
                    <td>
                        <?php echo $entity->getTitle(); ?>
                    </td>
                    <td>
                        <?php echo $entity->getStatusCaption(); ?>
                    </td>
                    <td>
                        <a href="javascript:void(0)" class="butn" onclick="TARDIS.Problems.collection('<?php echo $entity->getUid(); ?>')">Problems list</a>
                        <a href="javascript:void(0)" class="butn" onclick="TARDIS.Degrees.show('<?php echo $entity->getUid(); ?>');">Show</a>
                        <a href="javascript:void(0)" class="butn" onclick="TARDIS.Degrees.edit('<?php echo $entity->getUid(); ?>');">Edit</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
    <?php endif; ?>
</div>