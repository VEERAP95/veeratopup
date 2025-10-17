
var Country_name = '';
var Country_code = '';
var Country_dialcode = '';
var selectedDialCode = false;

$(document).ready(function () {

    Country_code = 'us';
    Country_dialcode = '+1';
    Country_name = 'united states';
     setTimeout(
     function () {
         GetDailCodeByIPAddress();
         GetCountryByFirstAlphabet("A");
     }, 2000);
    $("#txtcntry").val('Search Country');
    $("#txtcntry").hide();
    GetParameterValues('ccode');

    var uri = window.location.toString();
    if (uri.indexOf("?") > 0) {
        var clean_uri = uri.substring(0, uri.indexOf("?"));
        window.history.replaceState({}, document.title, clean_uri);
    }

    $("#select tbody tr").hover(function () {
        $(this).css("cursor", "pointer");
    }, function () {
        $(this).css("cursor", "default");
    });
    $("#select tbody tr").css("cursor", "pointer");

    $('#country').change(function () {
        var dialCode = $('#country option:selected').attr('DialCode');
        var flagIcon = $('#country option:selected').attr('flag'); countryName
        var countryName = $('#country option:selected').attr('countryName');
        $('#txtDetinationMob').val(dialCode);
        $("#imgflag").attr("src", flagIcon);

        $('#spanCountry').text(countryName);
        
        
    });


    $(document).on("click", function (event) {

        if (event.target.id == 'txtcntry') { }
        else if (event.target.id == 'imgflag') { }
        else if (event.target.id == 'divimg') { }
        else if (event.target.id == 'txtDetinationMob') { }
        else {
            var $trigger = $("#country");
            if ($trigger !== event.target && !$trigger.has(event.target).length) {
                var mobile = $("#txtDetinationMob").val();
                $("#txtDetinationMob").show();
                $("#divddl").hide();
                $("#divimg").show();
                $("#ltrl1").hide();
                $("#txtcntry").hide();

            }
        }
    });



    $('#txtDetinationMob').on('keyup', (function () {

        var myLength = $("#txtDetinationMob").val().length;

        if (myLength > 2)
        {
            
            //$("#country tr").each(function ()
            //{
                //if ($(this).find("td").eq(1).html() === $('#txtDetinationMob').val().substr(0, 5)) {
                //    if (Country_dialcode != $('#txtDetinationMob').val().substr(0, 5)) {
                //        BindData($('#txtDetinationMob').val().substr(0, 5));
                //    }
                   
                //    return false;
                //}
                //if ($(this).find("td").eq(1).html() === $('#txtDetinationMob').val().substr(0, 4)) {
                //    if (Country_dialcode != $('#txtDetinationMob').val().substr(0, 4)) {
                //        BindData($('#txtDetinationMob').val().substr(0, 4));
                //    }
                //    return false;
                //}
                //if ($(this).find("td").eq(1).html() === $('#txtDetinationMob').val().substr(0, 3)) {
                //    if (Country_dialcode != $('#txtDetinationMob').val().substr(0, 3)) {
                //        BindData($('#txtDetinationMob').val().substr(0, 3));
                //    }
                //    return false;
                //}
                //if ($(this).find("td").eq(1).html() === $('#txtDetinationMob').val().substr(0, 2)) {
                //    if (Country_dialcode != $('#txtDetinationMob').val().substr(0, 2)) {
                //        BindData($('#txtDetinationMob').val().substr(0, 2));
                //    }
                //    return false;
                //}

               
            //});
            BindData($('#txtDetinationMob').val());
           
        }
        else {
            BindData($('#txtDetinationMob').val().substr(0, 2));
        }



    }));

   

    $('#txtcntry').on('keyup', (function () {

        if (event.keyCode == 8 || event.keyCode == 46) {
            var myLength = $("#txtcntry").val().length;
            if (myLength >= 0) {
                bindfiltertable($("#txtcntry").val());
            }
        }
        else {
            var myLength = $("#txtcntry").val().length;
            if (myLength >= 2) {
                bindfiltertable($("#txtcntry").val());
            }

        }

    }));

    $('#divimg').on("click", function (event) {
        JSDropDown1();
    });
    $('#imgflag').on("click", function (event) {
        JSDropDown1();
    });
    var thisDesc;
    $('#select').find('tr').click(function () {
        
        changeIncidentValue(this);
        //var currentRow = $(this).closest("tr");
        //debugger;
        //alert(currentRow.find("td:eq(2)").text());
        //document.title = "";
        //document.title = currentRow.find("td:eq(2)").text().charAt(0).toUpperCase() + currentRow.find("td:eq(2)").text().slice(1) + " Mobile recharge online | Top up online | Recharge";
   
        //$('meta[name="description"]').attr('content', currentRow.find("td:eq(2)").text().charAt(0).toUpperCase() + currentRow.find("td:eq(2)").text().slice(1) + ' Recharge any mobile number instantly. Send Topup online to your beloved ones in '  +currentRow.find("td:eq(2)").text());
        //thisDesc = $('meta[name="description"]').attr('content');
        //alert(thisDesc);
       
    });

    $('#hlr_submit').on('click', function () {
        return GetAirtimeProductList();
    });
    $('#txtcntry').on('click', function () {
        JSDropDown();
        
       
       
    });

   
      
        
    


    $(document).on('click', '.selectCountry', function () {
        var countryCode = $(this).attr('countryCode');
        var dialCode = $(this).attr('dialCode');
        SelectCountry(countryCode);
        
    });

    

   
    $(document).on('click','.Alphabet', function () {
        var Alphabet = $(this).attr('alphabet');
        
        GetCountryByFirstAlphabet(Alphabet);
    });
  
})


