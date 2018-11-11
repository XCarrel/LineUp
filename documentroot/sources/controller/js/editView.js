/** Show save button on change */
$( document ).ready(function() {
    $('#save').hide()
    $('#gender_list').change(function(){  $('#save').show()})
    $("input[type='radio']").on('change', function () {  $('#save').show()})
});

/** Get data via POST method */
$(document).on('click', '#save', function() {
    var kind = $("#gender_list option:selected").val();
    var radio = $("input[name='radio']:checked").val();
    var image = $(".image").attr("src");
    var tarr = image.split('/');      // return everything inside / /
    var file = tarr[tarr.length-1]; // name + extension
    var id = $("#prodId").val();
    var name = $("div[class='name']").html();
    var desc = $("#description").val();
    var contract = $("#contract_id").val();
    $.ajax({
        type: "POST",
        data: {id:id, Name:name, Description:desc, Gender_id:kind, Country_id:radio, Contract_id:contract, Mainpicture:file},
        url: "/?page=api",
        success: $(document).ajaxSuccess(function() {
            alert("AJAX request successfully completed");
            window.location.reload();
        }),
        error: function(jqXHR, textStatus, errorThrown) {
            alert('Erreur !');
            console.log(kind, radio, file, id, name, desc, contract);
            console.log(textStatus);


        }

    });
});