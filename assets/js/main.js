$(document).ready(function(){
    $("fieldset").hide();
    
    $("input[type='radio']").change(function(){
        if($("input[type='radio']:checked").val()=="email"){
            $("fieldset").show();
            $("#textContainer").hide();
            $("#emailContainer").show();
        } else if($("input[type='radio']:checked").val()=="text"){
            $("fieldset").show();
            $("#textContainer").show();
            $("#emailContainer").hide();
        } else {
            $("fieldset").hide();
            $("#textContainer").hide();
            $("#emailContainer").hide();
        }
    });
    
    /*$("#carrier").change(function(){
        alert($("#carrier").val());
    })*/
    
    $("button[type='submit']").click(function(event){
        
    });
    
});