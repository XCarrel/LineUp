$(function(){


    $('#genderToAdd').on('change keyup paste remove', function(){
        $('input[name="genderId[]"]').each(function(){
            if($("#genderToAdd").val().toLowerCase() === $(this).data("gendername").toLowerCase() || $("#genderToAdd").val().length === 0){
                deactivateButton("#Add");
                return false; // This is important ! (must be false). It will make the each loop stop at it
            }else{
                activateButton("#Add");
            }
        });
    });

    $('#genderToDelete').on('change keyup paste remove', function(){
        $('input[name="genderId[]"]').each(function(){
            if($("#genderToDelete").val().toLowerCase() === $(this).data("gendername").toLowerCase() || $("#genderToDelete").val().length === 0){ //
                deactivateButton("#renameSelected");
                return false; // This is important ! (must be false). It will make the each loop stop at it
            }else{
                activateButton("#renameSelected");
            }
        });
    });

    $('input[type="checkbox"]').click(function () {
        $totalSelectedCheckBox = $("body").find('input[type="checkbox"]:checked').length;

        if($totalSelectedCheckBox === 1){
            showRenameSelected();
            showAfterSelectedCheckbox();
        }else if($totalSelectedCheckBox > 1){
            hideRenameSelected();
            showAfterSelectedCheckbox();
        }else{ // No checked checkbox
            hideAfterSelectedCheckbox();
        }
    });

    function deactivateButton($button){
        $($button).attr("disabled", "");
    }

    function activateButton($button){
        $($button).removeAttr("disabled");
    }

    function showAfterSelectedCheckbox(){
        $("#afterSelectedCheckbox").removeClass("hidden");
    }

    function hideAfterSelectedCheckbox(){
        $("#afterSelectedCheckbox").addClass("hidden");
    }

    function showRenameSelected(){
        $("#renameSelected").removeClass("hidden");
    }

    function hideRenameSelected(){
        $("#renameSelected").addClass("hidden");
    }

});

