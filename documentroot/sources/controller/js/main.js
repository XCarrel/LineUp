// Function that dropdown the menu */
(function(){
    /*1*/var customSelects = document.querySelectorAll(".custom-dropdown__select");
    /*2*/for(var i=0; i<customSelects.length; i++){
        if (customSelects[i].hasAttribute("disabled")){
            customSelects[i].parentNode.className += " custom-dropdown--disabled";
        }
    }
})()

$( document ).ready(function() {

/** Disable button if there's a match between the input from the user and the checkboxes value */
    $('#text_rename').on('change', function() {
    var user_input = $("#text_rename").val();
    var checkbox_val = Array();
    $("input:checkbox[name=checkbox]:checked").each(function() {
        checkbox_val.push(this.value);
        if (jQuery.inArray(user_input, checkbox_val) !== -1) {
            document.getElementById("btn").disabled = true;
        }
    });
});


/** Disable button if there's a match between the input from the user and the checkboxes value */
    $('#text_input').on('change', function() {
    var user_input = $("#text_input").val();
        var checkbox_val = Array();
    $("input:checkbox[name=checkbox]").each(function() {
        checkbox_val.push(this.value);
        if (jQuery.inArray(user_input, checkbox_val) !== -1) {
            document.getElementById("btn").disabled = true;
        }
    });
    });


/** Show delete button and rename button when checkbox selected */
    $('#btn_delete').hide()
    $('#btn_rename').hide()
    $('.checkbox').on('change', function(){  if(this.checked) { $('#btn_delete').show(); $('#btn_rename').show(); } else { $('#btn_delete').hide(); $('#btn_rename').hide();} });


});

/** Get data via POST method on click button add  */
$(document).on('click', '#btn', function() {
    var gender = $("input[name='text']").val();
    $.ajax({
        type: "POST",
        data: {gender:gender},
        url: "/?page=api",
        success: $(document).ajaxSuccess(function() {
            alert("AJAX request successfully completed");
            window.location.reload();
        }),
        error: function(jqXHR, textStatus, errorThrown) {
            alert('Erreur !');
            console.log(gender);
            console.log(textStatus);


        }

    });
});

/** Get data via POST method  on click button delete*/
$(document).on('click', '#btn_delete', function() {
    var gender_id = Array();
    $('input[name="checkbox"]:checked').each( function()
    {
        gender_id.push(this.value);
    });
    $.ajax({
        type: "POST",
        data: {gender_id:gender_id},
        url: "/?page=api",
        success: $(document).ajaxSuccess(function() {
            alert("AJAX request successfully completed");
            window.location.reload();
        }),
        error: function(jqXHR, textStatus, errorThrown) {
            alert('Erreur !');
            console.log(gender_id);
            console.log(textStatus);


        }

    });
});

/** Get data via POST method  on click button rename*/
$(document).on('click', '#btn_rename', function() {
    var gender_name = $("input[name='checkbox']:checked").html();
    var gender_id = $("input[name='checkbox']:checked").val();
    $.ajax({
        type: "POST",
        data: {gender_name:gender_name, gender_id_update:gender_id},
        url: "/?page=api",
        success: $(document).ajaxSuccess(function() {
            console.log(gender_name, gender_id);
            alert("AJAX request successfully completed");
            window.location.reload();
        }),
        error: function(jqXHR, textStatus, errorThrown) {
            alert('Erreur !');
            console.log(gender_name, gender_id);
            console.log(textStatus);


        }

    });
});

