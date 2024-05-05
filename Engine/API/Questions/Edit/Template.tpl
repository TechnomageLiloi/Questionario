<style>
    #blueprint-edit input,
    #blueprint-edit select,
    #blueprint-edit textarea
    {
        width: 50%;
    }

    #blueprint-edit textarea
    {
        height: 300px;
    }
</style>
<div id="blueprint-edit">
    <a href="javascript:void(0)" onclick="API.Questions.save('<?php echo $entity->getKey(); ?>');">Save</a>
    <hr/>
    <table style="width: 100%;">
        <tr>
            <th>Name</th>
            <th>Value</th>
        </tr>

        <tr><td>Suite</td><td><input type="text" name="key_suite" value="<?php echo $entity->getKeySuite(); ?>"/></td></tr>
        <tr><td>Title</td><td><input type="text" name="title" value="<?php echo $entity->getTitle(); ?>"/></td></tr>
        <tr><td>Tags</td><td><input type="text" name="tags" value="<?php echo $entity->getTags(); ?>"/></td></tr>
        <tr><td>Timestamp</td><td><input type="text" name="dt" value="<?php echo $entity->getDt(); ?>"/></td></tr>

        <tr><td>Status</td><td>
            <select name="status">
                <?php foreach($statuses as $key => $value): ?>
                <option value="<?php echo $key; ?>" <?php if($entity->getStatus() == $key): ?>selected="selected"<?php endif; ?>><?php echo $value; ?></option>
                <?php endforeach; ?>
            </select>
        </td></tr>

        <tr><td>Type</td><td>
            <select name="type">
                <?php foreach($types as $key => $value): ?>
                <option value="<?php echo $key; ?>" <?php if($entity->getType() == $key): ?>selected="selected"<?php endif; ?>><?php echo $value; ?></option>
                <?php endforeach; ?>
            </select>
        </td></tr>

        <tr><td>Power</td><td>
            <select name="power">
                <?php foreach($powers as $key => $value): ?>
                <option value="<?php echo $key; ?>" <?php if($entity->getPower() == $key): ?>selected="selected"<?php endif; ?>><?php echo $value; ?></option>
                <?php endforeach; ?>
            </select>
        </td></tr>

        <tr><td>Program</td><td><textarea name="program"><?php echo $entity->getProgram(); ?></textarea></td></tr>
        <tr><td>Theory</td><td><textarea name="theory"><?php echo $entity->getTheory(); ?></textarea></td></tr>
        <tr><td>Data</td><td><textarea name="data"><?php echo $entity->getData(); ?></textarea></td></tr>

    </table>
    <hr/>
    <a href="javascript:void(0)" onclick="API.Questions.save('<?php echo $entity->getKey(); ?>');">Save</a>
</div>