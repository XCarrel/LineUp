$(function(){
    $('#textarea-description, #select-gender, input[name="country"]').on('change keyup paste', function(){
        showButtonAfterChanges();
    });

    function showButtonAfterChanges(){
        $("#savebutton").removeClass("hidden");
    }

    $('#savebutton').click(function () {
        data = {};
        data.gender = $("#select-gender").val();
        data.country = $("input[type='radio']:checked").val();
        data.description = $("#textarea-description").val();

        $.ajax({
            type: "POST",
            url:  "http://prw1server/?page=api",
            data: data
        })
            .done(function(){

            })
            .fail(function () {
                alert('failed');
            });
    });
});