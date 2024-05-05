<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Rune Global Tests Manager</title>

    <link rel="shortcut icon" type="image/png" href="/Tests/Jasmine/jasmine_favicon.png">
    <link rel="stylesheet" href="/Tests/Jasmine/jasmine.css">

    <script src="/Tests/Jasmine/jasmine.js"></script>
    <script src="/Tests/Jasmine/jasmine-html.js"></script>
    <script src="/Tests/Jasmine/boot0.js"></script>
    <script src="/Tests/Jasmine/boot1.js"></script>

    <!-- include spec files here... -->
    <script src="/Tests/CheckTest.js"></script>

    <!-- Nest: Interstate60 -->
    <script src="/Admin/Interstate60/Tests/CheckTest.js"></script>
    <script src="/Admin/Interstate60/Tests/I60Test.js"></script>

    <script src="/Admin/Interstate60/Engine/API/Requests.js"></script>
    <script src="/Admin/Interstate60/Engine/API/Application/Requests.js"></script>

</head>

<div style="background-color: black; color: white;padding: 5px;margin: 0px;">
    <?php echo str_replace("\n", "<br/>", shell_exec('phpunit')); ?>
</div>

<hr/>

<body>
</body>
</html>
