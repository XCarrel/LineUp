$(document).ready(function () {

    // Make the save button appear when a change is made in the page

    $('input:radio').click(function () {
        touch()
    })

    // Save
    $('#cmdAjoutGender').click(function () {
        save()
    })

})


function touch() {

    $('#cmdDelGender').removeClass('hidden')
    $('#cmdModGender').removeClass('hidden')

}





function save() {
    // find out the country id
    let cid = 0
    $('input:radio').each( function() {
        if ($(this).prop('checked')) cid = $(this).data('cid')
    })

    $.post(
        "?page=api",
        {
            "genderid": $('#genderid').val(),
            "Name" : $('#name').val(),
        },

    )
}