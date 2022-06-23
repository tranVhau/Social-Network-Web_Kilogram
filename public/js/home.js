$(document).ready(function () {  


    $('.icon-like-0').add('.icon-like-1').click(function() {
        postID = $(this).attr('id');
        color = $(this).css("color");

        if(color === "rgb(81, 81, 81)"){
            $(this).css({'color': '#ff607c'});
        }
        else{
            $(this).css({'color': 'rgb(81, 81, 81)'});
        }
        $.ajax({
            type: "post",
            url: "/Home/like",
            data: {'postID' : postID},
            success: function (data) {
                $('.like-count-'+postID).text(data.likecount)
            }
        })
      });



    $('.follow-btn').click(function(){
        followId = $(this).attr('id');
        
        if($(this).text() == "Following"){
            $(this).text("Follow")
            $(this).css({'color': 'RGB(76, 136, 245)', 'font-style':'normal' })
        }else{
            $(this).text("Following")
            $(this).css({ 'color': 'RGB(126, 127, 128)', 'font-style':'ITALIC' })
        }  
        $.ajax({
            type: "post",
            url: "/Home/follow",
            data: {'followID' : followId},
            success: function (data) {
               
            },
            error: function(data){
                
             },
        });
    });
    
})