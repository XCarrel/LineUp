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

   // The user press on the keyboard, detect delete and backspace works
   $('#InputGender').on('keydown', function () {
      touchInput();
   })

   // Make appear the other buttons while checked a check box
   $('input:checkbox').change(function () {
      touchCheckbox();
   })

   // Change the button "Renommer le sélectionné en" when a key is pressed
   $('#RenameGender').keypress(function () {
      touchInputRename();
   })

   // Change the button "Renommer le sélectionné en" when a key is pressed, delete and backspace works
   $('#RenameGender').on('keydown', function () {
      touchInputRename();
   })

})

// Mark the page as dirty, i.e: changes were made
function touchInput() { //Doesn't work 100% well, it let the user put only 1 letter
    if ($('#InputGender').val().length >=2)
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

function touchInputRename() { //Doesn't work 100% well, it let the user put only 1 letter
    if ($('#RenameGender').val().length >=2)
    {
        $('#cmdRenameGender').removeClass('disabled'); //Remove the class "disabled"
        $('#cmdRenameGender').attr('disabled', false); //Put the button on enable
    }
    else
    {
        $('#cmdRenameGender').addClass('disabled'); //Add the class disabled
        $('#cmdRenameGender').attr('disabled', true); //Disable the button to prevent to send
    }
}

// Mark the page as dirty, i.e: changes were made
function touchCheckbox(checkbox) {
   if(document.querySelectorAll('input[type="checkbox"]:checked').length > 1) //Check how many checkboxes are checked
   {
      $('#cmdDelGender').removeClass('hidden');
      $('#cmdRenameGender').addClass('hidden');
      $('#RenameGender').addClass('hidden');
   }
   else
   {
      $('#cmdRenameGender').removeClass('hidden');
      $('#cmdDelGender').removeClass('hidden');
      $('#RenameGender').removeClass('hidden');
   }

   if(document.querySelectorAll('input[type="checkbox"]:checked').length == 0) //Check how many checkboxes are checked
   {
      $('#cmdRenameGender').addClass('hidden');
      $('#cmdDelGender').addClass('hidden');
      $('#RenameGender').addClass('hidden');
   }
}
