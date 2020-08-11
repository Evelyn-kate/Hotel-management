jQuery(document).ready(function ($) {

    $("#chkInternationalPhone").click(function () {
        if ($('#chkInternationalPhone').is(':checked')) {
            $('#tbPhoneNumber').unmask(phoneMask);
            $('#tbZipCode').unmask(zipMask);
            $('#lblZipCode').parent().toggleClass('required');
            
            for (i = 0; i < Page_Validators.length; i++) {
                if (Page_Validators[i].controltovalidate == 'tbZipCode')
                    Page_Validators[i].enabled = false;
            }
        } else {
            $('#tbPhoneNumber').mask(phoneMask);
            $('#tbZipCode').mask(zipMask);
            $('#lblZipCode').parent().toggleClass('required');

            for (i = 0; i < Page_Validators.length; i++) {
                if (Page_Validators[i].controltovalidate == 'tbZipCode')
                    Page_Validators[i].enabled = true;
            }
        }
    });

    var phoneMask = '(999) 999-9999';
    var zipMask = '99999?-9999';
    $('#tbPhoneNumber').mask(phoneMask);
    $('#tbZipCode').mask(zipMask);

    $('#tbArrivalDate').datepicker({ minDate: +0 });
    $('#tbDepartureDate').datepicker({ minDate: +0 });

    var dCheckIn = moment().add('days', 1).format('MM/DD/YYYY');
    var dCheckOut = moment().add('days', 4).format('MM/DD/YYYY');

    $('#tbArrivalDate').datepicker("setDate", dCheckIn).attr('readOnly', 'true');
    $('#tbDepartureDate').datepicker("setDate", dCheckOut).attr('readOnly', 'true');

    $('#chkTerms').on('click', function () {
        if ($('#chkTerms').is(':checked')) {
            $('#valTerms').text('');
        }
    });
    
    $('#uplFile').on('change', function (event) {
        if ($('#uplFile').val().length > 0) {
            $('#valFileUpload').text('');
        }
    });

    $('#btnSubmit').on('click', function (event) {
        if (!$('#chkTerms').is(':checked')) {
            $('#valTerms').text('* Please accept the terms and conditions');
            event.preventDefault();
        }

        if ($('#uplFile').val().length < 1) {
            $('#valFileUpload').text('* File Is Required');
            event.preventDefault();
        }
    });
});