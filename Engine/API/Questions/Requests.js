API.Questions = {
    collection: function ()
    {
        API.request('Exams.Questions.Collection', {
            
        }, function (data) {
            $('#page').html(data.render);
        }, function () {

        });
    },

    show: function (key_question)
    {
        API.request('Exams.Questions.Show', {
            'key_question': key_question
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

        API.request('Exams.Questions.Create', {

        }, function (data) {
            API.Questions.collection();
        }, function () {

        });
    },

    remove: function (key_question)
    {
        if(!confirm('Are you sure?'))
        {
            return;
        }

        API.request('Exams.Questions.Remove', {
            'key_question': key_question
        }, function (data) {
            API.Questions.collection();
        }, function () {

        });
    },

    edit: function (key_question)
    {
        API.request('Exams.Questions.Edit', {
            'key_question': key_question
        }, function (data) {
            $('#page').html(data.render);
        }, function () {

        });
    },

    test: function (key_question)
    {
        API.request('Exams.Questions.Test', {
            'key_question': key_question
        }, function (data) {
            $('#page').html(data.render);
        }, function () {

        });
    },

    suite: function ()
    {
        API.request('Exams.Questions.Suite', {
            'tags': $('#tags').val()
        }, function (data) {
            $('#page').html(data.render);
        }, function () {

        });
    },

    save: function (key_question)
    {
        if(!confirm('Are you sure?'))
        {
            return;
        }

        const jq_block = $('#blueprint-edit');
        API.request('Exams.Questions.Save', {
            'key_question': key_question,
            'key_suite': jq_block.find('[name="key_suite"]').val(),
            'title': jq_block.find('[name="title"]').val(),
            'status': jq_block.find('[name="status"]').val(),
            'type': jq_block.find('[name="type"]').val(),
            'power': jq_block.find('[name="power"]').val(),
            'program': jq_block.find('[name="program"]').val(),
            'theory': jq_block.find('[name="theory"]').val(),
            'tags': jq_block.find('[name="tags"]').val(),
            'dt': jq_block.find('[name="dt"]').val(),
            'data': jq_block.find('[name="data"]').val()
        }, function (data) {
            API.Questions.collection();
        }, function () {

        });
    }
}