$(document).ready(function(){

    $('#categoryPanel').hide();
    $('#locationPanel').hide();
    $('#adminPanel').hide();

    $('#nav_bra').click(function(){
        show('#branchPanel');
    });
    $('#nav_cat').click(function(){
        show('#categoryPanel');
    });
    $('#nav_loc').click(function(){
        show('#locationPanel');
    });
    $('#nav_adm').click(function(){
        show('#adminPanel');
    });

    function show(panel){
        let arr = ['#branchPanel','#categoryPanel','#locationPanel','#adminPanel'];
        arr.forEach(p => {
            if(panel == p) {
                $(p).show();
                $('#nav_'+ p.substr(1,3)).addClass("active");
            }
            else {
                $(p).hide();
                $('#nav_'+ p.substr(1,3)).removeClass("active");
            }
        });
    }

    //When click row to be update/delete.
    var target = null;
    $('tr.option').click(function(){    
        var selected_option = $(this);
        target = $(".f-table:eq(0)");

        //Select f-table class that below the option class clicked by user
        var i = 0;
        while(selected_option.offset().top > target.offset().top){
            if(i >= $(".f-table").length)
                break;
            i += 1;    
            target =  $(".f-table:eq("+i+")");
        }

        var c = $(this).children().length;
        for(var i=0; i<c; i++){
            var value = $(this).children()[i].innerHTML;
            target.find('input[type="text"]:eq('+i+')').val(value);
        }
        target.find(".button-submit").hide();
        target.find(".button-update,.button-remove").css("visibility","visible");
        target.find("input[name=id]").prop( "disabled", true );

        target.find("input[name='pass']").val("");
    });

    //Click update button
    $('.button-update').click(function(e){
        e.preventDefault();
        var len =target.find("input[type='text']").length;

        const params = {};
        
        for(var i=0; i<len; i++){
            let key = target.find("input[type='text']:eq("+i+")").attr("name");
            let value = target.find("input[type='text']:eq("+i+")").val();
            let temp = {}
            temp[key] = value;
            Object.assign(params,temp);
        }
        let type = target.children()[0].value;
        Object.assign(params,{type:type});

        confirmUpdate(params);
    });

    $('.button-remove').click(function(e){
        e.preventDefault();
        let params = {
            "id" : target.find("input[name='id']").val(),
            "type" : target.find("input[name='type']").val()
        };
        console.log(target.find("input[name='type']").length);
        if(target.find("input[name='type']").length > 0){
            let temp = {
                "pass" : target.find("input[name='pass']").val(),
                "c_pass" : target.find("input[name='c_pass']").val()
            };
            Object.assign(params,temp);
        }

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
                        url : "./delete.php",
                        data : params,
                        dataType : "text",
                        async : false,
                        success : function(){
                            $.alert({
                                title: '<h4>Delete successful!</h4>',
                                content: 'Simple alert!',
                                buttons: {
                                    OK : function(e){ location.reload(); }
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


    function confirmUpdate(params){
        $.confirm({
            icon: 'fa fa-warning',
            title: '<h4>Updating Database</h4>',
            content: '<p style="font-size:1.5rem;">Simple confirm!</p>',
            buttons: {
                confirm: function() {
                    $.ajax({
                        type : "POST",
                        url : "./update.php",
                        data : params,
                        dataType : "text",
                        async : false,
                        success : function(){
                            $.alert({
                                title: '<h4>Update successful!</h4>',
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

