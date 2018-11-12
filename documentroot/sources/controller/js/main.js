(function(){
    /*1*/var customSelects = document.querySelectorAll(".custom-dropdown__select");
    /*2*/for(var i=0; i<customSelects.length; i++){
        if (customSelects[i].hasAttribute("disabled")){
            customSelects[i].parentNode.className += " custom-dropdown--disabled";
        }
    }
})()

/** Disable button if there's a match between the input from the user and the checkboxes value */
$( document ).ready(function() {
    var user_input = document.getElementById("text_rename").value;
    $("input:checkbox[name=checkbox]").each(function() {
        var checkbox_val = $(this).val();
        if (jQuery.inArray(user_input, checkbox_val) !== -1) {
            document.getElementById("btn").disabled = true;
        }
    });
});

/** Disable button if there's a match between the input from the user and the checkboxes value */
$( document ).ready(function() {
    var user_input = document.getElementById("text_input").value;
    $("input:checkbox[name=checkbox]").each(function() {
        var checkbox_val = $(this).val();
        if (jQuery.inArray(user_input, checkbox_val) !== -1) {
            document.getElementById("btn").disabled = true;
        }
    });
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
    var gender_id = document.querySelector('.checkbox:checked').value;
    $.ajax({
        type: "POST",
        data: {gender:gender_id},
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

/** Get data via POST method  on click button delete*/
$(document).on('click', '#btn_rename', function() {
    var gender_name = $("input[name='checkbox']:checked").html();
    var gender_id = $("input[name='checkbox']:checked").val();
    $.ajax({
        type: "POST",
        data: {gender:gender_name, gender_id:gender_id},
        url: "/?page=api",
        success: $(document).ajaxSuccess(function() {
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

/** Show delete button and rename button when checkbox selected */
$( document ).ready(function() {
    $('#btn_delete').hide()
    $('.checkbox').on('change', function(){  if(this.checked) { $('#btn_delete').show()} })
    $("input[type='text']").on('change', function () {  $('#btn_rename').show()})
});