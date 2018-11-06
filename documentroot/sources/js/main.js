$(document).ready(function (){
    // hide save button
    $('#savebutton').hide();

    //Show button when a value has changed
    $('#countrybox').change(function () {
        $('#savebutton').show();
    });

    $('#genderslists').change(function () {
       $('#savebutton').show();
    });

    $('#description').change(function () {
        $('#savebutton').show();
    });

    //Send new data on click
    $("#savebutton").click(function () {
        $.ajax({
            method: 'POST',

            data: {'gender':$('#genderslists option:selected').val()},
            'country':$(#countrylists).val(),
            success: function (data) {
                $('#savebutton').hide();
            }    
        });
    });
})