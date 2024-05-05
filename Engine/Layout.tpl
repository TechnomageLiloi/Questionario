<!DOCTYPE html>
<html lang="en">
    <head>
        <link rel="shortcut icon" type="image/png" href="/Signum.png">

        <!-- @todo: add function to link scripts and styles -->
        <script src="<?php echo ROOT_URL; ?>/vendor/technomage-liloi/rune-framework/Frontside/Library/Jquery.min.js"></script>
        <script src="<?php echo ROOT_URL; ?>/vendor/technomage-liloi/rune-framework/Frontside/Library/Underscore.min.js"></script>
        <script src="<?php echo ROOT_URL; ?>/vendor/technomage-liloi/rune-framework/Frontside/Library/Backbone.min.js"></script>
        <script src="<?php echo ROOT_URL; ?>/vendor/technomage-liloi/rune-api/Client/API.js"></script>
        <script src="<?php echo ROOT_URL; ?>/vendor/technomage-liloi/stylo/Source/Stylo.js"></script>

        <link href="<?php echo ROOT_URL; ?>/Engine/Style.css" rel="stylesheet" />
        <link href="<?php echo ROOT_URL; ?>/Engine/API/Style.css" rel="stylesheet" />

        <script src="<?php echo ROOT_URL; ?>/Engine/API/Requests.js"></script>
        <script src="<?php echo ROOT_URL; ?>/Engine/Bootstrap.js"></script>

        <script src="<?php echo ROOT_URL; ?>/Engine/API/Questions/Requests.js"></script>
        <script src="<?php echo ROOT_URL; ?>/Engine/API/Questions/Test/Testing.js"></script>
        <script src="<?php echo ROOT_URL; ?>/Engine/API/Report/Requests.js"></script>
        <script src="<?php echo ROOT_URL; ?>/Engine/API/Suites/Requests.js"></script>

        <script src="<?php echo ROOT_URL; ?>/Engine/API/Degrees/Requests.js"></script>
        <script src="<?php echo ROOT_URL; ?>/Engine/API/Lessons/Requests.js"></script>
        <script src="<?php echo ROOT_URL; ?>/Engine/API/Problems/Requests.js"></script>
        <script src="<?php echo ROOT_URL; ?>/Engine/API/Tickets/Requests.js"></script>
        <script src="<?php echo ROOT_URL; ?>/Engine/API/Plan/Requests.js"></script>
        <script src="<?php echo ROOT_URL; ?>/Engine/API/Quests/Requests.js"></script>
        <script src="<?php echo ROOT_URL; ?>/Engine/API/Horcruxes/Requests.js"></script>

        <title>Rune</title>
    </head>
    <body>
        <div id="head">
            <a href="javascript:void(0)" onclick="API.Questions.collection();" class="butn">Questions</a>
            <a href="javascript:void(0)" onclick="API.Questions.create();" class="butn">Create</a>
            <input type="text" id="tags" value="">
            <a href="javascript:void(0)" onclick="API.Questions.suite();" class="butn">Suite-test</a>
            <a href="javascript:void(0)" onclick="API.Report.collection();" class="butn">Report</a>
        </div>
        <div id="page">
            <script>
                API.Questions.collection();
            </script>
        </div>
    </body>
</html>