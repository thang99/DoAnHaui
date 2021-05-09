<script src="{{asset('js/jquery-3.5.1.js')}}"></script>
<script src="{{asset('js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('fontawesome-free-5.15.3-web/js/fontawesome.min.js')}}"></script>
<script src="{{asset('js/swiper-bundle.min.js')}}"></script>

<script type="text/javascript">
    $(document).ready(function(){           
        $('#stars li').on('mouseover', function(){
            var onStar = parseInt($(this).data('value'), 10);         
            $(this).parent().children('li.star').each(function(e){
                if (e < onStar) {
                    $(this).addClass('hover');
                }
                else {
                    $(this).removeClass('hover');
                }
            });                
        }).on('mouseout', function(){
            $(this).parent().children('li.star').each(function(e){
                $(this).removeClass('hover');
            });
        });
               
        $('#stars li').on('click', function(){
            var onStar = parseInt($(this).data('value'), 10);
            var stars = $(this).parent().children('li.star');  
            for (i = 0; i < stars.length; i++) {
                $(stars[i]).removeClass('selected');
            }     
            for (i = 0; i < onStar; i++) {
                $(stars[i]).addClass('selected');
            }          
        })     
    });
</script>

{{-- settimeout alter --}}
<script type="text/javascript">
    $(document).ready(function(){
        setTimeout(function(){
          $("div.alert").remove();
        }, 3000 );
  
    });
</script>

{{-- rating star --}}
<script type="text/javascript">
    $(document).ready(function(){
        var star_quantity = 0;
        $(".star").click(function() {
            star_quantity = $(this).data("value");
        });
        $(".send-rating").click(function(){
            var product_id = $(".product_id").val();
            var user_id = $(".user_id").val();
            var _token = $('input[name="_token"]').val();
            $.ajax({
                url: "{{ url('/postRating') }}",
                method: "POST",
                data: {star_quantity: star_quantity, product_id: product_id, user_id: user_id, _token: _token},
                success: function(data) {
                    $("#noti-send-rating").html(data);
                }
            })
        })
    })
</script>

{{-- alert when cancel orders --}}
<script type="text/javascript">
    $(document).ready(function() {
        $('.userDel').on('click', function() {
        var hasDel = confirm('Bạn chắc chắn muốn huỷ đơn hàng')
        if (hasDel) {
            alert('Yêu cầu của bạn sẽ được xem xét');
        } 
    })
})
</script>

<script type="text/javascript">
    $(document).ready(function () {
        $('.increment-btn').click(function (e) {
            e.preventDefault();
            var incre_value = $(this).parents('.quantity').find('.qty-input').val();
            var value = parseInt(incre_value, 10);
            value = isNaN(value) ? 0 : value;
            if(value<10){
                value++;
                $(this).parents('.quantity').find('.qty-input').val(value);
            }
        });
        $('.decrement-btn').click(function (e) {
            e.preventDefault();
            var decre_value = $(this).parents('.quantity').find('.qty-input').val();
            var value = parseInt(decre_value, 10);
            value = isNaN(value) ? 0 : value;
            if(value>1){
                value--;
                $(this).parents('.quantity').find('.qty-input').val(value);
            }
        });
    });
</script>

{{-- update cart --}}
<script type="text/javascript">
    $(document).ready(function () {
        $('.changeQuantity').click(function (e) {
            e.preventDefault();
            var quantity = $(this).closest(".cartpage").find('.qty-input').val();
            var product_id = $(this).closest(".cartpage").find('.product_id').val();
            var data = {
                '_token': $('input[name=_token]').val(),
                'quantity':quantity,
                'product_id':product_id,
            };
            $.ajax({
                url: '/update-to-cart',
                type: 'POST',
                data: data,
                success: function (data) {
                    window.location.reload();
                }
            });
        });

    });
</script>

<script type="text/javascript">
    $(document).ready(function(){
        $("input").keypress(function(){
            $(this).removeClass("is-invalid")
            $(this).next("span").hide();
        });
    });
</script>

<script type="text/javascript">
    var swiper = new Swiper(".mySwiper", {
        slidesPerView: 5,
        spaceBetween: 10,
        slidesPerGroup: 5,
        loop: true,
        loopFillGroupWithBlank: true,
        navigation: {
          nextEl: ".swiper-button-next",
          prevEl: ".swiper-button-prev",
        },
      });
</script>

<script type="text/javascript">
    $(document).ready(function() {
        $('.filter-price').on('click',function() {
            $(this).each(function(){
                $(this).addClass('active_price');
            });
        })
    })
</script>