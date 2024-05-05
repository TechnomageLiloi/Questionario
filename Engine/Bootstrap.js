Rune.Trigger = {
    initialize: function ()
    {
        $('.stylo-block').hide();
        // Stylo.Trigger.List = [];
        Stylo.Trigger.add(function (data, a) {
            $('.stylo-block').hide();
            $('#' + data).show();
        });
        Stylo.Trigger.initialize();
        $('.stylo-block:eq(0)').show();
    }
};

Rune.Types = {
    Frame: {
        show: function (link)
        {
            // alert(link);
            $('#atoms-show').html('<iframe width="100%" height="500px;" src="' + link + '">');
        }
    }
};