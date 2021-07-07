$(document).ready(function(){
    $(".button-update,.button-remove").hide();

    $('tr.option').click(function(){
        
        var selected_option = $(this);
        var target = $(".f-table:eq(0)");

        //Select f-table class that below the option class clicked by user
        var i = 0;
        while(selected_option.offset().top > target.offset().top){
            if(i == $(".f-table").length)
                break;
            i += 1;    
            target =  $(".f-table:eq("+i+")");
        }

        var c = $(this).children().length;
        for(var i=0; i<c; i++){
            var value = $(this).children()[i].innerHTML;
            target.find('input:eq('+i+')').val(value);
        }

        target.attr("action","./update.php");
        target.find(".button-submit").hide();
        target.find(".button-update,.button-remove").show();
    });
});