const BindData = function (dlcode) {
    
    var myLength = $("#txtDetinationMob").val().length;
    if (myLength > 0 && !selectedDialCode) {
        var dialcodeorcountry;
        $("#country tr").each(function () {
            if ($(this).find("td").eq(1).html() === dlcode) {
                dialcodeorcountry = $('#txtDetinationMob').val();
                var countrycode = $(this).find("td").eq(3).html();
                var dialCode = $(this).find("td").eq(1).html();
                var country = $(this).find("td").eq(2).html();


                var flagIcon = "assets/Content/img/flags/svg/" + countrycode.trim().toLowerCase() + ".svg";

                Country_code = countrycode;
                Country_dialcode = dialCode;
                Country_name = country;

                $("#txtDetinationMob").focus();
                $("#imgflag").attr("src", flagIcon);

                $("#txtcntry").hide();
                $("#txtDetinationMob").show();
                $("#divimg").show();
                $("#select").hide();

                //  }
            }
        });
    }
    else selectedDialCode = false;
}

function GetParameterValues(param) {
 
    var url = window.location.href.slice(window.location.href.indexOf('?') + 1).split('&');
    for (var i = 0; i < url.length; i++) {
        var urlparam = url[i].split('=');
        if (urlparam[0] == param) {
            country = urlparam[1];
            SelectCountry(urlparam[1]);
            break;
        }
    }
}

function GetAllCountries() {
    $("#txtDetinationMob").focus();
}

function bindfiltertable(dialCode) {

    if (dialCode != "") {
        dialCode = dialCode.startsWith("+") ? dialCode: "+" + dialCode
        var neartestMatch = [];
        var matched = null;
        $("#select tbody tr").each(function () {

            if ($(this).children()[2].innerText.startsWith(dialCode.toLowerCase()) || $(this).children()[1].innerText.startsWith(dialCode))
            {
                $(this).show();
                neartestMatch.push($(this));
                if ($($(this).children()[2]).html() == dialCode || $($(this).children()[1]).html() == dialCode) {
                    matched=$(this);
                }
            }
            else {
                $(this).hide();
            }
        });
        if (neartestMatch.length < 2) {
            selectedDialCode = true;
            changeIncidentValue(matched);
        }

        dialCode = dialCode.replace(/\w\S*/g, function (dialCode) {
            return dialCode.charAt(0).toUpperCase() + dialCode.substr(1).toLowerCase();
        });
    }
    else {
        $("#select tbody tr").each(function () {
            $(this).show();
        });
    }

}

function changeIncidentValue(elem) {
    Country_code = $(elem).find("td").eq(3).html();
    Country_dialcode = $(elem).find("td").eq(1).html();
    Country_name = $(elem).find("td").eq(2).html();
    var flagIcon = "assets/Content/img/flags/svg/" + Country_code.trim().toLowerCase() + ".svg";
    //$('#txtDetinationMob').val(Country_dialcode);
    $("#txtDetinationMob").focus().val(Country_dialcode);
    $("#imgflag").attr("src", flagIcon);
    $("#txtcntry").hide();
    $("#txtDetinationMob").show();
    $("#divimg").show();
    $("#ltrl1").show();
    $('#divddl').css('display', 'none');
    $("#txtcntry").val('');
    selectedDialCode = true;
}



