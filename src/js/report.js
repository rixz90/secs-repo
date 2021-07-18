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
                if(e == "NullInput"){
                    $("#error").text("*Search is empty");
              } else if(e == "NotInteger"){
                    $("#error").text("*User Id must be Integer");
              } else{
                    $(e).replaceAll('#location');
              }
                
        });
    });
});