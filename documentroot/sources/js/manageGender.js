// Code that allows to manage gender.
// using ajax and no form
// Jarod Streckeisen
// 20 November 2018
var actualGender=[];
var actualCheckedGenderID=[]; //Get ID of checked genders
$(document).ready(function () {

    //Change event . It will listen if a checkbox is checked or unchecked
    $('input[type=checkbox][name=rbtGender]').change(function() {
        let nbchecked = 0;
        actualCheckedGenderID=[];
        //saving all the selected gender
        $('input[type=checkbox][name=rbtGender]:checked').each(function () {
            nbchecked++;
            actualCheckedGenderID.push($(this).data('gid'));
        });
        //triggering view when checkbox are selected
        if(nbchecked == 0)
        {
            $('#renamebox').removeClass('textbox').addClass('hiddendiv');
            $('#renameGender').removeClass('button').addClass('hiddendiv');
            $('#deleteGender').removeClass('button').addClass('hiddendiv');
        }
        else if (nbchecked == 1)
        {
            $('#renamebox').removeClass('hiddendiv').addClass('textbox');
            $('#renameGender').removeClass('hiddendiv').addClass('hidden');
            $('#deleteGender').removeClass('hiddendiv').addClass('button');
        }
        else{
            $('#renamebox').removeClass('textbox').addClass('hiddendiv');
            $('#renameGender').removeClass('button').addClass('hiddendiv');
        }

        console.log(actualCheckedGenderID);
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
    $('#renamebox').keyup(function () {
        touch()
    })
    // Call Save function
    $('#addGender').click(function () {
        addGender();
    })
    //Call rename function
    $('#renameGender').click(function(){
        renameGender();
    });
    //Call delete function
    $('#deleteGender').click(function(){
        removeGender();
        console.log("i'm clicked");
    });

})
var g
// Mark the page as dirty, i.e: changes were made
function touch() {
    let okR = true
    let okA = true
    let sameR = false // value for rename box
    let sameA = false //value for add box
    //foreach gender , testing if the text box value is the same. if yes stop the loop.
    // toUpperCase : compare with both string to toUpperCase
    //trim : even if the user add a space at the end, he will not be able to add a gender with same name
    actualGender.forEach(function(gender){
        if(!sameA)
        {
            sameA = gender.toUpperCase().trim() == $('#addbox').val().toUpperCase().trim();

        }
        if(!sameR){
            sameR = gender.toUpperCase().trim() == $('#renamebox').val().toUpperCase().trim();
        }
    });
    okA = ($('#addbox').val().length > 0) // description must be filled
    okR = ($('#renamebox').val().length > 0)
    //if description is not empty and there isn't any gender with the same name, allow to press "add" button
    if (okA && sameA == false){
        $('#addGender').removeClass('hidden')
        $('#addGender').addClass('button')
    }
    else{
        $('#addGender').addClass('hidden')
        $('#addGender').removeClass('button')
    }
    if(okR && sameR == false){
        $('#renameGender').removeClass('hidden')
        $('#renameGender').addClass('button')
    }
    else{
        $('#renameGender').addClass('hidden')
        $('#renameGender').removeClass('button')
    }
}

// Add gender
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
//Rename gender
function renameGender() {
    $.post(
        "?page=api",
        {
            "action" : "rename",
            "genderid" : actualCheckedGenderID[0],
            "genderNewName": $('#renamebox').val()
        },
    )
    location.reload();
}
// Remove gender
function removeGender() {
    $.post(
        "?page=api",
        {
            "action" : "remove",
            "gendersid" : actualCheckedGenderID

        },
    )
    location.reload();
}
