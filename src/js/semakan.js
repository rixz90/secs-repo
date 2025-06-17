$(document).ready(function(){ 
    $('#staff_id').hide();
    $('#student_id').hide();
    $('#guest_name').hide();

    $("#form input[type='radio']").on('change',function(){
        var userType = $('input[name=userType]:checked', '#form').val();
        if(userType == "staff"){
            $("#staff_id").show();
            hide(["#student_id","#guest_name"]);
        } else if(userType == "student"){
            $("#student_id").show();
            hide(["#staff_id","#guest_name"]);
        } else {
            $("#guest_name").show();
            hide(["#staff_id","#student_id"]);
        }
    });

    function hide(arr){
        arr.forEach(e => {
            $(e).find('input').val("");
            $(e).hide();
        });
    }

    $("#form").submit(function(event){
        event.preventDefault();
        var userType = $("input[name='userType']:checked").val();
        $.ajax({
            type: "POST",
            url: "./semakan_search.php",
            data : {
                "userType" : userType,
                "staffId" : $("#staffId").val(),
                "studentId" : $("#studentId").val(),
                "name" : $("#name").val()
            },
            dataType : "text",
          }).done(function(e) {
            $(e).replaceAll('#location');
        });
    });
});