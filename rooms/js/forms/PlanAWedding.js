jQuery(document).ready(function ($) {
    var momentDateFormat = "MM/DD/YYYY";
    var pickerDateFormat = "mm/dd/yy";

    function toDateString(d) {
        return moment(d).format(momentDateFormat);
    }

    $("#tbDate").mask("99/99/9999");
    $("#tbDate").datepicker({
        dateFormat: pickerDateFormat,
        minDate: toDateString(moment().subtract('days', 0))
    });


    $("#chkInternational").click(function () {
        if ($('#chkInternational').is(':checked')) {
            $('#tbPhoneNumber').unmask(phoneMask);
        } else {
            $('#tbPhoneNumber').mask(phoneMask);
        }
    });

    var phoneMask = '(999) 999-9999';
    $('#tbPhoneNumber').mask(phoneMask);
});