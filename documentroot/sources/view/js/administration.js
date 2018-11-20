$(function(){

    /** -- ADD -- **/
    // $('#Add').click(function () {
    //
    //     if($("#genderToAdd").val().length === 0) // If the input is empty, we don't do anything
    //         return false;
    //
    //     data = {};
    //     data.request = "gender";
    //     data.typeRequest = "add";
    //     data.toAdd = $("#genderToAdd").val();
    //
    //     $.ajax({
    //         type: "POST",
    //         url:  "?page=api",
    //         data: data
    //     }).done(function(){
    //         // If all is ok, we decide to put the actual input into the list
    //         $('#listCheckbox').append(addNewCheckBoxToDom($("#genderToAdd").val()));
    //     }).fail(function () {
    //         alert('fail');
    //     });
    // });

    $('#genderToAdd').on('change keyup paste remove', function(){
        $('input[name="gender"]').each(function(){
            if($("#genderToAdd").val().toLowerCase() === $(this).val().toLowerCase() || $("#genderToAdd").val().length === 0){
                deactivateButton("#Add");
                return false; // This is important ! (must be false). It will make the each loop stop at it
            }else{
                activateButton("#Add");
            }
        });
    });

    /** ---- END ADD ---- **/

    //
    /** -- DELETE -- **/
    $('#deleteSelected').click(function () {

        if($("body").find('input[type="checkbox"]:checked').length === 0) // If nothing has been checked, return
            return false;

        data = {};
        data.request = "gender";
        data.typeRequest = "delete";
        data.deleteList = [];

        $('input[type="checkbox"]:checked').each(function() {
            data.deleteList.push($(this).data("genderid"));
        });

        $.ajax({
            type: "POST",
            url:  "?page=api",
            data: data
        }).done(function(){
            // If all is ok, we need to delete the actual element in dom
            // TODO !!
        }).fail(function () {
            alert('fail');
        });
    });

    $('#genderToDelete').on('change keyup paste remove', function(){
        $('input[name="gender"]').each(function(){
            if($("#genderToDelete").val().toLowerCase() === $(this).val().toLowerCase()){ //
                deactivateButton("#renameSelected");
                return false; // This is important ! (must be false). It will make the each loop stop at it
            }else{
                activateButton("#renameSelected");
            }
        });
    });

    /** ---- END DELETE ---- **/

    /** -- RENAME -- **/

    // NOT FINISHED ALL
    $('#renameSelected').click(function () {

        data = {};
        data.request = "gender";
        data.typeRequest = "rename";
        data.genderToRename = $('input[type="checkbox"]:checked').data("genderid");
        data.renameTo = $("#genderToDelete").val();

        $.ajax({
            type: "POST",
            url:  "?page=api",
            data: data
        }).done(function(){
            // If all is ok, we decide to put the actual input into the list

        }).fail(function () {
            alert('fail');
        });
    });
    /** ---END RENAME ---- */

    $('input[type="checkbox"]').click(function () {
        $totalSelectedCheckBox = $("body").find('input[type="checkbox"]:checked').length;
        if($totalSelectedCheckBox === 1){
            enableRenameSelected();
        }else if($totalSelectedCheckBox > 1){
            disableRenameSelected();
        }else{ // No checked checkbox
            disableRenameSelected();
        }
    });

    function deactivateButton($button){
        $($button).attr("disabled", "");
    }

    function activateButton($button){
        $($button).removeAttr("disabled");
    }

    function addNewCheckBoxToDom($value){
        return checkBoxStyle($value) + checkBoxTextStyle($value);
    }

    function checkBoxStyle($value){
        return "<input type=\"checkbox\" name=\"gender\" value=\"" + $value + "\">";
    }

    function checkBoxTextStyle($value) {
        return "<span class=\"white\" style=\"color: white;\">" + $value + "</span><br>";
    }

    function disableRenameSelected(){
        $("#renameSelected").attr("disabled", "");
    }

    function enableRenameSelected(){
        $("#renameSelected").removeAttr("disabled");
    }

});

