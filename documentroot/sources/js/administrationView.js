//Allows the user to add a new gender if doesn't create a duplicate
//Allow the player to delete a gender if it isn't used
//Allow the player to rename 1 gender (only 1 need to be selected)
//Alexandre Junod
//12.11.2018

$(document).ready(function () {

    // Make the "add new gender" button appear when a change is made in the page
    $('#InputGender').keypress(function () {
        touchInput();
    })

    //Make appear the other buttons while checked a check box
    $('input:checkbox').change(function () {
        touchCheckbox();
    })
})

// Mark the page as dirty, i.e: changes were made
function touchInput() {
    let ok = true
    ok = ($('#InputGender').val().length > 1) // description must be filled
    if (ok)
    {
        $('#cmdNewGender').removeClass('disabled'); //Remove the class "disabled"
        $('#cmdNewGender').attr('disabled', false); //Put the button on enable
    }
    else
    {
        $('#cmdNewGender').addClass('disabled'); //Add the class disabled
        $('#cmdNewGender').attr('disabled', true); //Disable the button to prevent to send
    }
}

// Mark the page as dirty, i.e: changes were made
function touchCheckbox(checkbox) {
   /*if(checkbox.checked)
   {*/
        $('#cmdDelGender').removeClass('hidden');
        $('#cmdRenameGender').removeClass('hidden');
   /*}
   else
   {
      $('#cmdDelGender').removeClass('hidden');
   }*/
}

// Save the current values on the server using a post over ajax
function save() {
    $.post(
        "?page=apiAdmin",
        {
            "InputGender": $('#InputGender').val()
        },
        function () {
            $('#cmdNewGender').addClass('disabled');
            $('#cmdNewGender').attr('disabled', true);
        }
    )
}
