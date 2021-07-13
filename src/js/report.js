$(document).ready(function(){
    $("button").on('click',function(){
        $.ajax({
            type: "GET",
            url: "./search.php",
            dataType : "text",
            data : {
                "report" : true,
                "date" : $("#date").val(),
                "name" : $("#name").val(),
                "branch" : $("#branch").val(),
                "status" : $("#status").val(),
            },
            dataType : "text",
          }).done(function(e) {
            $(e).replaceAll('#location');
        });
    });
});