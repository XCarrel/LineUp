$(document).ready(function() {
    $("#save").hide();

    $('#selectGender').change(function() {
        $("#save").show();
    });

    $('#selectCountries').change(function() {
        $("#save").show();
    });
});