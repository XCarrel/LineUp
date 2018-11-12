$(document).ready(function () {

    // Make the save button appear when a change is made in the page
    $('input').keypress(function () {
        touch2()
    })
    $('input:radio').click(function () {
        touch()
    })

    // Save
    $('#cmdAjoutGender').click(function () {
        save()
    })

    $('#cmdDelGender').click(function () {
        del()
    })

    $('#cmdModGender').click(function () {
        edit()
    })

})


function touch() {

    $('#cmdDelGender').removeClass('hidden')
    $('#cmdModGender').removeClass('hidden')
    $('#EditGenderText').removeClass('hidden')

}
function touch2(){
   /* let ok = true
    ok = ($('#AddGenderText').val().length > 0) // description must be filled
    if (ok)
        $('#cmdAjoutGender').removeAttr('disabled')
    else
        $('#cmdAjoutGender').attr('disabled')*/


    $('#cmdAjoutGender').removeAttr('disabled')

}

function del(){
        $("input:radio[name*=gender]:checked").each(function(){
            arr.push($(this).val());
        });
        $.ajax({
            url:'?page=api',
            type:'post',
            dataType:'text',
            data:{genderDel:arr},
            success:function(data){
                location.reload();
            }
        })
}

function edit(){

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
            "genderid": $('#genderId').val(),
            "Name" : $('#name').val(),
        },
        function () {
            $('#lblSaved').removeClass('hidden')
            $('#cmdModGender').addClass('hidden')
            setTimeout(function(){
                $('#lblSaved').addClass('hidden')
            }, 1500)
        }

    )
}