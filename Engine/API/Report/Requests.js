API.Report = {
    collection: function ()
    {
        API.request('Exams.Report.Collection', {
            
        }, function (data) {
            $('#page').html(data.render);
        }, function () {

        });
    },

    create: function (key_question, result, comment)
    {
        API.request('Exams.Report.Create', {
            key_question: key_question,
            result: result,
            comment: comment
        }, function (data) {
            API.Questions.collection();
        }, function () {

        });
    }
}