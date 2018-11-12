// Code for the admin page where you can add new gender or delete a selected gender.
// Senistan Jegarajasingam
// Oct 2018

$(document).ready(function () {
    $('.addGender').keypress(function () {
        touch()
    })

    $('input:checkbox').change(function () {
        getCheckedCheckbox()
        showbuttons()
    })
    $('.renameGender').keypress(function () {
        enableRename()
    })
})

$('#cmdAdd').click(function () {
    save()
})

$('#cmdDelete').click(function () {
    deleteGender()
})

$('#cmdRename').click(function () {
    renameGender()
})

// Check if the page as changed. Used only when we want to create a new gender.
function touch() {
    $('#cmdAdd').prop('disabled',false);
    $('#cmdAdd').removeClass('disabled');
    $('#cmdAdd').addClass('admin');
}

// If a checkbox has been checked, we shows the buttons. Enable function is for checkbox.
function showbuttons(){
    $('#cmdDelete').removeClass('hidden');
    $('#cmdRename').removeClass('hidden');
    $('.renameGender').removeClass('hidden');
}

function enableRename(){
    $('#cmdRename').removeClass('disabled');
    $('#cmdRename').prop('disabled',false);
}

// Check what checkbox as been checked. As we can have multiple checkbox selected, we have to create an array.
function getCheckedCheckbox(){
    /* declare an checkbox array */
    var chkArray = [];

    /* look for all checkboxes that have a class 'chk' attached to it and check if it was checked */
    $("input:checkbox:checked").each(function() {
        chkArray.push($(this).val());
    });
    return chkArray
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

// POST the array with ID(s).
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

function renameGender(){
    $.post(
        "?page=apigender",
        {
            "id": getCheckedCheckbox(),
            "name": $("input:checkbox:checked").attr("name")
        },
        function () {
            location.reload()
        }
    )
}