jQuery(document).ready(function ($) {

    //var checkbox = $('#chkOvernightRooms');
    var rdoOverNightYes = $('#rdoOvernightRoomsYes');
    var rdoOverNightNo = $('#rdoOvernightRoomsNo');

    var overnightTable = function () {
        var d1 = $('#tbArrivalDate').datepicker('getDate');
        var d2 = $('#tbDepartureDate').datepicker('getDate');
        var nights = 0;
        if (d1 && d2 && (d2 > d1) && ($(rdoOverNightYes).prop('checked'))) {
            nights = Math.floor((d2.getTime() - d1.getTime()) / 86400000);
            $('.overnight-rooms').addClass('active');
            $('.overnight-rooms ul li').hide();
            $('.night-numbers ul').children('li:lt(' + nights + ')').show();
            $('.night-rooms ul').children('li:lt(' + nights + ')').show();
        } else if ($(rdoOverNightYes).prop('checked')) {
            $(rdoOverNightNo).trigger('click');
        } else {
            $('.overnight-rooms').removeClass('active');
        }
    };

    $(rdoOverNightYes).on("change", function () {
        $('#davOvernight').hide();
        $('#hidOvernight').val('true');
        overnightTable();
    });
    $(rdoOverNightNo).on("change", function () {
        $('#davOvernight').hide();
        $('#hidOvernight').val('false');
        overnightTable();
    });

    $("#chkInternationalPhone").click(function () {
        if ($("#chkInternationalPhone").is(':checked')) {
            $("#tbPhoneNumber").unmask(phoneMask);
            $("#tbFax").unmask(phoneMask);
            $("#tbZipCode").unmask(zipMask);
            $("#lblZipCode").parent().toggleClass('required');
            
            for (var i = 0; i < Page_Validators.length; i++) {
                if (Page_Validators[i].controltovalidate == 'tbZipCode')
                    Page_Validators[i].enabled = false;
            }
        } else {
            $("#tbPhoneNumber").mask(phoneMask);
            $("#tbFax").mask(phoneMask);
            $("#tbZipCode").mask(zipMask);
            $("#lblZipCode").parent().toggleClass('required');

            for (var i = 0; i < Page_Validators.length; i++) {
                if (Page_Validators[i].controltovalidate == 'tbZipCode')
                    Page_Validators[i].enabled = true;
            }
        }
    });

    var phoneMask = '(999) 999-9999';
    var zipMask = '99999?-9999';
    $('#tbPhoneNumber').mask(phoneMask);
    $('#tbFax').mask(phoneMask);
    $('#tbZipCode').mask(zipMask);

    $('#tbArrivalDate').datepicker({ minDate: +0, onSelect: overnightTable });
    $('#tbDepartureDate').datepicker({ minDate: +0, onSelect: overnightTable });
    $('#tbAlternateArrival').datepicker({ minDate: +0 });
    $('#tbAlternateDeparture').datepicker({ minDate: +0 });

    var dCheckIn = moment().add('days', 1).format("MM/DD/YYYY");
    var dCheckOut = moment().add('days', 4).format("MM/DD/YYYY");

    $("#tbArrivalDate").datepicker("setDate", dCheckIn).attr('readOnly', 'true');
    $("#tbDepartureDate").datepicker("setDate", dCheckOut).attr('readOnly', 'true');
    $("#tbAlternateArrival").datepicker("setDate", dCheckIn).attr('readOnly', 'true');
    $("#tbAlternateDeparture").datepicker("setDate", dCheckOut).attr('readOnly', 'true');

    // save rooms
    $('.tbRoomCount').on("change", function () {
        var rooms = [];
        $('.tbRoomCount').each(function () {
            var v = parseInt($(this).val());
            if (!isNaN(v)) {
                rooms.push(v);
            } else {
                rooms.push(0);
            }
        });
        $("#txtReferenceNumber").val(rooms.join(","));
    });
});