var base_url;

if (!window.location.origin) {
    
    base_url = window.location.protocol + "//" + window.location.hostname + (window.location.port ? ':' + window.location.port : '');
}
else {
    base_url = window.location.origin;
}

$(document).ready(function () {
    $('#ddlCurrency').change(function () {
        ChangeCurrency();
    });
    
});

function ChangeCurrency() {
     
    var currency = $('#ddlCurrency').val()
   

        $.ajax({
            type: "POST",
            url: "/Airtime/ChangeCurrency",
           data: '{Currency: "' + currency + '" }',
            contentType: "application/json; charset=utf-8",
            dataType: "json",
            success: function (response) {
                //response = JSON.parse(response);
                location.reload(true);
            },
            failure: function (response) {
                alert("failure");
            },
            error: function (response) {
                alert("error");
            }
        });

       
    
    
}