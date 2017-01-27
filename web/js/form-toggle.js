$("#add-user-toggle").click(function(e){
    e.preventDefault();

    $("#add-user-form").slideToggle();
});

$("#add-book-toggle").click(function(e){
    e.preventDefault();

    $("#add-book-form").slideToggle();
});


$('button[data-toggle]').on('click', function(evt) {
    evt.preventDefault();
    $("#add-book-form-" + $(this).data('toggle')).slideToggle();
});
