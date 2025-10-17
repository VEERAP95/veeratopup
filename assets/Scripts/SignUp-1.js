$(document).ready(function () {
    GetDialCodeList();

  
})
function sortByProperty(property) {
    return function (a, b) {
        if (a[property] > b[property])
            return 1;
        else if (a[property] < b[property])
            return -1;

        return 0;
    }
}
//Get Dial Code List
function GetDialCodeList() {
    
        $.ajax({
            url: '/GetCountryDialListWithCountryNameForCustomer',
            dataType: "json",
            type: "GET",
            contentType: "application/json; charset=utf-8",
            cache: false,
            async: false,
            success: function (data) {
                data = JSON.parse(data);
                data = data.sort(sortByProperty("Country"));
               // console.log(data);
                $("#ddlDialCodePhoneOTP").focus();
                var ddlDialCodePhoneOTP = $("#ddlDialCodePhoneOTP");
                $("#ddlDialCodePhoneOTP").empty(); // <<<<<< No more issue here
            
                $(data).each(function () {
                    var option = $("<option />");
                    //Set Currency Name  in Text part.
                    option.html(this.FullDialCode);
                    //Set Currency ID in Value part.
                    option.val(this.ID);
                    //Add the Option element to DropDownList.
                    ddlDialCodePhoneOTP.append(option);
                });
            },
            error: function (response) {

            },
            failure: function (response) {

            }
        });
    }

//Get Dail Code By IPAddress
function GetDailCodeByIPAddress() {
    
    var DailCode;
    $.ajax({
        url: '/GetDailCodeByIPAddress',
        dataType: "json",
        type: "GET",
        contentType: "application/json; charset=utf-8",
        cache: false,
        async: false,
        success: function (response) {
            //console.log(response);
            response = JSON.parse(response);
            DailCode = response;

        },
        error: function (response) {
            // alert(response.responseText);
            return null;
        },
        failure: function (response) {
            // alert(response.responseText);
            return null;
        }
    });
    return DailCode;
};

function validateEmail() {

    var input = $('#txtMobileNoForOT').val();
    var first_split = input.split("@")[1];
  
    $.ajax({
        url: '/IsBlockeddomain?domain='+first_split,
        dataType: "json",
        type: "GET",
        contentType: "application/json; charset=utf-8",
        cache: false,
        async: false,
        success: function (data) {
            data = JSON.parse(data);

            if (data != null) {
                if (data == true) {
                    $('#btnLogin').prop('disabled', true);
                    $('#lblerror').text('This domain is not allowed');

                }
                else {
                    $('#btnLogin').prop('disabled', false);
                    $('#lblerror').text('');
                }
            }

           

        },
        error: function (response) {

        },
        failure: function (response) {

        }
    });

   
}