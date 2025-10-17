$(window).load(function () {
  $('#loading-image').delay(50).hide();
});
$(window).unload(function () {
 $('#loading-image').show();
})


function checkForm(form) {
    document.getElementById("mydiv").style.display = "block";
    return true;
}
$(document).ready(function () {
    $("form").submit(function () {
    
        $('form').validate();
        if ($('form').valid()) {
           $('#loading-image').show();
        }
    });
});
