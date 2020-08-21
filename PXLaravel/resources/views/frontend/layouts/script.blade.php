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
        var idBook = 0;
        if(method == "modalChart"){
            idBook = $("#modal-book-id").val();
        }else{
            idBook = id;
        }
        var jqxhr = $.post( "/addChart/"+idBook+"/", { idBook: idBook }, function(data) {
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
        var idWishlist = 0;
        if(method == "modalWishlist"){
            idWishlist = $("#modal-book-id").val();
        }else{
            idWishlist = id;
        }
        var jqxhr = $.post( "/addWishlist/"+idWishlist+"/", { idWishlist: idWishlist }, function(data) {
            if(data == "login"){
                alert("Login First !");
            }else{
                alert("Add To Wishlist SuccessFull");
            }
        }).fail(function() {
            alert( "error" );
        });
    }
    function toggleDetail(id){
        var jqxhr = $.get( "/bookModal/"+id+"/",  function(data) {
            if(data){
                var bookDetail = data;
                $("#modal-tags").html("");
                $("#modal-title").html(bookDetail["title"]);
                $("#modal-book-id").val(bookDetail["id"]);
                $("#quickModal").click()
            }else{                
                alert("Book view eror");
            }
        }).fail(function() {
            alert( "error" );
        });
    }
</script>