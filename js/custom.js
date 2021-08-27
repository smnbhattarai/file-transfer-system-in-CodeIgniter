// Autoclose alerts and messages
$(document).ready(function () {
    window.setTimeout(function() {
        $(".alert").fadeTo(1000, 0).slideUp(1000, function(){
            $(this).remove(); 
        });
    }, 6000);
});


// Add active class to menu
var url = window.location;
$('ul.nav a[href="'+ url +'"]').parent().addClass('active');
$('ul.nav a').filter(function() {
    return this.href == url;
}).parent().addClass('active');


// Start of office detail inline editing
$.fn.editable.defaults.mode = 'popup';
    $(document).ready(function() {
        $('.off-name').editable({
            url: 'edit-office'
        });
    });
    
    
    
// Add sctive class to sidebar menu 
var url = window.location;
$('ul.list-group a[href="'+ url +'"]').parent().addClass('active');

$('ul.list-group a').filter(function() {
    return this.href == url;
}).parent().addClass('active');
$('ul.list-group a').filter(function() {
    return this.href == url;
}).css("color", "#fff");