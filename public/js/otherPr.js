$(document).ready(function(){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('.follow-btn').add('.follow-btn-1').click(function(){
        
        var followId = $(this).attr('id');
        var _status = "Follow"

        // $(this).removeClass('follow-btn');
        // $(this).addClass('follow-btn-1');
        if($(this).text() == "Following"){
            $(this).text("Follow")
            _status = "Follow"
            $(this).css({'background-color':'RGB(57, 169, 243)', 'border':'none', 'color': 'white', 'margin-left':'50px'})
        }else{     
            $(this).text("Following")
            _status = "Following"
            $(this).css({'background-color':'white', 'color': 'black' ,'border':'1px solid black', 'margin-left':'30px'}) 
        } 
        
        $.ajax({
            type: "post",
            url:"/Kilogram/follow",
            data: {'followId' : followId, 'stat':_status},
            success: function(response){
                
            }

        })
    })
    // $('.follow-btn-1').click(function(){
        
    //     var followId = $(this).attr('id');
    //     var _status = "Follow"

    //     // $(this).removeClass('follow-btn');
    //     // $(this).addClass('follow-btn-1');
        
    //     if($(this).text() == "Following"){
    //         $(this).text("Follow")
    //         _status = "Follow"
    //         $(this).css({'background-color':'RGB(57, 169, 243)', 'border':'none', 'color': 'white', 'margin-left':'50px'})
    //     }else{     
    //         $(this).text("Following")
    //         _status = "Following"
    //         $(this).css({'background-color':'white', 'color': 'black' ,'border':'1px solid black', 'margin-left':'30px'}) 
    //     } 
        
    //     $.ajax({
    //         type: "post",
    //         url:"/Kilogram/follow",
    //         data: {'followId' : followId, 'stat':_status},
    //         success: function(response){
                
    //         }
    //     })
    // })
})