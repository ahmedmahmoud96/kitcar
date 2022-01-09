// Confirmation Message On Button

$('.confirm').click(function () {

    return confirm('هل أنت متأكد من عملية الحذف ؟ لن تستطيع إرجاع القيمة المحذوفة !');

})




/// Notification

$(document).ready(function(){

    var down = false;
    
    $('#bell').click(function(e){
    
    var color = $(this).text();
    if(down){
    
    $('#box').css('display','none');
    down = false;
    }else{
    
    $('#box').css('height','auto');
    $('#box').css('opacity','1');
    $('#box').css('display','block');
    down = true;
    
    }
    
    });
    
    });

