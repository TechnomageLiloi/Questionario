TARDIS.Lessons = {
    timetable: function ()
    {
        API.request('TARDIS.Lessons.Timetable', {

        }, function (data) {
            $('#page').html(data.render);
        }, function () {

        });
    },

    update: function (key_lesson)
    {
        API.request('TARDIS.Lessons.Update', {
            'key_lesson': key_lesson
        }, function (data) {
            TARDIS.Lessons.timetable();
        }, function () {

        });
    },

    schedule: function (date_now)
    {
        API.request('TARDIS.Lessons.Schedule', {
            'date_now': date_now
        }, function (data) {
            $('#page').html(data.render);
        }, function () {

        });
    },

    collection: function (key_problem)
    {
        API.request('TARDIS.Lessons.Collection', {
            'key_problem': key_problem
        }, function (data) {
            $('#page').html(data.render);
        }, function () {

        });
    },

    show: function ()
    {
        const jq_block = $('#problem-group');

        API.request('TARDIS.Lessons.Show', {
            'key_date': jq_block.find('[name="key_date"]').val(),
            'key_position': jq_block.find('[name="key_position"]').val()
        }, function (data) {
            TARDIS.Lessons.timetable();
        }, function () {

        });
    },

    create: function ()
    {
        if(!confirm('Are you sure?'))
        {
            return;
        }

        API.request('TARDIS.Lessons.Create', {

        }, function (data) {
            TARDIS.Application.Diary.show('now');
        }, function () {

        });
    },

    /**
     * @deprecated
     * @param keyLesson
     */
    calculate: function (keyLesson)
    {
        API.request('TARDIS.Lessons.Calculate', {
            'key_lesson': keyLesson
        }, function (data) {
            TARDIS.Lessons.timetable();
        }, function () {

        });
    },

    remove: function (key_lesson, key_problem)
    {
        if(!confirm('Are you sure?'))
        {
            return;
        }

        API.request('TARDIS.Lessons.Remove', {
            'key_lesson': key_lesson
        }, function (data) {
            TARDIS.Lessons.collection(key_problem);
        }, function () {

        });
    },

    edit: function ()
    {
        const jq_block = $('#problem-group');
        API.request('TARDIS.Lessons.Edit', {
            'key_date': jq_block.find('[name="key_date"]').val(),
            'key_position': jq_block.find('[name="key_position"]').val()
        }, function (data) {
            $('#page').html(data.render);
        }, function () {

        });
    },

    save: function (key_date, key_position)
    {
        if(!confirm('Are you sure?'))
        {
            return;
        }

        const jq_block = $('#blueprint-edit');
        API.request('TARDIS.Lessons.Save', {
            'key_date': key_date,
            'key_position': key_position,
            'degree': jq_block.find('[name="degree"]').val(),
            'comment': jq_block.find('[name="comment"]').val(),
            'mark': jq_block.find('[name="mark"]').val(),
            'status': jq_block.find('[name="status"]').val(),
            'start': jq_block.find('[name="start"]').val(),
            'finish': jq_block.find('[name="finish"]').val(),
            'type': jq_block.find('[name="type"]').val(),
            'data': jq_block.find('[name="data"]').val()
        }, function (data) {
            TARDIS.Lessons.timetable();
        }, function () {

        });
    }
}