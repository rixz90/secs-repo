$(document).ready(function(){
    $("button").on('click',function(){
        $.ajax({
            type: "GET",
            url: "./search.php",
            dataType : "text",
            data : {
                "report" : true,
                "date" : $("#date").val(),
                "user_id" : $("#user_id").val(),
                "branch" : $("#branch").val(),
                "status" : $("#status").val(),
            },
            dataType : "text",
          }).done(function(e) {
              console.log(e);
              if(e != "NullInput"){
                $(e).replaceAll('#location');
              } else {
                  $("#error").text("*Search is empty");
              }
                
        });
    });
});