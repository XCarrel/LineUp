$(document).ready(function () {
    $('.addGender').keypress(function () {
        touch()
    })
})

$('#cmdAdd').click(function () {
    save()
})

function touch() {
    let ok = true
    if (ok) {
        $('#cmdAdd').prop('disabled',false);
        $('#cmdAdd').removeClass('disabled');
        $('#cmdAdd').addClass('admin');
    }
    else {
        $('#cmdAdd').prop('disabled',true);
        $('#cmdAdd').addClass('disabled');
        $('#cmdAdd').removeClass('admin');
    }
}
function checkexist(){
    if($('input:checkbox').val){
        alert('EXIST');
    }
}

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