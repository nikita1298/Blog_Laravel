//This js file contains functions for validation only
function checkNull_OnlyText_WithSpace(Text, ErrorId, FieldName) {
    var Errors = false;
    if (Text.trim() == 0) {
        $("#" + ErrorId).html('<span class="fa fa-exclamation text-danger">Enter ' + FieldName + '</span>');
        Errors = true;
    } else if (/^[a-zA-Z\s]*$/.test(Text)) {
        $("#" + ErrorId).html('');
    } else {
        $("#" + ErrorId).html('<span class="fa fa-exclamation text-danger">Invalid ' + FieldName + '</span>');
        Errors = true;
    }
    return Errors;
}

function showLoader() {
    $("#b").attr("disabled", "disabled");
    $("#Loader").show();
    // $("#Loader").html('<span class="well">Loading...</span>');
}

function hideLoader() {
    $("#b").attr("Enabled", "Enabled");
    $("#Loader").hide();
    //  $("#Loader").html('');
}