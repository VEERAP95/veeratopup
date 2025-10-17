$(document).ready(function () {
    toastr.options.timeOut = 3000; // 1.5s
    // show when page load
    // toastr.info('Page Loaded!');

    //$('#BtnAlert').click(function () {
    //     show when the button is clicked
    //    toastr.success('Click Button');
    // var ss = 'Hello...';
    //    ToastrSuccess(ss);
    //    ToastrError(ss);

    //});

});

function ToastrSuccess(msg) {
    toastr.remove();
    toastr.success(msg);
    toastr.options.showEasing = 'swing';
    toastr.options.showMethod = 'slideDown';
    toastr.options.hideMethod = 'slideUp';
    toastr.options.progressBar = true;
    toastr.options.closeButton = true;
}
function ToastrInfo(msg) {
    toastr.remove();
    toastr.info(msg);
    toastr.options.showEasing = 'swing';
    toastr.options.showMethod = 'slideDown';
    toastr.options.hideMethod = 'slideUp';
    toastr.options.progressBar = true;
    toastr.options.closeButton = true;
}
function ToastrError(msg) {
    toastr.error(msg);
    toastr.options.showEasing = 'swing';
    toastr.options.showMethod = 'slideDown';
    toastr.options.hideMethod = 'slideUp';
    toastr.options.progressBar = true;
    toastr.options.closeButton = true;
    // toastr.options.closeMethod = 'slideUp'
    // toastr.options.preventDuplicates = true;
    //toastr.options.timeOut = 30; // How long the toast will display without user interaction
    // toastr.options.extendedTimeOut = 60; // How long the toast will display after a user hovers over it
    // toastr.options.showEasing = 'easeOutBounce';
    // toastr.options.hideEasing = 'easeInBack';
    // toastr.options.closeEasing = 'easeInBack';
}
function ToastrWarning(msg) {
    toastr.warning(msg);
    toastr.options.showEasing = 'swing';
    toastr.options.showMethod = 'slideDown';
    toastr.options.hideMethod = 'slideUp';
    toastr.options.progressBar = true;
    toastr.options.closeButton = true;
}
