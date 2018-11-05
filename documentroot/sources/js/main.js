$(document).ready(function(){

   $(".gender").change(function (){
      $("#SaveButton").removeclass('disable');
   })

   $(".country").change(function (){
      $("#SaveButton").removeClass('disable');
   })

   $(".description").change(function (){
      $("#SaveButton").removeClass('disable');
   })

   $("#SaveButton").click(function (){
      sendAjaxData();
   })

   function sendAjaxData(){
      $.ajax({
         method : 'POST',
         url : "?page=api",
         data : {
            gender: $(".gender option:selected").val(),
            country : $("input[name='country']:checked").val(),
            description : $(".description").val(),
         },
         success : function(data){
            console.log("Success")
         },
         error : function(data)
         {
            console.log("Failed")
         }
      })
   }
})
