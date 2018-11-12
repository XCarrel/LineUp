// Code that allows viewing and editing artists' data from the same page
// using ajax and no form
// X. Carrel
// Oct 2018

$(document).ready(function () {

    // Enable the add button when the addtextfield is not empty
    $('input:text').keydown(function () {
        touch()
    })

    // Add new gender
    $('#btnAdd').click(function () {
        addGender()
    })

})

// Mark the page as dirty, i.e: changes were made
function touch() {
    let o;
    o = ($('#tbxAdd').val().length > 0) // description must be filled
    if (o)
        $('#btnAdd').removeAttr("disabled")
    else
        $('#btnAdd').attr("disabled", "disabled")
}

// Add the current value on the server using a post over ajax
function addGender() {
    $.post(
        "?page=apiga",
        {
            "gendername": $('#tbxAdd').val()
            //"genderid" : $('input[name=cbxgender]:checked').data('gid')
        },
        function () {
            setTimeout(function(){
                $('#lblSaved').addClass('hidden')
            }, 1500)
        }
    )
}