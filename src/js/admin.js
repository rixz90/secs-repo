$(document).ready(function(){
    var target = ""; 
    $('tr.option').click(function(){ 
        target = $(this);

        let val = target.find("#id").text();
        
        $("tr.option").css("background-color","initial");
        $(this).css("background-color","#ddd");

        $("input[type='hidden']").attr("value", val);
        
        $('#update').css("visibility","visible");
        $('#remove').css("visibility","visible");
    });

    $('#remove').click(function(e){
        e.preventDefault();
        console.log($("input[type=hidden]:eq(1)").val());
        let params = {
            "id" : $("input[type=hidden]:eq(1)").val(),
            "submit" : "submit"
        };

        confirmDelete(params);
        
    });

    function confirmDelete(params){
        $.confirm({
            icon: 'fa fa-warning',
            title: '<h4>Delete Database</h4>',
            content: '<p style="font-size:1.5rem;">Simple confirm!</p>',
            buttons: {
                confirm: function() {
                    $.ajax({
                        type : "POST",
                        url : "./delete_complaint.php",
                        data : params,
                        dataType : "text",
                        async : false,
                        success : function(){
                            $.alert({
                                title: '<h4>Delete successful!</h4>',
                                content: 'Simple alert!',
                                buttons: {
                                    OK : function(e){ 
                                        location.reload();
                                     }
                                }
                            });
                        },
                        error : function(e){
                            $.alert({
                                title: "Error Occur!",
                                content: "<p style='font-size:2rem'>"+e.responseText+"</p>"
                            })
                        }
                    });
                },
                cancel: function () { $.alert('<h2>Canceled!</h2>');}
            }
        });
    }
});