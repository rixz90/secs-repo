$(document).ready(function(){ 
    var defaultVal = $("#location").val();
    
    $("select[name='branch']").on('change',function(){
        $.ajax({
            type: "GET",
            url: "./update_complaint.php",
            data : {
                "branch" : $(this).val(),
                "defaultVal" : defaultVal
            },
            dataType : "text",
          }).done(function(e) {
            $(e).replaceAll('#location');
        });
    });
});