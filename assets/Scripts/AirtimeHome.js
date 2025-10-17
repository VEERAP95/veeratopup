var base_url;

if (!window.location.origin) {
    base_url = window.location.protocol + "//" + window.location.hostname + (window.location.port ? ':' + window.location.port : '');
}
else {
    base_url = window.location.origin;
}

$(document).ready(function () {
    var DialCode = getUrlParameter('dialcode');
    if (DialCode == 'undefined') {  }
    else {
        $("#txtCountryDialCode").val(DialCode);
        $('#country option:selected').val(DialCode);
        document.getElementById("divMobileInput").style.display = "block";
   }
   
   var url = window.location.pathname.split("/");
    var questions = url[1];
	
    if (questions == "sendtopup") {
        window.location.href = base_url + "/sendrecharge";
	}
});
var getUrlParameter = function getUrlParameter(sParam) {
    
    var sPageURL = window.location.search.substring(1),
        sURLVariables = sPageURL.split('&'),
        sParameterName,
        i;

    for (i = 0; i < sURLVariables.length; i++) {
        sParameterName = sURLVariables[i].split('=');

        if (sParameterName[0] === sParam) {
            return sParameterName[1] === undefined ? true : decodeURIComponent(sParameterName[1]);
        }
    }
}
function getParameterByName(name, url) {
    if (!url) url = window.location.href;
    name = name.replace(/[\[\]]/g, '\\$&');
    var regex = new RegExp('[?&]' + name + '(=([^&#]*)|&|#|$)'),
        results = regex.exec(url);
    if (!results) return null;
    if (!results[2]) return '';
    return decodeURIComponent(results[2].replace(/\+/g, ' '));
    var DialCode = getParameterByName("DialCode");
    console.log(DialCode);
    alert(DialCode);

    $("#txtCountryDialCode").val(DialCode);
   document.getElementById("divMobileInput").style.display = "block";
    $("#txtDetinationMob").focus();


}
//Get Dial Code()
function GetDialCode() {
    $("#errmsg").text("");
    $("#SpmobileinfoError").text("");
    var CountryCode = $("#country option:selected").val();
    //  console.log(CountryCode);
    if (CountryCode == "00") {
        $("#divMobileInput").css("display", "none");

        document.getElementById("divMobileInput").style.display = "none";

    }

    else {

        $.ajax({
            url: '/GetCountryDialCodeByCountryCode?CountryCode=' + CountryCode,
            dataType: "json",
            type: "GET",
            contentType: "application/json; charset=utf-8",
            cache: false,
            async: false,
            success: function (data) {
                data = JSON.parse(data);
                $("#txtCountryDialCode").val(data);
                document.getElementById("divMobileInput").style.display = "block";
                $("#txtDetinationMob").focus();

            },
            error: function (response) {

            },
            failure: function (response) {

            }
        });
    }

}

function focusToDialcode() {
    // 
    var input = $('#txtDetinationMob');
    if (input == "" || input == null) {
        input.on('keydown', function () {
            var key = event.keyCode || event.charCode;

            if (key == 8 || key == 46)
                $('#txtCountryDialCode').focus();
        });
    }


}
