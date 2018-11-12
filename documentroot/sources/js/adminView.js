// Code for the admin page where you can add new gender or delete a selected gender.
// Senistan Jegarajasingam
// Oct 2018

$(document).ready(function () {
    $('.addGender').keypress(function () {
        touch()
    })

    $('input:checkbox').change(function () {
        getCheckedCheckbox()
        enable()
    })
})

$('#cmdAdd').click(function () {
    save()
})

$('#cmdDelete').click(function () {
    deleteGender()
})

// Check if the page as changed
function touch() {
    $('#cmdAdd').prop('disabled',false);
    $('#cmdAdd').removeClass('disabled');
    $('#cmdAdd').addClass('admin');
}

// If a checkbox has been checked, we shows the buttons
function enable(){
    $('#cmdDelete').removeClass('hidden');
    $('#cmdRename').removeClass('hidden');
    $('.renameGender').removeClass('hidden');
}

// Add the new value the user has typed
function save() {
    $.post(
        "?page=apigender",
        {
            "name": $('.addGender').val(),
        },
        function () {
            $('#cmdAdd').addClass('disabled');
            $('#cmdAdd').removeClass('admin');
            $('#cmdAdd').prop('disabled',true);
            location.reload()
        }
    )
}

// POST the array and get the ids.
function deleteGender(){
    $.post(
        "?page=apigender",
        {
            "ids": getCheckedCheckbox(),
        },
        function () {
            location.reload()
        }
    )
}

// Check what checkbox as been checked. As we can have multiple checkbox selected, we have to create an array.
function getCheckedCheckbox(){
    /* declare an checkbox array */
    var chkArray = [];

    /* look for all checkboes that have a class 'chk' attached to it and check if it was checked */
    $("input:checkbox:checked").each(function() {
        chkArray.push($(this).val());
    });
    return chkArray
}
