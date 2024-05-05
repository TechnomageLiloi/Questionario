<link href="<?php echo ROOT_URL; ?>/Source/API/Questions/Test/Style.css" rel="stylesheet" />
<div id="testing-<?php echo $entity->getKey(); ?>" class="testing-check">

    <div class="question">
        <div class="theory" style="display: none;">
            <?php echo $entity->getParseTheory(); ?>
        </div>
        <a href="javascript:void(0)" onclick="$(this).parent().find('.theory').toggle();">Theory</a>
        <a href="javascript:void(0)" onclick="Testing.checkCheck('<?php echo $entity->getKey(); ?>');">Check</a>
        <hr/>
        <?php echo $entity->getElement('question'); ?>
    </div>

    <div class="answer">
        <hr/>
        <?php $answers = $entity->getElement('answers'); ?>
        <?php shuffle($answers); ?>
        <?php foreach($answers as $answer): ?>
            <input type="checkbox" name="check-<?php echo $entity->checkCheck(); ?>" data-correct="<?php echo $answer['correct'] ?? ''; ?>">

            <?php $ans = $answer['answer']; ?>

            <?php if($answer['anagram'] ?? false): ?>
                <?php
                    $ans = preg_split("//u", $ans, null, PREG_SPLIT_NO_EMPTY);
                    shuffle($ans);
                    $ans = join('', $ans);
                ?>
            <?php endif; ?>

            <?php echo $ans; ?>
            <br/>
        <?php endforeach; ?>
    </div>
</div>