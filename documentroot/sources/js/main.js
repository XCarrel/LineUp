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
               return 0;
            }
        }
    }
    
}