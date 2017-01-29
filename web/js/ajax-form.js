$(document).ready(function() {

    $('body').on('beforeSubmit', 'form.save-user', function () {
        var form = $(this);
        // return false if form still have some validation errors
        if (form.find('.has-error').length) {
            $('<p class="bg-danger">Sorry, An error has been happened</p>').appendTo('#view-response');
            console.log("server error");
        }

        // submit form
        $.ajax({
            url: form.attr('action'),
            type: 'post',
            data: form.serialize(),
            success: function (response) {
                $('<p class="bg-success" align="center">User has been Added </p>').appendTo('#view-response');
            }
        });

        return false;
    });
});

$(document).ready(function() {

    // $('body').on('beforeSubmit', 'form#lend-book', function () {
    $('body').on('beforeSubmit', 'form.lend-book', function () {
        var form = $(this);
        // return false if form still have some validation errors
        if (form.find('.has-error').length) {
            $('<p class="bg-danger">Sorry, An error has been happened</p>').appendTo('#view-response');
            console.log("server error");
        }

        // submit form
        $.ajax({
            url: form.attr('action'),
            type: 'post',
            data: form.serialize(),
            success: function (response) {
                 $('<p class="bg-success" align="center">Book has been lent </p>').appendTo('#view-response');
            }
        });

        return false;
    });
});

