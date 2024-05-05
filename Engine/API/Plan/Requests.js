TARDIS.Plan = {
    show: function ()
    {
        API.request('TARDIS.Plan.Show', {

        }, function (data) {
            $('#page').html(data.render);
        }, function () {

        });
    }
}