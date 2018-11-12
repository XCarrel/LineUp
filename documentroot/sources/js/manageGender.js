// Code that allows viewing and editing artists' data from the same page
// using ajax and no form
// X. Carrel
// Oct 2018
var actualGender=[];
var actualCheckedGender=[];
var singleGender = {};
$(document).ready(function () {

    //Change event . that will listen if a checkbox is checked or unchecked
    $('input[type=checkbox][name=rbtGender]').change(function() {
        actualCheckedGender=[];

        //saving all the selected gender
        $('input[type=checkbox][name=rbtGender]:checked').each(function () {
            //singleGender.id = $(this).data('gid');
            //singleGender.name = $(this).data('gname');
            actualCheckedGender.push($(this).data('gname'));
        });
        //triggering view when checkbox are selected
        if(actualCheckedGender.length == 0)
        {
            $('#renamebox').removeClass('textbox').addClass('hiddendiv');
            $('#renameGender').removeClass('button').addClass('hiddendiv');
            $('#deleteGender').removeClass('button').addClass('hiddendiv');
        }
        else if (actualCheckedGender.length == 1)
        {
            $('#renamebox').removeClass('hiddendiv').addClass('textbox');
            $('#renameGender').removeClass('hiddendiv').addClass('button');
            $('#deleteGender').removeClass('hiddendiv').addClass('button');
        }
        else{
            $('#renamebox').removeClass('textbox').addClass('hiddendiv');
            $('#renameGender').removeClass('button').addClass('hiddendiv');
        }
        console.log(actualCheckedGender);

    });
    //saving all existing gender name
    $('input[type=checkbox][name=rbtGender]').each(function(){

        actualGender.push($(this).data('gname'));
        //console.log(actualGender);
    })
    //Keyup and not keydown becaust it seems that the input value is one key late.
    $('#addbox').keyup(function () {
        touch()
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

    $('textarea').on('paste', function () {
        touch()
    })*/


    // Save
    $('#addGender').click(function () {
        addGender();
    })
    $('$renameGender').click(function(){
        renameGender();
    });

})
var g
// Mark the page as dirty, i.e: changes were made
function touch() {
    let ok = true
    let same = false
    //foreach gender , testing if the text box value is the same. if yes stop the loop.
    actualGender.forEach(function(gender){
        if(!same)
        {
            same = gender == $('#addbox').val();
        }
    });
    ok = ($('#addbox').val().length > 0) // description must be filled
    //if description is not empty and there isn't any gender with the same name, allow to press "add" button
    if (ok && same == false){
        $('#addGender').removeClass('hidden')
        $('#addGender').addClass('button')
    }
    else{
        $('#addGender').addClass('hidden')
        $('#addGender').removeClass('button')
    }
}

// Save the current values on the server using a post over ajax
function addGender() {
    $.post(
        "?page=api",
        {
            "action" : "add",
            "genderName": $('#addbox').val()
        },
        function () {
            /*$('#lblSaved').removeClass('hidden')
            $('#cmdSave').addClass('hidden')
            setTimeout(function(){
                $('#lblSaved').addClass('hidden')
            }, 1500)*/
        }

    )
    location.reload();
}
function renameGender() {
    $.post(
        "?page=api",
        {
            "action" : "rename",
            "genderOldName": actualCheckedGender[0],
            "genderNewName": $('#renamebox').val()
        },
        function () {
            /*$('#lblSaved').removeClass('hidden')
            $('#cmdSave').addClass('hidden')
            setTimeout(function(){
                $('#lblSaved').addClass('hidden')
            }, 1500)*/
        }

    )
    location.reload();
}
