/**
 * Toast message
 */
$(function() {
    setTimeout(function() {
        if ($('.ui.toast.message').is(':visible')) {      
            $('.ui.toast.message').transition('slide up'); 
        }
            
    }, 5000); 
});


/**
 * Modal comfirmation
 * @param message
 * @param callback
 */
function confirmation(message, callback) {
    $('#modal-confirm .content').html("<strong>" + message + "</strong>");
    $('#modal-confirm').modal({
        onApprove: callback
    }).modal('show');
}

function submit(formId){
    $("#" + formId).submit();
}

function confirmFormSubmit(message, formId) {
    $('#modal-confirm .content').html("<strong>" + message + "</strong>");
    $('#modal-confirm').modal({
        onApprove: function() {
            $("#" + formId).submit();
        }
    }).modal('show');
}

/**
 * Dropdown menu
 */
$('.ui.dropdown').dropdown();

/**
 * Sticky content
 */
$('.ui.sticky').sticky();


/**
 * Accordion
 */
$('.ui.accordion').accordion();
$('.accordion.menu').accordion();

/**
 * Dismissable Message
 */
$('.ui.message .close').click(function () {
    $(this).closest('.message').transition('slide');
});
$('.ui.toast.message').click(function () {
    $(this).transition('slide up');
});