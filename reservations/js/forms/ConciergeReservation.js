jQuery(document).ready(function ($) {
    var momentDateFormat = "MM/DD/YYYY";
    var pickerDateFormat = "mm/dd/yy";
    var phoneMask = "(999) 999-9999";
    var zipMask = "99999?-9999";
    var childAgeBox;

    $("#tbStartDate").mask("99/99/9999");
    $("#tbStartDate").datepicker({
        dateFormat: pickerDateFormat,
        minDate: toDateString(moment().subtract('days', 0))
    });

    $("#tbEndDate").mask("99/99/9999");
    $("#tbEndDate").datepicker({ dateFormat: pickerDateFormat });

    $("#tbPhoneNumber").mask(phoneMask);
    $('#tbZipCode').mask(zipMask);

    $("#lblZipCode").text("Zip Code:");

    $(".childCheck").hide();
    $(".childCheck2").hide();

    $(".childBox1").on("click", function() {
        $(".childCheck").show();
    });

    $(".childBox2").on("click", function() {
        $(".childCheck").hide();
        $(".childCheck2").hide();
    });

    $(".ddlChild").on("click", function () {
        $(".childCheck2").show();
        $(".childLabel").hide();
        $(".childReferenceNumber1").hide();
        $(".childReferenceNumber2").hide();
        $(".childReferenceNumber3").hide();
        $(".childReferenceNumber4").hide();
        $(".childReferenceNumber5").hide();        
        $(".childAge1").hide();
        $(".childAge2").hide();
        $(".childAge3").hide();
        $(".childAge4").hide();
        $(".childAge5").hide();

        childAgeBox = parseInt($(".ddlChild").val());

        for (var i = 1; i <= childAgeBox; i++) {
            $(".childLabel").show();
            $(".childReferenceNumber" + i).show();
            $(".childAge" + i).show();
        }
    });

    $("#chkInternationalPhone").click(function () {
        if ($('#chkInternationalPhone').is(':checked')) {
            $('#tbPhoneNumber').unmask(phoneMask);
            $('#tbZipCode').unmask(zipMask);
        } else {
            $('#tbPhoneNumber').mask(phoneMask);
            $('#tbZipCode').mask(zipMask);
        }
    });
    
    function parseDate(d) {
        return moment(d, momentDateFormat);
    }

    function toDateString(d) {
        return moment(d).format(momentDateFormat);
    }

    $("#tbStartDate").change(function (event) {
        if ($("#tbStartDate").val().length > 0) {
            var arrive = parseDate($("#tbStartDate").val());
            var minimalDate = toDateString(arrive.clone().add('days', 1));
            $("#tbEndDate").datepicker("option", "minDate", minimalDate);
        }
    });

});