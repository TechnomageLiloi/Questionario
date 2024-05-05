TARDIS.Degrees = {
    getCollection: function ()
    {
        API.request('TARDIS.Degrees.Collection', {

        }, function (data) {
            $('#page').html(data.render);
        }, function () {

        });
    },

    show: function (uid)
    {
        API.request('TARDIS.Degrees.Show', {
            'uid': uid
        }, function (data) {
            $('#page').html(data.render);
        }, function () {

        });
    },

    create: function ()
    {
        if(!confirm('Are you sure?'))
        {
            return;
        }

        API.request('TARDIS.Degrees.Create', {

        }, function (data) {
            TARDIS.Degrees.getCollection();
        }, function () {

        });
    },

    remove: function (uid)
    {
        if(!confirm('Are you sure?'))
        {
            return;
        }

        API.request('TARDIS.Degrees.Remove', {
            'uid': uid
        }, function (data) {
            API.Blueprints.show('root');
        }, function () {

        });
    },

    edit: function (uid)
    {
        API.request('TARDIS.Degrees.Edit', {
            'uid': uid
        }, function (data) {
            $('#page').html(data.render);
        }, function () {

        });
    },

    save: function (key, apply)
    {
        if(!confirm('Are you sure?'))
        {
            return;
        }

        if(typeof apply === 'undefined')
        {
            apply = false;
        }

        const jq_block = $('#blueprint-edit');
        API.request('TARDIS.Degrees.Save', {
            'key': key,
            'uid': jq_block.find('[name="uid"]').val(),
            'title': jq_block.find('[name="title"]').val(),
            'program': jq_block.find('[name="program"]').val(),
            'status': jq_block.find('[name="status"]').val()
        }, function (data) {
            if(!apply)
            {
                TARDIS.Degrees.show(jq_block.find('[name="uid"]').val());
                return;
            }

            alert('Degree saved.');
        }, function () {

        });
    }
}