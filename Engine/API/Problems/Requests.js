TARDIS.Problems = {
    collection: function (uid)
    {
        API.request('TARDIS.Problems.Collection', {
            'uid': uid
        }, function (data) {
            $('#page').html(data.render);
        }, function () {

        });
    },

    show: function (key_problem)
    {
        API.request('TARDIS.Problems.Show', {
            'key_problem': key_problem
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

        API.request('TARDIS.Problems.Create', {
            'key_degree': keyDegree
        }, function (data) {
            TARDIS.Lessons.timetable();
        }, function () {

        });
    },

    remove: function (key_problem, uid)
    {
        if(!confirm('Are you sure?'))
        {
            return;
        }

        API.request('TARDIS.Problems.Remove', {
            'key_problem': key_problem
        }, function (data) {
            TARDIS.Problems.collection(uid);
        }, function () {

        });
    },

    edit: function (key_problem)
    {
        API.request('TARDIS.Problems.Edit', {
            'key_problem': key_problem
        }, function (data) {
            $('#page').html(data.render);
        }, function () {

        });
    },

    save: function (key_problem)
    {
        if(!confirm('Are you sure?'))
        {
            return;
        }

        const jq_block = $('#blueprint-edit');
        API.request('TARDIS.Problems.Save', {
            'key_problem': key_problem,
            'title': jq_block.find('[name="title"]').val(),
            'summary': jq_block.find('[name="summary"]').val(),
            'status': jq_block.find('[name="status"]').val()
        }, function (data) {
            TARDIS.Lessons.timetable();
        }, function () {

        });
    }
}