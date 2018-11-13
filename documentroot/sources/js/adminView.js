// Code that manages the admin page
// X. Carrel
// Nov 2018

// Setup event handlers
$(document).ready(function () {

    $('input').keyup(function () {
        validate($(this))
    })
    $('input:checkbox').click(function () {
        hideAndShow()
    })
})

// Test the text input fields and hide/show the buttons according to the result
// Won't let the user add or rename to a value that already exists
function validate(inp)
{
    button = '#'+inp.data('button') // Get the button corresponding to the edited field
    $(button).prop('disabled',false)
    $('label').each(function () {
        if ($(this).html().toUpperCase() == inp.val().toUpperCase()) // That kind is already there
            $(button).prop('disabled', true)
    })
    if (inp.val().length == 0) $(button).prop('disabled', true)
}

// Hide and show buttons according to the selected checkboxes
function hideAndShow()
{
    numberOfChecked = $('input:checkbox:checked').length;
    if (numberOfChecked == 1) // Only one => renaming is allowed
    {
        $('#txtUpd').removeClass('hidden')
        $('#cmdUpd').removeClass('hidden')
    }
    else
    {
        $('#txtUpd').addClass('hidden')
        $('#cmdUpd').addClass('hidden')
    }
    if (numberOfChecked > 0) // at least one selected => can delete
        $('#cmdDel').removeClass('hidden')
    else
        $('#cmdDel').addClass('hidden')
}
