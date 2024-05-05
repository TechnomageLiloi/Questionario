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
    <a href="javascript:void(0)" onclick="TARDIS.Tickets.save('<?php echo $entity->getKey(); ?>');">Save</a>
    <hr/>
    <table style="width: 100%;">
        <tr>
            <th>Name</th>
            <th>Value</th>
        </tr>

        <tr><td>Title</td><td><input type="text" name="title" value="<?php echo $entity->getTitle(); ?>"/></td></tr>

        <tr>
            <td>Start</td>
            <td>
                <input type="text" name="start" value="<?php echo $entity->getStart(); ?>"/>
                <a class="butn" href="javascript:void(0)" onclick="$('#blueprint-edit [name=start]').val('0000-00-00 00:00:00');">ToDo</a>
                <a class="butn" href="javascript:void(0)" onclick="$('#blueprint-edit [name=start]').val('<?php echo date('Y-m-d H:i:s'); ?>');">Now</a>
            </td>
        </tr>

        <tr>
            <td>Finish</td>
            <td>
                <input type="text" name="finish" value="<?php echo $entity->getFinish(); ?>"/>
                <a class="butn" href="javascript:void(0)" onclick="$('#blueprint-edit [name=finish]').val('0000-00-00 00:00:00');">ToDo</a>
                <a class="butn" href="javascript:void(0)" onclick="$('#blueprint-edit [name=finish]').val('<?php echo date('Y-m-d H:i:s'); ?>');">Now</a>
            </td>
        </tr>

        <tr><td>Power</td><td>
            <input type="text" name="power" value="<?php echo $entity->getPower(); ?>"/>
        </td></tr>
    </table>
    <hr/>
    <a href="javascript:void(0)" onclick="TARDIS.Tickets.save('<?php echo $entity->getKey(); ?>');">Save</a>
</div>