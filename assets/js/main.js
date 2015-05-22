$(document).ready(function(){
    $("fieldset").hide();
    
    var type, address, number, subject, carrier, eBody, tBody, amount;
    
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
        event.preventDefault();
        
        type = $("input[type='radio']:checked").val();
        address = $("#email").val();
        number = $("#phoneNumber").val();
        subject = $("#subject").val();
        carrier = $("#carrier").val();
        eBody = $("#body").val();
        tBody = $("#message").val();
        amount = $("#amount").val();
        
        $.post("mail.php",{
            type: type,
            address: address,
            number: number,
            subject: subject,
            carrier: carrier,
            eBody: eBody,
            tBody: tBody,
            amount: amount
        });
        
    });
    
});