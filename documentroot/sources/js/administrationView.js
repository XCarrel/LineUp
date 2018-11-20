// Code that allows viewing and editing artists' data from the same page
// using ajax and no form
// X. Carrel
// Oct 2018

$(document).ready(function () {
    // le bouton s'active
    $('input').keypress(function () {
        btnAdd()
        btnUpdate()
    })

    // le bouton s'active
    $('input').change(function () {
        btnAdd()
        btnUpdate()
    })

    // certains boutons s'affichent ou se cachent suivant le nombre de checkbox checkée
    $('input:checkbox').click(function () {
        hideShow()
    })
})

// fonction qui disabled ou non le bouton pour ajouter un genre
function btnAdd()
{
    let ok = true
    ok = ($('#newGender').val().length > 0) // description must be filled
    if (ok)
        $('#btnAdd').prop('disabled', false);
    else
        $('#btnAdd').prop('disabled', true);
}

// fonction qui disabled ou non le bouton pour renommer un genre
function btnUpdate()
{
    let ok = true
    ok = ($('#inputUpdate').val().length > 0) // description must be filled
    if (ok)
        $('#btnUpdate').prop('disabled', false);
    else
        $('#btnUpdate').prop('disabled', true);
}

// fonction qui affiche ou cache les boutons pour supprimer ou renommer un genre
function hideShow() {
    checkboxChecked = $('input:checkbox:checked').length;
    if (checkboxChecked == 1) // Only one => renaming is allowed
    {
        $('#btnUpdate').removeClass('hidden')
        $('#inputUpdate').removeClass('hidden')
    }
    else
    {
        $('#btnUpdate').addClass('hidden')
        $('#inputUpdate').addClass('hidden')
    }
    if (checkboxChecked > 0) // at least one selected => can delete
        $('#btnDel').removeClass('hidden')
    else
        $('#btnDel').addClass('hidden')
}