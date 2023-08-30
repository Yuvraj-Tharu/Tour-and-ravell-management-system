$(function(){
    $(".main_form").on('submit', function(e){
        e.preventDefault();

        $.ajax({
            url:$(this).attr('action'),
            method:$(this).attr('method'),
            data:new FormData(this), //object initilize
            processData:false,
            dataType:'json',
            contentType:false,
            beforeSend:function(){
                $(document).find('span.error-text').text('');
            },
            success:function(data){
                try{
                    if(data.status){
                        window.location.replace(data.redirect);
                    }else{
                        $(document).find('span.error-text').text(data.message);
                    }
                }catch(e){
                    console.log(e);
                }
            }
        });
    });
});