function GetAirtimeProductList()
{
    $("#errmsg").text("");
    $("#errmsg").text("");
    // 
    var CountryCode = Country_code;
    var CountryName = Country_name;
    var destinationMobileCode = Country_dialcode;
    var Mobile = $("#txtDetinationMob").val();
    

    if (Mobile != undefined && destinationMobileCode != undefined) {
        var destinationMobile = Mobile.substring(destinationMobileCode.length, Mobile.length);
        //Remove Zero
        destinationMobile = Number(destinationMobile).toString();
        $('#HFCountry').val(CountryName);
        $('#HFDialCode').val(destinationMobileCode);
        $('#HFCountryCode').val(CountryCode);

        $('#HFMobile').val(destinationMobile);
        $("#hdnChangedCurrency").val($('#ddlCurrency').val());
    }

    
    if (CountryCode == null || CountryCode == '00' || CountryCode == '') {
        $("#errmsg").text("Please Select Country");
        $("#errmsg").css('color', 'red');
        return false;
    }
    if (destinationMobile == null || destinationMobile == 0 || destinationMobile == '') {
        $("#errmsg").text("Please Enter Receiver Phone No.");
        $("#errmsg").css('color', 'red');
        return false;
    }
    else {
        $("#errmsg").text("");
        $("#errmsg").text("");
        var isValid =checkforValidRecepientMobileNo();
        if (isValid) {
            $("#myForm").submit();
        }
        else {
            $("#errmsg").text("ok.");
            return false;
        }
        
    }
   
    $("#loading-image").hide();
}


function checkforValidRecepientMobileNo()
{
    
    var dialcode = $('#HFDialCode').val();
    var mobileNo = $('#HFMobile').val();
    var res;
    if (dialcode != "" && mobileNo != "") {
        $.ajax({
            url: 'home/CheckAndValidateRecepient',
            
            data: { "mobileWithDialCode": dialcode + "-" + mobileNo },
            type: "GET",
            contentType: "application/json; charset=utf-8",
            dataType: "json",
            cache: false,
            async: false,
            success: function (response) {
               
                response = JSON.parse(response)
                if (response.Data == false)
                    res =true;
                else
                    res= false;
            }
        })
    }
    else { res = false; }

    return res;
   
}

function GetDailCodeByIPAddress() {

    var blocked;
    $.ajax({
        url: '/GetDailCodeByIPAddress',
        dataType: "json",
        type: "GET",
        contentType: "application/json; charset=utf-8",
        cache: false,
        async: false,
        success: function (response) {


            response = JSON.parse(response)
            blocked = response;
            if (blocked == "True") {
                window.location.href = "/Unauthrized";
            }

        },
        error: function (response) {

            return null;
        },
        failure: function (response) {

            return null;
        }
    });

};


function GetCountryByFirstAlphabet(FirstAlphabet) {

    $.ajax({
        url: '/GetCountryByFirstAlphabet?FirstAlphabet=' + FirstAlphabet,
        dataType: "json",
        type: "GET",
        contentType: "application/json; charset=utf-8",
        cache: false,
        async: false,
        success: function (res) {
            res = JSON.parse(res)
            let str = '';
            $.each(res, function (key, value) {
                str +='<li class="col-md-3 col-sm-4 col-xs-6">';
                str+='<a class="selectCountry" countryCode='+ value.CountryCode + ' dialCode=' + value.DialCode + '>' + value.Country + '</a></li>'; //href = " / home ? dialcode = ' + value.DialCode + '"
            });
            $('.alfaCntryLst').empty();
            $('.alfaCntryLst').append(str);
        },
        error: function (response) {

            return null;
        },
        failure: function (response) {

            return null;
        }
    });

}
function SelectCountry(Country) {
    $("#country tr").each(function () {

        if ($(this).find("td").eq(3).html().toLowerCase() === Country.toLowerCase()) {
            Country_code = $(this).find("td").eq(3).html();
            Country_dialcode = $(this).find("td").eq(1).html();
            Country_name = $(this).find("td").eq(2).html();
            var flagIcon = "../Content/img/flags/svg/" + Country_code.trim().toLowerCase() + ".svg";
            $("#txtDetinationMob").focus();
            $('#txtDetinationMob').val(Country_dialcode);
            $("#imgflag").attr("src", flagIcon);
            $("#txtcntry").hide();
            $("#txtDetinationMob").show();
            $("#divimg").show();
            $("#select").hide();
            
        }

    });
    document.getElementById("divMobileInput").style.display = "block";
    $(window).scrollTop(0);
}

function down(what) {
    pos = $(what).offset();  // remember position
    $(what).css("position", "absolute");
    $(what).offset(pos);   // reset position
    $(what).attr("size", "10"); // open dropdown
}

function up(what) {
    $(what).css("position", "static");
    $(what).attr("size", "1");  // close dropdown


}

function JSDropDown() {

    var mobilelength = $("#txtDetinationMob").val() != "" ? 0 : $("#txtDetinationMob").val().length;
    if (mobilelength < 1) {

        $("#divddl").show();
        $("#divimg").hide();
        $("#txtcntry").attr("placeholder", "Search Country");
        $("#txtcntry").focus();
       // $("#txtcntry").val('');
       // $("#txtcntry").val('');
    }
}


function JSDropDown1() {

    $("#txtDetinationMob").hide();
    $("#divddl").show();
    $("#select").show();
    $("#divimg").hide();
    $("#ltrl1").hide();

    $("#txtcntry").show();

    $("#txtcntry").focus();
    $("#txtcntry").val('');
    bindfiltertable('');

}

