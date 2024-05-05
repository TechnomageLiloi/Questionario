<style>
    #problem-group table
    {
        width: 100%;
    }

    #problem-group table td
    {
        border-bottom: silver 1px dashed;
        padding-bottom: 5px;
    }

    #problem-group table tr:hover
    {
        background-color: #e5ffe0;
    }

</style>
<div id="problem-group">

    <div>
        <h3>
            <a href="javascript:void(0)" onclick="Rune.Suites.edit('<?php echo $suite->getKey(); ?>');" class="butn">Edit</a>
            <?php echo $suite->getTitle(); ?>
        </h3>
        <ol>
            <?php foreach($subsuites as $subs): ?>
                <li>
                    <a href="<?php echo $subs->getLink(); ?>"><?php echo $subs->getTitle(); ?></a>
                </li>
            <?php endforeach; ?>
        </ol>
        <?php echo $suite->getSummaryParse(); ?>
    </div>

    <hr/>

    <table>
        <tr>
            <th>Title</th>
            <th>Tags</th>
            <th>Type</th>
            <th>Status</th>
            <th style="text-align: right;">Actions</th>
        </tr>
        <?php foreach($collection as $entity): ?>
        <tr>
            <td><?php echo $entity->getTitle(); ?></td>
            <td><?php echo $entity->getTags(); ?></td>
            <td><?php echo $entity->getTypeTitle(); ?></td>
            <td><?php echo $entity->getStatusTitle(); ?></td>
            <td style="text-align: right; width: 300px;">
                <a href="javascript:void(0)" onclick="API.Questions.test('<?php echo $entity->getKey(); ?>');" class="butn">Test</a>
                <a href="javascript:void(0)" onclick="API.Questions.edit('<?php echo $entity->getKey(); ?>');" class="butn">Edit</a>
                <a href="javascript:void(0)" onclick="API.Questions.remove('<?php echo $entity->getKey(); ?>');" class="butn">Make obsolete</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
</div>