TARDIS.Horcruxes = {
    collection: function (uid)
    {
        API.request('TARDIS.Horcruxes.Collection', {
            'uid': uid
        }, function (data) {
            $('#page').html(data.render);
        }, function () {

        });
    },

    show: function (key_horcrux)
    {
        API.request('TARDIS.Horcruxes.Show', {
            'key_horcrux': key_horcrux
        }, function (data) {
            $('#page').html(data.render);
        }, function () {

        });
    },

    create: function (keyDegree)
    {
        if(!confirm('Are you sure?'))
        {
            return;
        }

        API.request('TARDIS.Horcruxes.Create', {
            'key_degree': keyDegree
        }, function (data) {
            TARDIS.Lessons.timetable();
        }, function () {

        });
    },

    remove: function (key_horcrux, uid)
    {
        if(!confirm('Are you sure?'))
        {
            return;
        }

        API.request('TARDIS.Horcruxes.Remove', {
            'key_horcrux': key_horcrux
        }, function (data) {
            TARDIS.Horcruxes.collection(uid);
        }, function () {

        });
    },

    edit: function (key_horcrux)
    {
        API.request('TARDIS.Horcruxes.Edit', {
            'key_horcrux': key_horcrux
        }, function (data) {
            $('#page').html(data.render);
        }, function () {

        });
    },

    save: function (key_horcrux)
    {
        if(!confirm('Are you sure?'))
        {
            return;
        }

        const jq_block = $('#blueprint-edit');
        API.request('TARDIS.Horcruxes.Save', {
            'key_horcrux': key_horcrux,
            'title': jq_block.find('[name="title"]').val(),
            'summary': jq_block.find('[name="summary"]').val(),
        }, function (data) {
            TARDIS.Lessons.timetable();
        }, function () {

        });
    },

    done: function (key_horcrux, status)
    {
        if(!confirm('Are you sure?'))
        {
            return;
        }

        const jq_block = $('#blueprint-edit');
        API.request('TARDIS.Horcruxes.Done', {
            'key_horcrux': key_horcrux,
            'status': status
        }, function (data) {
            TARDIS.Lessons.timetable();
        }, function () {

        });
    }
}