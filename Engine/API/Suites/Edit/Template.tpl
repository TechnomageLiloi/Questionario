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
    <a href="javascript:void(0)" onclick="Rune.Suites.save('<?php echo $entity->getKey(); ?>');">Save</a>
    <hr/>
    <table style="width: 100%;">
        <tr>
            <th>Name</th>
            <th>Value</th>
        </tr>

        <tr><td>Title</td><td><input type="text" name="title" value="<?php echo $entity->getTitle(); ?>"/></td></tr>

        <tr><td>Summary</td><td><textarea name="summary"><?php echo $entity->getSummary(); ?></textarea></td></tr>

    </table>
    <hr/>
    <a href="javascript:void(0)" onclick="Rune.Suites.save('<?php echo $entity->getKey(); ?>');">Save</a>
</div>