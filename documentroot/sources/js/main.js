$(document).ready(function(){
    $("input").change(function(){
        if(isDitry()){
            $("#buttonSumbit").css({"display": "inline"});    
        }else{
            $("#buttonSumbit").css({"display": "none"});    
        }    
    })
    $("select").change(function(){
        if(isDitry()){
            $("#buttonSumbit").css({"display": "inline"});    
        }else{
            $("#buttonSumbit").css({"display": "none"});    
        }      
    })
    $("input[type=radio][name=country]").change(function(){
        if(isDitry()){
            $("#buttonSumbit").css({"display": "inline"});    
        }else{
            $("#buttonSumbit").css({"display": "none"});    
        }  
    })
    $("textarea").keyup(function(){
        if(isDitry()){
            $("#buttonSumbit").css({"display": "inline"});    
        }else{
            $("#buttonSumbit").css({"display": "none"});    
        }  
    });
    $("textarea").on('paste',function(){
        if(isDitry()){
            $("#buttonSumbit").css({"display": "inline"});    
        }else{
            $("#buttonSumbit").css({"display": "none"});    
        }  
    });

    $("#buttonSumbit").click(function(){
        $.ajax({
            method:"POST",
            url: "?page=api",
            data:{
                id:$("#id").val(),
                name:$("#name").val(),
                description:$("#description").val(),
                gender_id:$("#gender option:selected").val(),
                country_id:$('input[type=radio][name=country]:checked').attr('value'),
            },
            success: function(data) {
                $("#notification-text").text(data);
                $("#buttonSumbit").css({"display": "none"});
                $("#notification").css({"display": "block"});
                setTimeout(function(){
                    $("#notification").css({"display": "none"});
                }, 2000);
            }
        });
    });

    $('#name').on('input',function(e){
        if($("#name").val().length > 0){
            $("#buttonCreateNewGender").addClass("active");
            $("#buttonCreateNewGender").removeClass("disabled");
            $("#buttonCreateNewGender").removeAttr("disabled");

            $("#buttonUpdateGender").addClass("active");
            $("#buttonUpdateGender").removeClass("disabled");
            $("#buttonUpdateGender").removeAttr("disabled");

        }else{
            $("#buttonCreateNewGender").addClass("disabled");
            $("#buttonCreateNewGender").removeClass("active");
            $("#buttonCreateNewGender").attr("disabled","disabled");

            $("#buttonUpdateGender").addClass("disabled");
            $("#buttonUpdateGender").removeClass("active");
            $("#buttonUpdateGender").attr("disabled","disabled");

        }
        $('input[type=checkbox]').each(function() {
            if($(this).data('name')==$("#name").val()) {
                console.log("here")
                $("#buttonCreateNewGender").addClass("disabled");
                $("#buttonCreateNewGender").removeClass("active");
                $("#buttonCreateNewGender").attr("disabled","disabled");

                $("#buttonUpdateGender").addClass("disabled");
                $("#buttonUpdateGender").removeClass("active");
                $("#buttonUpdateGender").attr("disabled","disabled");
                return 1;
            }
        });

    });

    $("input[type=checkbox]").click(function () {
        let numberChecked = $( "input[type=checkbox]:checked" ).length;
        if (numberChecked == 0) {
            $("#buttonCreateNewGender").css({"display": "block"});
            $("#buttonDelete").css({"display": "none"});
            $("#buttonUpdateGender").css({"display": "none"});
            $("#name").css({"display": "block"});
            $("#name").val()
        }else if(numberChecked == 1){
            $("#buttonCreateNewGender").css({"display": "none"});
            $("#buttonDelete").css({"display": "block"});
            $("#buttonUpdateGender").css({"display": "block"});
            $("#name").css({"display": "block"});
            $("#name").val()

        }else{
            $("#buttonCreateNewGender").css({"display": "none"});
            $("#buttonDelete").css({"display": "block"});
            $("#buttonUpdateGender").css({"display": "none"});
            $("#name").css({"display": "none"});
        }
    })
})
function isDitry(){
    if($("#countrySave").val()!= $('input[type=radio][name=country]:checked').attr('value')){
        return 1;
    }else{
        if($("#nameSave").val()!= $('input[name=name]').val()){
            return 1;
        }else{
            if($("#genderSave").val()!= $("#gender option:selected").val()){
                return 1;
            }else{
                error_log(var_dump($("#descriptionSave").val().localeCompare($("#description").val())));
                if($("#descriptionSave").val().localeCompare($("#description").val())){
                    return 1;
                }else{
                    return 0;
                }
            }
        }
    }
    
}