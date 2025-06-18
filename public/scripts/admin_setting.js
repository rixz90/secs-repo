$(document).ready(function(){

    $('#categoryPanel').hide();
    $('#locationPanel').hide();
    $('#relationPanel').hide();
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
    $('#nav_re').click(function(){
        show('#relationPanel');
    });

    function show(panel){
        let arr = ['#branchPanel','#categoryPanel','#locationPanel','#adminPanel','#relationPanel'];
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

        //If in relation table
        if(target.find('select').length > 0){
            
            let value = $(this).children()[0].innerHTML;
            $("select:eq(0)").val(value).change();
            $("#init_loc").val(value).change();
            value = $(this).children()[3].innerHTML;
            $("select:eq(1)").val(value).change();
            $("#init_bra").val(value).change();
            
        } else {
            for(let i=0; i<c; i++){
                let value = $(this).children()[i].innerHTML;
                target.find('input[type="text"]:eq('+i+')').val(value);
            }
        }  


        target.find(".button-submit").hide();
        target.find(".button-update,.button-remove").css("visibility","visible");
        target.find("input[name=id]").prop( "disabled", true );
        target.find("input[name='pass']").val("");

        target.find("button.close").css("visibility","visible");
    });

    $("button.close").click(function(e){
        e.preventDefault();
        target.find(".button-submit").show();
        target.find(".button-update,.button-remove").css("visibility","hidden");
        target.find("input[name=id]").prop( "disabled", false );
        target.find("input[type=text],input[type=password]").val("");
        target.find("select").val(0).change();
    });

    //Click update button
    $('.button-update').click(function(e){
        e.preventDefault();
        var len =target.find("input[type='text']").length;

        const params = {};
        
        let v = target.children()[0].value;
        Object.assign(params,{"type":v});
        
        //text input event
        for(var i=0; i<len; i++){
            let key = target.find("input[type='text']:eq("+i+")").attr("name");
            let value = target.find("input[type='text']:eq("+i+")").val();
            let temp = {}
            temp[key] = value;
            Object.assign(params,temp);
        }

        //select input event
        if(target.find("select").length > 0){
            for(let i=0;i<2;i++){
                let key = target.find("select:eq("+i+")").attr("name");
                let value = target.find("select:eq("+i+")").val();
                let temp = {}
                temp[key] = value;
                Object.assign(params,temp);
            }

            v = target.children()[1].value;
            Object.assign(params,{"init_loc_id":v});
            v = target.children()[2].value;
            Object.assign(params,{"init_bra_id":v});
            
        };

        //password input event
        if(target.find("input[type='password']").length > 0){
            let passVal = target.find("#pass").val();
            Object.assign(params,{"pass":passVal});
            
            let cPassVal = target.find("#c_pass").val();
            Object.assign(params,{"c_pass":cPassVal});
        };

        console.log(params);

        confirmUpdate(params);
    });

    $('.button-remove').click(function(e){
        e.preventDefault();
        
        var params = {};

        if(target.find("select").length > 0){
            params = {
                "loc_id" : $("input[name='init_loc_id']").val(),
                "bra_id" : $("input[name='init_bra_id']").val(),
                "type" : target.find("input[name='type']").val()
            }
        }else {
            params = {
                "id" : target.find("input[name='id']").val(),
                "type" : target.find("input[name='type']").val()
            };
        
            if(target.find("input[name='type']").length > 0){
                let temp = {
                    "pass" : target.find("input[name='pass']").val(),
                    "c_pass" : target.find("input[name='c_pass']").val()
                };
                Object.assign(params,temp);
            }
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
                        success : function(e){
                            popUpMsg(e);
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
                        success : function(e){
                            popUpMsg(e)
                            
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

    function popUpMsg(e){
        if(e == "DependecyErr"){
            $.alert({
                title: "<h4>Error</h4>",
                content: "<p style='font-size:2rem'>Cannot edit this Data! Depandency Issue.</p>",
                buttons: {
                    OK : function(){ }
                }
            });
        }else if(e == "notFillErr"){
            $.alert({
                title: "<h4>Error</h4>",
                content: "<p style='font-size:2rem'>One of the input is empty</p>",
                buttons: {
                    OK : function(){ }
                }
            });
        }else if(e == "passError"){
            $.alert({
                title: "<h4>Error</h4>",
                content: "<p>Wrong Password!</p>",
                buttons: {
                    OK : function(){ }
                }
            });
        } else if(e == "OK") {
            $.alert({
                title: "<h4>Database</h4>",
                content: "<p style='font-size:2rem'>Database has been modified</p>",
                buttons: {
                    OK : function(){ 
                        location.reload(); 
                    }
                }
            });
        } else {
            $.alert({
                title: "Error Occur!",
                content: "<p style='font-size:2rem'>"+e+"</p>"
            })
        }
    }
});

