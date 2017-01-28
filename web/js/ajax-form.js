// var m = {
//     modalClass: '.modal',
//     modalBody: '.modal-body',
//     modalHeaderClass: '.modal-header-content',
//     modalHeaderTitle: 'Window',
//     pjaxContainer: '#app-pjax-container',
//     modalDisplay: function(e) {
//         var href = jQuery(this).attr('href');

//         jQuery(m.modalHeaderClass).text(m.modalHeaderTitle);
//         jQuery(m.modalClass).modal('show').find(m.modalBody).load(href);

//         return false;
//     },
//     modalClose: function(e) {
//         jQuery(m.modalClass).modal('hide');
//     },
//     modalSubmit: function(e) {
//         var form = jQuery(this);

//         jQuery.ajax({
//             url: form.attr('action'),
//             type: 'post',
//             data: form.serialize(),
//             success: function(r) {
//                 m.modalClose();

//                 if (r.result == 'success') {
//                     m.pjaxReload();
//                 }
//             },
//         });

//         return false;
//     },
//     pjaxReload: function() {
//         jQuery.pjax.reload({ container: m.pjaxContainer });
//     },
// };

// jQuery(document).on('beforeSubmit', '#app-form', m.modalSubmit);

$(document).ready(function() {

    $('body').on('beforeSubmit', '#save-user', function () {
        var form = $(this);
        // return false if form still have some validation errors
        // if (form.find('.has-error').length) {
        //     return false;
        // }
        // submit form
        $.ajax({
            url: form.attr('action'),
            type: 'post',
            data: form.serialize(),
            success: function (response) {
                // do something with response
                // print(123);
            }
        });
        return false;
    });
});