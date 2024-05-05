TARDIS.Tickets = {
    collection: function (uid)
    {
        API.request('TARDIS.Tickets.Collection', {
            'uid': uid
        }, function (data) {
            $('#page').html(data.render);
        }, function () {

        });
    },

    show: function (keyTicket)
    {
        API.request('TARDIS.Tickets.Show', {
            'key_ticket': keyTicket
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

        API.request('TARDIS.Tickets.Create', {

        }, function (data) {
            TARDIS.Lessons.timetable();
        }, function () {

        });
    },

    remove: function (keyTicket, uid)
    {
        if(!confirm('Are you sure?'))
        {
            return;
        }

        API.request('TARDIS.Tickets.Remove', {
            'key_ticket': keyTicket
        }, function (data) {
            TARDIS.Tickets.collection(uid);
        }, function () {

        });
    },

    edit: function (keyTicket)
    {
        API.request('TARDIS.Tickets.Edit', {
            'key_ticket': keyTicket
        }, function (data) {
            $('#page').html(data.render);
        }, function () {

        });
    },

    save: function (keyTicket)
    {
        if(!confirm('Are you sure?'))
        {
            return;
        }

        const jq_block = $('#blueprint-edit');
        API.request('TARDIS.Tickets.Save', {
            'key_ticket': keyTicket,
            'title': jq_block.find('[name="title"]').val(),
            'start': jq_block.find('[name="start"]').val(),
            'finish': jq_block.find('[name="finish"]').val(),
            'power': jq_block.find('[name="power"]').val()
        }, function (data) {
            TARDIS.Lessons.timetable();
        }, function () {

        });
    }
}