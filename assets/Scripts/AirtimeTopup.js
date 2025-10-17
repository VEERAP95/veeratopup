var base_url;

if (!window.location.origin) {
    base_url = window.location.protocol + "//" + window.location.hostname + (window.location.port ? ':' + window.location.port : '');
}
else {
    base_url = window.location.origin;
}
$(document).ready(function () {

   
    $('.product').click(function () {
        var productID = $(this).find(".productID").html();
        var url = base_url + "/summary?pid=" + productID;
        if (window.location.pathname == "/gift-cards-list") {
            $("#hdnProductId").val(productID);
           
       
            var amt = $(this).find(".ReceiverSendValue").text();
           
           
            window.location.href = "/gift-card-recipient?pid=" + productID + "&fixamt=" + amt;
        }
        else window.location.href = url;
    });  

    $('#btnEditOperator').click(function () {

        if ($('#DIVoperatorList').is(":visible")) {
            $('#DIVoperatorList').hide();
            $('#DIVproductList').show();
        }
        else {
            $('#DIVoperatorList').show();
            $('#DIVproductList').hide();
        }

    });

    $('.divOperator').click(function () {
       
        var id = $(this).attr('id');
        $("#operatorID").val(id);
        $("#RechargeMobileForm").submit();
    });
   

});




