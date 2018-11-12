// Code that allows viewing and editing artists' data from the same page
// using ajax and no form
// X. Carrel
// Oct 2018

$(document).ready(function () {

    $('#btnAdd').prop('disabled', true).addClass('red');

    $('#newGender').keypress(function () {
        btn()
    })
    $('#newGender').change(function () {
        btn()
    })

    // Make the save button appear when a change is made in the page
    /*$('input').keypress(function () {
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
    })*/

    $("#btnAdd").click(function () {
        $.ajax({
            method: 'POST',
            url: "?page=api",
            data : {
                gender:$('#newGender').val()
            },
            success : function() {
                location.reload();
            }
        })
    });

    $("#btnDel").click(function () {
        var arr=[];

        $("input:checkbox[name*=gender]:checked").each(function(){
            arr.push($(this).val());
        });
        var p = $('input.benf').serializeArray();
        console.log(p);
        console.log(arr);
        $.ajax({
            url:'?page=api',
            type:'post',
            dataType:'text',
            data:{genderDel:arr},
            success:function(data){
                location.reload();
            }
        })
    });

    $("#btnUpdate").click(function () {
        $.ajax({
            method: 'POST',
            url: "?page=api",
            data : {
                id:$('input[name=gender]:checked').val(),
                genderUpdate:$('#inputUpdate').val()
            },
            success : function() {
                location.reload();
            }
        })
    });
})

function checkbox() {

}
function btn()
{
    let ok = true
    ok = ($('#newGender').val().length > 0) // description must be filled
    if (ok)
        $('#btnAdd').prop('disabled', false).removeClass('red');
    else
        $('#btnAdd').prop('disabled', true).removeClass('false');
}



// Save the current values on the server using a post over ajax
function save() {
    $.post(
        "?page=api",
        {
            "artistid": $('#artistid').val(),
            "description" : $('#description').val(),
            "countryid" : $('input[name=rbtCountry]:checked').data('cid'),
            "genderid" : $('#dpdGender').val()
        },
        function () {
            $('#lblSaved').removeClass('hidden')
            $('#cmdSave').addClass('hidden')
            setTimeout(function(){
                $('#lblSaved').addClass('hidden')
            }, 1500)
        }
    )
}