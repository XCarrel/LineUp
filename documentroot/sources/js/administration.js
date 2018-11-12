// Code that allows viewing and editing artists' data from the same page
// using ajax and no form
// X. Carrel
// Oct 2018

$(document).ready(function () {

    // Make the save button appear when a change is made in the page
    $('input').keypress(function () {
        touch()
        equal()
        touchrename()
    })
    $('input:checkbox').click(function () {
        showbutton()
    })

    // Rename
    $('#cmdRename').click(function () {
        rename()
    });
    // Add
    $('#cmdSave').click(function () {
        add()
    })

    $('#test').click(function () {
        test()
    })

    // Delet
    $('#cmdSuppr').click(function () {
        suppr()
    })


})

// Mark the page as dirty, i.e: changes were made for the add input / button
function touch() {

        let ok = true
        ok = ($('#inputAdd').val().length >= 0 ) // description must be filled
        if (ok)
            $('#cmdSave').prop('disabled',false)
        else
            $('#cmdSave').prop('disabled',true)

}

// Mark the page as dirty, i.e: changes were made for the rename input / button
function touchrename() {

    let ok = true
    ok = ($('#inputRename').val().length >= 0 ) // description must be filled
    if (ok)
        $('#cmdRename').prop('disabled',false)
    else
        $('#cmdRename').prop('disabled',true)

}

// test the input if it's equal to an existing name and disable it if it's true
function equal() {

    var allVals = [];
    $('input[type=checkbox]').each(function () {
        allVals.push($(this).val());
    })
    console.log(allVals);

    if ($('#inputAdd').val().inArray(allVals))
        $('#cmdSave').prop('disabled',true)
    else
        $('#cmdSave').prop('disabled',false)

}
// try to take all the checked id and save them in a var. But save multiple times the first id selected.
// so i cannot do the supression of multiple checked genders.
function test() {



    var sList = [];
     $('input[name=rbtgender]:checked').each(function () {
         sList += $('input[name=rbtgender]:checked').data('cid');
     });

     console.log (sList);
         /*$('input[name=rbtgender]:checked').each(
             function () {
                 $oui = $('input[name=rbtgender]:checked').data('cid');
             }
         );
             alert($oui);
     */

    }


// show buttons when a checkbox is checked
function showbutton() {
    $('#cmdRename').removeClass('hidden');
    $('#cmdSuppr').removeClass('hidden');
    $('#inputRename').removeClass('hidden');
}



// Save the current values on the server using a post over ajax
function add() {
    $.post(
        "?page=apiadd",
        {
            "gendername" : $('#inputAdd').val(),
        },
        location.reload()
    )
}

// call the apirename and reload the page
function rename() {
    $.post(
        "?page=apirename",
        {
            "genderid": $('input[name=rbtgender]:checked').data('cid'),
            "gendername" : $('#inputRename').val(),
        },
        location.reload()
    )
}

// call the apidel and reload
function suppr() {
    $.post(
        "?page=apidel",
        {
            "genderid": $('input[name=rbtgender]:checked').data('cid'),
            "gendername" : $('#inputRename').val(),
        },
        location.reload()
    )
    
}
