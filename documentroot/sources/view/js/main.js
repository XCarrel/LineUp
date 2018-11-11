$(function(){
    $('#textarea-description, #select-gender, input[name="country"]').on('change keyup paste', function(){
        showButtonAfterChanges();
    });

    function showButtonAfterChanges(){
        $("#savebutton").removeClass("hidden");
    }

    $('#savebutton').click(function () {
        data = {};
        data.artistid = $("input[name=artistid]").val();
        data.genderid = $("#select-gender").val();
        data.countryid = $("input[type='radio']:checked").val();
        data.description = $("#textarea-description").val();

        $.ajax({
            type: "POST",
            url:  "?page=api",
            data: data
        })
            .done(function(){

            })
            .fail(function () {

            });
    });
});