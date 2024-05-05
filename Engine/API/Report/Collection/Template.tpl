<style>
    #problem-group table
    {
        width: 100%;
    }

    #problem-group table td
    {
        padding-bottom: 5px;
    }

    #problem-group table tr:hover
    {
        background-color: white;
    }

    #problem-group table .done
    {
        background-color: #aeffae;
    }

    #problem-group table .undone
    {
        background-color: #ffd0d0;
    }
</style>
<div id="problem-group">
    <table>
        <tr>
            <th>Timestamp</th>
            <th>Comment</th>
            <th>Data</th>
            <th style="text-align: right;">Actions</th>
        </tr>
        <?php foreach($collection as $entity): ?>
        <tr class="<?php echo $entity->getClass(); ?>">
            <td style="width: 10%;"><?php echo $entity->getTimestamp(); ?></td>
            <td><?php echo $entity->getComment(); ?></td>
            <td><?php echo $entity->getData(); ?></td>
            <td style="text-align: right; width: 300px;">

            </td>
        </tr>
        <?php endforeach; ?>
    </table>
</div>