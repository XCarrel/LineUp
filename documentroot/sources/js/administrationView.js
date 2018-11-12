// Code that allows viewing and editing artists' data from the same page
// using ajax and no form
// X. Carrel
// Oct 2018

$(document).ready(function () {

    // le bouton est désactivé
    $('#btnAdd').prop('disabled', true);

    // le bouton s'active
    $('#newGender').keypress(function () {
        btn()
    })

    // le bouton s'active
    $('#newGender').change(function () {
        btn()
    })

    // Ajout d'un genre dans la base de données
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

    // suppression d'un ou plusieurs genre en même temps dans la base de données
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

    // Modifier le nom d'un genre dans la base de données
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

function btn()
{
    let ok = true
    ok = ($('#newGender').val().length > 0) // description must be filled
    if (ok)
        $('#btnAdd').prop('disabled', false);
    else
        $('#btnAdd').prop('disabled', true);
}