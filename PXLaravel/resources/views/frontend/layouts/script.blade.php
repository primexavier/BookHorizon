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
                alert("Add To Cart SuccessFull");
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
    function getCity(id){
        var jqxhr = $.get( "/getcity/"+id+"/",  function(data) {
            $("#cityName").find('option').remove().end();
            if(data){
                $('#cityName').prop('disabled', false);
                $("#shippingMethod").append(`<option value="">Pick Shipping</option>`);  
                $("#cityName").append(`<option value="">Pick City</option>`);  
                data.forEach(element => {         
                    $("#cityName").append(`<option value="${element.city_id}">${element.city_name}</option>`);        
                });
            }else{                
                $('#cityName').prop('disabled', 'disabled');     
            }
        }).fail(function() {
            $('#cityName').prop('disabled', 'disabled');   
            alert( "error" );
        });
    }
    function getZipCode(id){
        var province_id = $( "#province_id option:selected" ).val();
        console.log(province_id);
        console.log(id);
        $('#zipCode').val();     
        var jqxhr = $.get( "/getcity/"+province_id+"/"+id+"/",  function(data) {
            if(data){
                $('#zipCode').val(data[0].postal_code);
                $('#couriers').prop('disabled', false);
            }else{                
                $('#zipCode').val();     
            }
        }).fail(function() {
            $('#zipCode').val();     
            alert( "error" );
        });
        // alert(id);
    }
    function getShippingCost(courier){ 
        var city_id = $( "#cityName option:selected" ).val();
        var jqxhr = $.get( "/getCost/"+courier+"/"+city_id+"/"+1+"/",  function(data) {
            $("#shippingMethod").find('option').remove().end(); 
            $('#shippingCost').val();
            $('#shippingCourier').val();
            $('#shippingCode').val();   
            if(data){
                $('#shippingMethod').prop('disabled', false);
                $("#shippingMethod").append(`<option value="">Pick Shipping</option>`);  
                data.forEach(element => {         
                    $("#shippingMethod").append(`<option value="${element.service}">${element.description} - ${element.cost[0].value}</option>`);        
                });
            }else{                
                $('#cityName').prop('disabled', 'disabled');       
            }
        }).fail(function() {
            $('#cityName').prop('disabled', 'disabled');        
            alert( "error" );
        });
    }
    function setShippingMethod(value){ 
        var text = $( "#shippingMethod option:selected" ).text();
        var shippingCode = $( "#shippingMethod option:selected" ).val();
        var subTotal = $('#subTotalInput').val();
        var shippingCost = text.split('- ')[1];
        $('#shippingCost').val(shippingCost);
        $('#shippingFee').html(`Rp ${shippingCost}`);
        $('#grandTotal').html(`Rp ${+shippingCost + +subTotal}`);
        $('#grandTotalInput').val(+shippingCost + +subTotal);
        $('#shippingCode').val(shippingCode);
    }
    function TransactionTypeChange(value,chartId){
        if(value != 1){
            $('#totalPrice'+chartId).html(0);
            $('#rentDuration'+chartId).prop('required', true);
            $('#RentDay'+chartId).show();
            $('#RentDayText'+chartId).show();
        }else{
            var price = $('#initialPrice'+chartId).val();
            $('#totalPrice'+chartId).html(price);
            $('#rentDuration'+chartId).prop('required', false);
            $('#RentDay'+chartId).hide();
            $('#RentDayText'+chartId).hide();
        }
    }
    function ChangeShipping(value){
        var is_regional = $('#is_regional_address').prop('checked');
        if(is_regional){
            if(value){
            }else{
                $('#ShippingPick').hide();
                $('#couriers').prop('disabled', true);
                $('#couriers').prop('disabled', true);            
            }
        }else{            
            if(value){
                $('#ShippingPick').show();
                $('#shippingMethod').prop('disabled', false);
                $('#couriers').prop('disabled', false);
            }else{
                $('#ShippingPick').hide();
                $('#couriers').prop('disabled', true);
                $('#couriers').prop('disabled', true);            
            }
        }
    }
    $('#shipping-form-regional').hide();
    function newAddress(value,type){
        if(value){
            if(type == 1){
                $('#cityName').val("");    
                $('#cityName').prop('disabled', 'disabled');   
                $('#province_id').val("");
                $('#zipCode').val("");
                $('#newAddressInput').val("");
                $('#is_regional_address').prop('disabled', 'disabled');   
            }else{
                $('#shipping-form-regional').show();
                $('#shiping_address').prop('disabled', 'disabled');   
            }
            $("#shippingMethod").find('option').remove().end(); 
            $("#couriers").prop('checked', false);
            $("#shippingMethod").append(`<option value="">Pick Shipping</option>`);
            $('#oldViewAddress').hide();
        }else{
            if(type == 1){
                $('#is_regional_address').prop('disabled', ''); 
            }else{
                $('#shipping-form-regional').hide();       
                $('#shiping_address').prop('disabled', '');            
            }
                $("#oldAddress1").prop('checked', true);
                changeOldAddress(1);
                $('#oldViewAddress').show();
        }
    }
    function changeOldAddress(value){
        
        $("#shippingMethod").find('option').remove().end(); 
        $("#couriers").prop('checked', false);
        $("#shippingMethod").append(`<option value="">Pick Shipping</option>`);  

        var Province_id = $('#ProvinceOldAddress'+value).html();      
        var city_id = $('#CityOldAddress'+value).html(); 

        $('#cityName').val(city_id);     
        $('#province_id').val(Province_id);     

    }
</script>