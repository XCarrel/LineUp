$(document).ready(function() {
    $("#save").hide();
    $('#result').hide();

    $('#selectGender').change(function() {
        $("#save").show();
    });

    $('#selectCountries').change(function() {
        $("#save").show();
    });

    $('#description').change(function() {
        $("#save").show();
    });

    $("#save").click(function () {
        $.ajax({
            method: 'POST',
            url: "?page=api",
            data : {
                id:$('#idArtist').val(),
                kind:$("#selectGender option:selected").val(),
                countries:$('input[name=country]:checked').val(),
                description:$('#description').val(),
            },
            success : function() {
                $("#result").show();
                setTimeout(function() { $("#result").hide(); }, 2000);
                $("#save").hide();
            }
        })
    });
});