<!-- Use Minified Plugins Version For Fast Page Load -->
<script src="{{ asset('frontend/js/plugins.js') }}"></script>
<script src="{{ asset('frontend/js/ajax-mail.js') }}"></script>
<script src="{{ asset('frontend/js/custom.js') }}"></script>

<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    function addChart(method, id){
        var jqxhr = $.post( "/addChart/"+id+"/", { id: id }, function(data) {
            if(data == "login"){
                alert("Login First !");
            }else{
                alert("Add To Chart SuccessFull");
            }
        }).fail(function() {
            alert( "error" );
        });
    }
    function addWishlist(method, id){
        var jqxhr = $.post( "/addWishlist/"+id+"/", { id: id }, function(data) {
            if(data == "login"){
                alert("Login First !");
            }else{
                alert("Add To Wishlist SuccessFull");
            }
        }).fail(function() {
            alert( "error" );
        });
    }
</script>