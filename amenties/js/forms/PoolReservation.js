jQuery(document).ready(function ($) {

    var phoneMask = '(999) 999-9999';
    $('#tbPhoneNumber').mask(phoneMask);
    $('#tbCellNumber').mask(phoneMask);

    $('#tbRequestedDate').datepicker({ minDate: +0 });
    var date = moment().add('days', 1).format('MM/DD/YYYY');
    $('#tbRequestedDate').datepicker("setDate", date).attr('readOnly', 'true');

    $("#chkInternational").on('click', function () {
        if ($('#chkInternational').is(':checked')) {
            $('#tbPhoneNumber').unmask(phoneMask);
            $('#tbCellNumber').unmask(phoneMask);
        } else {
            $('#tbPhoneNumber').mask(phoneMask);
            $('#tbCellNumber').unmask(phoneMask);
        }
    });    

    $('input[name=rdoOver21]').on('click', function () {
        $('#hidOver21').val($('input[name=rdoOver21]:checked').val());
    });

    $('input[name=rdoCommunication]').on('click', function () {
        $('#hidCommunication').val($('input[name=rdoCommunication]:checked').val());
    });

    $('input[name=rdoGuest]').on('click', function () {
        $('#hidGuest').val($('input[name=rdoGuest]:checked').val());
    });
});