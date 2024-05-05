Rune.Suites = {
    edit: function (key_suite)
    {
        API.request('Rune.Suites.Edit', {
            'key_suite': key_suite
        }, function (data) {
            $('#page').html(data.render);
        }, function () {

        });
    },

    save: function (key_suite)
    {
        if(!confirm('Are you sure?'))
        {
            return;
        }

        const jq_block = $('#blueprint-edit');
        API.request('Rune.Suites.Save', {
            'key_suite': key_suite,
            'title': jq_block.find('[name="title"]').val(),
            'summary': jq_block.find('[name="summary"]').val()
        }, function (data) {
            API.Questions.collection();
        }, function () {

        });
    }
}