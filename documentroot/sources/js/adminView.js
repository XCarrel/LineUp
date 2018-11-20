// Code that allows viewing and editing artists' data from the same page
// using ajax and no form
// Philippe B.
// Oct 2018

$(document).ready(function () {

    // Enable the add button when the addtextfield is not empty
    $('input:text').keydown(function () {
        touch()
    })

    // Add new gender
    $('#btnAdd').click(function () {
        //addGender()
    })


    $('.cbxgender').change(function(){
        var idcheck = $(this).val();
        if ($(this).is(":checked")) {
            $('#btnDelete').removeClass('hidden')
            $('#btnRename').removeClass('hidden')
            $('#tbxRename').removeClass('hidden')
        } else {
            $('#btnDelete').addClass('hidden')
            $('#btnRename').addClass('hidden')
            $('#tbxRename').addClass('hidden')
        }
    });

})

function showtime() {
    var checkBox3000 = document.getElementById("cbxgender");
    var btn = document.getElementById("btnRename");
    if (checkBox3000.checked == true) {
        $('#btnRename').removeClass('hidden')
    }
    else {
        $('#btnRename').addClass('hidden')
    }
}

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
/*function addGender() {
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
*/