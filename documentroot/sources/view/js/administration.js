$(function(){
    // $('#textarea-description, #select-gender, input[name="country"]').on('change keyup paste', function(){
    //     showButtonAfterChanges();
    // });

    $('#Add').click(function () {

        if($("#genderToAdd").val().length === 0) // If the input is empty, we don't do anything
            return false;


        data = {};
        data.request = "gender";
        data.typeRequest = "add";
        data.toAdd = $("#genderToAdd").val();

        $.ajax({
            type: "POST",
            url:  "?page=api",
            data: data
        }).done(function(){
            // If all is ok, we decide to put the actual input into the list
            $('#listCheckbox').append(checkBoxStyle($("#genderToAdd").val()) + checkBoxTextStyle($("#genderToAdd").val()));
        }).fail(function () {
            alert('fail');
        });
    });

    $('#genderToAdd').on('change keyup paste', function(){
        $('input[name="gender"]').each(function(){
            if($("#genderToAdd").val().toLowerCase() === $(this).val().toLowerCase()){
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

    function checkBoxStyle($value){
        return "<input type=\"checkbox\" name=\"gender\" value=\"" + $value + "\">";
    }

    function checkBoxTextStyle($value) {
        return "<span class=\"white\" style=\"color: white;\">" + $value + "</span><br>";
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

