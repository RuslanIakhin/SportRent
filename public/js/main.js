$('select[name="sort"]').on('change', function() {
    
    $.get({
        url: '/category/' + $(this).attr('data-category') + '/sorting/' + $(this).val(),
        success: (res) => {
            console.log(res);
            $('div.item_cards').html(res);
        }, error: (err) => {
            console.log(err);
        }
    })
});

$(function($){
	$(".phoneInputMask").mask("+7 (999) 999-9999");
});

let ajaxForm = (t, el) => {
    el.preventDefault();

    let idForm = $(t).attr('id');

    $.ajax({
        url: $(t).attr('action'),
        type: $(t).attr('method'),
        data: $(t).serialize(),
        success: (res) => {
            if(res.status == 'success') window.location.href = res.redirect;
        }, error: (err) => {
            console.log(err);
            $('form#' + idForm + ' input').removeClass('is-invalid');
            $.each(err.responseJSON, function(index, value) {
                $('form#' + idForm + ' input[name="'+ index +'"]').addClass('is-invalid');
                $('form#' + idForm + ' span#'+ index + 'Error').text(value);
            })
        }
    })
}





// function ajaxForm(t, el) {
//     el.preventDefault();

//     let formId = $(t).attr('id');
//     let classId = $(t).attr('class');

//     $.ajax({
//         url: $(t).attr('action'),
//         type: $(t).attr('method'),
//         contentType: false,
//         processData: false,
//         data: new FormData(t),
//         success: function(res) {
//             console.log(res);
//             if(res.success == 'success') {
//                 if (formId == 'addOrder') {
//                     window.location.href = '/profile';
//                 } else {
//                     if (formId == 'addCat' || classId == 'adminChange') {
//                         window.location.href = '/superadmin';
//                     } else {
//                         window.location.href = '/';
//                     }
//                 }
//             }
//         }, error: function(res) {
//             console.log(res);
//             if (res.responseJSON['error'] == 'error') {
//                 $('form#' + formId + ' input').addClass('is-invalid');
//                 $('form#' + formId + ' div#loginError').text('');
//                 $('form#' + formId + ' div#passError').text('Неверный логин или пароль!');
//             } else {
//                 $('form#' + formId + ' input').removeClass('is-invalid');
//                 $.each(res.responseJSON, function(index, value) {
//                     $('form#' + formId + ' input#' + index + 'Input').addClass('is-invalid');
//                     $('form#' + formId + ' div#' + index + 'Error').text(value);
//                 });
//             }
//         }
//     })
// }