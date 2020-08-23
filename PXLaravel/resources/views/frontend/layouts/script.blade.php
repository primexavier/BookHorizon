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
    function subcribeEmail(){
        var email = $("#subcribeEmail").val();
        if(email){
            var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
            if(regex.test(email)){
                var jqxhr = $.post( "/addSubcribe", { email: email }, function(data) {
                    if(data == "success"){
                        alert("subcribe success");
                    }else{
                        alert("subcribe Failed");
                    }
                }).fail(function() {
                    alert( "error" );
                });
            }else{
                alert("not an email");
            }
        }else{
            alert("email is empty");
        }
    }
    function deleteChart(id){
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