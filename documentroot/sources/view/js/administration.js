$(function(){
    // $('#textarea-description, #select-gender, input[name="country"]').on('change keyup paste', function(){
    //     showButtonAfterChanges();
    // });

    $('#Add').click(function () {

    });

    $('#genderToAdd').on('change keyup paste', function(){
       $('input[name="gender"]').each(function(){
            if($("#genderToAdd").val() === $(this).val()){
                deactivateButton();
                return false; // This is important ! (must be false). It will make the each loop stop at it
            }else{
                activateButton();
            }
       });
    });

    function deactivateButton(){
        $("#Add").attr("disabled", "");
    }

    function activateButton(){
        $("#Add").removeAttr("disabled");
    }

    // function showButtonAfterChanges(){
    //     $("#savebutton").removeClass("hidden");
    // }
    //
    // $('#savebutton').click(function () {
    //     data = {};
    //     data.artistid = $("input[name=artistid]").val();
    //     data.genderid = $("#select-gender").val();
    //     data.countryid = $("input[type='radio']:checked").val();
    //     data.description = $("#textarea-description").val();
    //
    //     $.ajax({
    //         type: "POST",
    //         url:  "?page=api",
    //         data: data
    //     })
    //         .done(function(){
    //
    //         })
    //         .fail(function () {
    //
    //         });
    // });
});

