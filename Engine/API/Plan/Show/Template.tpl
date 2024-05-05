<link href="<?php echo ROOT_URL; ?>/Engine/API/Plan/Show/Style.css" rel="stylesheet" />
<div id="plan-show" class="stylo">
    <h1 id="plan" class="wrap-title">
        Dissertation
    </h1>
    <?php if($degrees->count()): ?>
        <h2 class="wrap-title" id="menu">
            0. Menu
        </h2>

        <ul style="list-style-type: none;">
        <?php foreach($degrees as $entity): ?>
            <li>
                <a href="#<?php echo $entity->getUid(); ?>">Degree <?php echo $entity->getKey(); ?>. <?php echo $entity->getTitle(); ?></a>
            </li>
        <?php endforeach; ?>
        </ul>

        <?php foreach($degrees as $entity): ?>

            <?php $keyDegree = $entity->getKey(); ?>

            <h2 id="<?php echo $entity->getUid(); ?>" class="wrap-title">
                <?php echo $keyDegree; ?>. <?php echo $entity->getTitle(); ?>
            </h2>

            <?php echo $entity->parseProgram(); ?>

            <?php $i = 0; ?>
            <?php foreach($problems as $problem): ?>
                <?php if($keyDegree != $problem->getKeyDegree()) continue; ?>

                <h3>
                    <?php echo $keyDegree; ?>.<?php echo $i; ?>. <?php echo $problem->getTitle(); ?>
                </h3>

                <?php echo $problem->parseSummary(); ?>

                <?php ++$i; ?>
            <?php endforeach; ?>

            <a href="#menu">&larr; Back to menu</a>
        <?php endforeach; ?>
    <?php endif; ?>
</div>