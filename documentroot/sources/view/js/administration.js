$(function(){

    /* When the we: Add/Paste/Remove text in the #genderToAdd input (it's next to the "Ajouter button") */
    $('#genderToAdd').on('change keyup paste remove', function(){

        /* We take each checkboxes one by one*/
        $('input[name="genderId[]"]').each(function(){

            /* If the text we added/pasted/removed in the input is the same as one we find in the checkbox, we make the "Ajouter" button deactivated */
            if($("#genderToAdd").val().toLowerCase() === $(this).data("gendername").toLowerCase() || $("#genderToAdd").val().length === 0){
                deactivateButton("#Add");
                return false; // This is important ! (if not returned false the loop won't stop)
            }else{
                activateButton("#Add");
            }
        });
    });

    /* When the we: Add/Paste/Remove text in the #genderToDeleteOrRename input (it's next to the "Supprimer les sélectionner" and "Renommer le sélectionné en" buttons)*/
    $('#genderToDeleteOrRename').on('change keyup paste remove', function(){

        /* We take each checkboxes one by one*/
        $('input[name="genderId[]"]').each(function(){

            /* If the text we added/pasted/removed in the input is the same as one we find in the checkbox, we make the "Renommer le sélectionné en" button deactivated */
            if($("#genderToDeleteOrRename").val().toLowerCase() === $(this).data("gendername").toLowerCase() || $("#genderToDeleteOrRename").val().length === 0){ //
                deactivateButton("#renameSelected");
                return false; // This is important ! (if not returned false the loop won't stop)
            }else{
                activateButton("#renameSelected");
            }
        });
    });

    /* Each time we click on any checkbox */
    $('input[type="checkbox"]').click(function () {

        /* Let's put the numbers of checked checkbox into $totalSelectedCheckBox */
        $totalSelectedCheckBox = $("body").find('input[type="checkbox"]:checked').length;

        /* If we only have 1 checkbox checked, we can activate the "Renommer le sélectionné en" button  AND show the div where it is*/
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

