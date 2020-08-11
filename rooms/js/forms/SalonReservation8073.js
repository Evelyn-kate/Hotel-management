jQuery(document).ready(function ($) {

    var phoneMask = '(999) 999-9999';
    $('#tbPhoneNumber').mask(phoneMask);
    $('#tbCellNumber').mask(phoneMask);

    $('#tbDate').datepicker({ minDate: +0 });
    var date = moment().add('days', 1).format('MM/DD/YYYY');
    $('#tbDate').datepicker("setDate", date).attr('readOnly', 'true');

    $("#chkInternational").on('click', function () {
        if ($('#chkInternational').is(':checked')) {
            $('#tbPhoneNumber').unmask(phoneMask);
            $('#tbCellNumber').unmask(phoneMask);
        } else {
            $('#tbPhoneNumber').mask(phoneMask);
            $('#tbCellNumber').unmask(phoneMask);
        }
    });

    var defaultSelectValue = "Select";
    var defaultSelectValueSalon = "Select Salon First";
    var defaultSelectValueTreatmentCategory = "Select Category First";

    $('#hidSalon').val(defaultSelectValue);
    $('#hidCategory').val(defaultSelectValueSalon);
    $('#hidTreatment').val(defaultSelectValueTreatmentCategory);

    var ddlSalon = $("#ddlSalon");
    var ddlTreatment = $("#ddlTreatment");
    var ddlTreatmentCategory = $("#ddlCategory");

    var ddlClean = function (ddl, defaultValue) {
        ddl.empty();
        if (defaultValue != null) ddl.append($("<option />").val("").text(defaultValue));
    }

    ddlClean(ddlTreatmentCategory, defaultSelectValueSalon);
    ddlClean(ddlTreatment, defaultSelectValueTreatmentCategory);

    $(ddlSalon).on('change', function () {
        if (ddlSalon.val() != "Select") {
            for (var i = 0; i < window.Page_Validators.length; i++) {
                if (window.Page_Validators[i].controltovalidate == 'hidSalon') {
                    var validator = window.Page_Validators[i];
                    validator.isvalid = true;
                    window.ValidatorUpdateDisplay(validator);
                }
            }
            ddlTreatmentCategoryRefresh();
        }
        else {
            ddlClean(ddlTreatmentCategory, defaultSelectValueSalon);
        }

        ddlClean(ddlTreatment, defaultSelectValueTreatmentCategory);

        $('#hidSalon').val(ddlSalon.val());
    });

    $(ddlTreatmentCategory).on('change', function () {
        for (var i = 0; i < window.Page_Validators.length; i++) {
            if (window.Page_Validators[i].controltovalidate == 'hidCategory') {
                var validator = window.Page_Validators[i];
                validator.isvalid = true;
                window.ValidatorUpdateDisplay(validator);
            }
        }
        ddlTreatmentRefresh();
        $('#hidCategory').val(ddlTreatmentCategory.val());
    });

    $(ddlTreatment).on('change', function () {
        for (var i = 0; i < window.Page_Validators.length; i++) {
            if (window.Page_Validators[i].controltovalidate == 'hidTreatment') {
                var validator = window.Page_Validators[i];
                validator.isvalid = true;
                window.ValidatorUpdateDisplay(validator);
            }
        }
        $('#hidTreatment').val(ddlTreatment.val());
    });

    var ddlTreatmentCategoryRefresh = function () {
        var jsonData = JSON.stringify({ 'salonTypeName': ddlSalon.val() });
        $.ajax(
            {
                type: 'POST',
                contentType: "application/json; charset=utf-8",
                dataType: 'json',
                cache: true,
                url: '/Forms/WebMethods.aspx/GetSalonTreatmentCategoryList',
                data: jsonData,
                success: ddlTreatmentCategoryRefreshSuccess,
                error: ddlTreatmentCategoryRefreshError
            });
    };

    var ddlTreatmentCategoryRefreshSuccess = function (data) {
        if (data != null && JSON.parse(data.d).resultSelectList != null)
            ddlLoad(ddlTreatmentCategory, JSON.parse(data.d).resultSelectList, defaultSelectValue);
        else ddlClean(ddlTreatmentCategory, defaultSelectValue);
    };

    var ddlTreatmentCategoryRefreshError = function () {
        ddlClean(ddlTreatmentCategory, defaultSelectValue);
    };

    var ddlTreatmentRefresh = function () {
        var jsonData = JSON.stringify({ 'salonTypeName': ddlSalon.val(), 'treatmentCategory': ddlTreatmentCategory.val() });
        $.ajax(
            {
                type: 'POST',
                contentType: "application/json; charset=utf-8",
                dataType: 'json',
                cache: true,
                url: '/Forms/WebMethods.aspx/GetSalonTreatmentList',
                data: jsonData,
                success: ddlTreatmentRefreshSuccess,
                error: ddlTreatmentRefreshError
            });
    };

    var ddlTreatmentRefreshSuccess = function (data) {
        if (data != null && JSON.parse(data.d).resultSelectList != null)
            ddlLoad(ddlTreatment, JSON.parse(data.d).resultSelectList, defaultSelectValue);
        else ddlClean(ddlTreatment, defaultSelectValueTreatmentCategory);
    };

    var ddlTreatmentRefreshError = function () {
        ddlClean(ddlTreatment, defaultSelectValue);
    };

    var ddlLoad = function (ddl, dataList, defaultValue) {
        if (defaultValue != null) ddlClean(ddl, defaultValue);
        if (dataList != null) {
            $.each(dataList, function () {
                ddl.append($("<option />").val(this.Value).text(this.Text));
            });
        }
    }

    var ddlSalonRefreshSuccess = function (data) {
        if (data != null && JSON.parse(data.d).resultSelectList != null)
            ddlLoad(ddlSalon, JSON.parse(data.d).resultSelectList, defaultSelectValue);
        else ddlClean(ddlSalon, defaultSelectValue);
    };

    var ddlSalonRefreshError = function () {
        ddlClean(ddlSalon, defaultSelectValue);
    };

    $('input[name=rdoStylist]').on('click', function () {
        $('#hidStylist').val($('input[name=rdoStylist]:checked').val());
    });

    $('input[name=rdoCommunication]').on('click', function () {
        $('#hidCommunication').val($('input[name=rdoCommunication]:checked').val());
    });

    $('input[name=rdoGuest]').on('click', function () {
        $('#hidGuest').val($('input[name=rdoGuest]:checked').val());
    });

    $.ajax({
        type: 'POST',
        contentType: "application/json; charset=utf-8",
        dataType: 'json',
        cache: true,
        url: '/Forms/WebMethods.aspx/GetSalonList',
        data: '',
        success: ddlSalonRefreshSuccess,
        error: ddlSalonRefreshError
    });
});