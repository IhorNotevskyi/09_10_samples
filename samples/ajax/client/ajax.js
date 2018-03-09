(function () {
    var _body = $('body');
    var form = _body.find('form');
    var result = _body.find('.result');

    form.on('submit', function () {
        var action = $(this).attr('action');
        var data = $(this).serialize();

        $.ajax({
            url: action,
            async: true,
            data: data,
            type: 'post',
            dataType: 'json',
            success: function (answer) {
                result.html(answer['data']);
                if (answer['status'] == 'ok') {
                    result.removeClass('error').addClass('success');
                } else {
                    result.removeClass('success').addClass('error');
                }
            }
        });

        return false;
    });
})();