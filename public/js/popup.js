// const buyBtns = document.querySelector('.js-buy-ticket')
// const modal = document.querySelector('.js-modal')
// const modalClose = document.querySelector('.js-modal-close')
// function showBuyTickets(){
//     modal.classList.add('open')
// }
// function hideBuyTickets(){
//     modal.classList.remove('open')
// }
// buyBtns.addEventListener('click',showBuyTickets)
// modalClose.addEventListener('click', hideBuyTickets)

$(document).ready(function(){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('.js-buy-ticket').click(function(){
        $('.modal').addClass('open');
    })

    $('.js-modal-close').click(function(){
        $('.modal').removeClass('open');
    })

    $('#upload_form').on('submit',function(event){
        event.preventDefault();
        var x = new FormData(this);
        console.log(x);
        $.ajax({
            type:"post",
            url: "post",
            data:new FormData(this),
            contentType: false,
            processData: false,
            success: function(){
                alert('successfully');
            },
            error: function(){
                alert('failed');
             },
        }) 
    })
})


