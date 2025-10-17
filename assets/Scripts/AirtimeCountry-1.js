$(document).ready(function () {
    
    $('.product-description').click(function () {
        var Country = $(this).find(".product-name").html();
        var CountryCode = $(this).find(".Country-Code").html()
        var DialCode = $(this).find(".Country-DialCode").html();
        console.log(DialCode);
       //var url = "sendrecharge?ccode=" + CountryCode;
        var url = "Provider?CountryCode=" + CountryCode;
        window.location.href = url;
    }); 

    $('.operators').click(function () {
        var Country = $(this).find(".product-name").html();
        var CountryCode = $(this).find(".Country-Code").html()
        var DialCode = $(this).find(".Country-DialCode").html();
        console.log(DialCode);
        //var url = "sendrecharge?ccode=" + CountryCode;
        var url = "Provider?CountryCode=" + CountryCode;
        window.location.href = url;
    }); 



});


