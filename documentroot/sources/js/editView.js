// Code that allows viewing and editing artists' data from the same page
// using ajax and no form
// X. Carrel
// Oct 2018

$(document).ready(function () {

    // Make the save button appear when a change is made in the page
    $('input').keypress(function () {
        touch()
    })
    $('input:radio').click(function () {
        touch()
    })
    $('select').change(function () {
        touch()
    })
    $('textarea').keydown(function () {
        touch()
    })
    $('textarea').on('paste', function () {
        touch()
    })

    // Cancel
    $('#cmdCancel').click(function () {
        if (!$('#cmdSave').hasClass('hidden')) // must ask for confirmation to abandon changes
        {
            if (confirm('Voulez-vous abandonner le changements effectués ?'))
                location.reload()
        }
        else
            location.reload()
    })

    // Save
    $('#cmdSave').click(function () {
        save()
    })

})

// Mark the page as dirty, i.e: changes were made
function touch() {
    let ok = true
    ok = ($('#description').val().length > 0) // description must be filled
    if (ok)
        $('#cmdSave').removeClass('hidden')
    else
        $('#cmdSave').addClass('hidden')
}

// Save the current values on the server using a post over ajax
function save() {
    // find out the country id
    let cid = 0
    $('input:radio').each( function() {
        if ($(this).prop('checked')) cid = $(this).data('cid')
    })

    $.post(
        "?page=api",
        {"artistid": $('#artistid').val(), "description" : $('#description').val(), "countryid" : cid, "genderid" : $('#dpdGender').val()},
        function () {
            $('#lblSaved').removeClass('hidden')
            $('#cmdSave').addClass('hidden')
            setTimeout(function(){
                $('#lblSaved').addClass('hidden')
            }, 1500)
        }
    )
}