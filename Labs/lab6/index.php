<!DOCTYPE html>
<html>
    <head>
        <title> OtterMart Product Search </title>
        <link href="css/styles.css" rel="stylesheet" type = "text/css"/>
      <script src="https://code.jquery.com/jquery-3.1.1.min.js"> </script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        <script>
            $(document).ready(function(){
                //mysql://b12b575575dd93:335f8998@us-cdbr-iron-east-03.cleardb.net/heroku_778b1f350ccf546?reconnect=true
                //user name b12b575575dd93
                //password 335f8998
               $.ajax({
                type:"get",
                url: "api/getCategories.php",
                dataType: "json",
                data: {},
                success: function(data, status) {
                    data.forEach(function(key){
                    $("[name=category]").append("<option value =" + key["catId"] + ">" + key["catName"] + "</option>");            
                    }); 
                },
                error: function(err) {
                    console.log("Houston, we have a problem!")
                    console.log(arguments);
                },
         
            });
                
            $("#searchForm").on("click", function(){
                $.ajax({
                type:"get",
                url: "api/getSearchResults.php",
                dataType: "json",
                data: {
                    "product" : $("[name=product]").val(),
                    "category" : $("[name=category]").val(),
                    "priceFrom" : $("[name=priceFrom]").val(),
                    "priceTo" : $("[name=priceTo]").val(),
                    "orderBy" : $("[name=orderBy]:checked").val(),
                },
                success: function(data, status) {
                    $("#results").html("<h3> Products Found: </h3>");
                    data.forEach(function(key){
                        $("#results").append("<a href ='#' class='historyLink' id='" + key['productId'] + "'>History</a> ");
                        $("#results").append(key['productName'] + " " + key['productDescription'] + " $" + key['price'] + "<br>");            
                    }); 
                },
                error: function(err) {
                    console.log("Houston, we have a problem!")
                    console.log(arguments);
                },
         
            });
                
                
            });
            
            
            
            $(document).on('click', '.historyLink', function(){
                $('#purchaseHistoryModal').modal("show");
                $.ajax({
                    type:"get",
                    url: "api/getPurchaseHistory.php",
                    dataType: "json",
                    data: {
                        "productId" : $(this).attr("id")
                    },
                    success: function(data, status) {
                        
                        if(data.length != 0){
                            $("#history").html("");
                            $("#history").append(data[0]['productName'] + "<br />");
                            $("#history").append("<img src='" + data[0]['productImage'] + "' width='200' /> <br />");
                            data.forEach(function(key){
                                $("#history").append("Purchase Date: " + key['purchaseDate'] + " <br />");
                                $("#history").append("Unit Price: "+ key['unitPrice'] + "<br />");            
                                $("#history").append("Quantity: " + key['quantity']  + "<br />");            
                         }); 
                            
                        }else{
                            $("#history").html("No purchase history for this item.");
                        }
                           
                    },
                    error: function(err) {
                        console.log("Houston, we have a problem!")
                        console.log(arguments);
                    },
             
                });
                });
                
            });
            
        </script>
    
    
    
    </head>
    <body>
        <div>
            <h1> OtterMart Product Search</h1>
            <form>
                
                Product: <input type="text" name = "product" />
                <br>
                Category:
                    <select name = "category">
                        <option value = "">Seclect One</option>
                    </select>
                <br>
                Price: From <input type="text" name ="priceFrom" size="7"/>
                       To   <input type="text" name="priceTo" size="7"/>
                <br>
                Orders result by:
                <br>
                <input type="radio" name="orderBy" value ="price"/>Price<br>
                <input type="radio" name="orderBy" value ="name"/>Name
                
                <br><br>
            </form>
        
            <br />
            <button = id="searchForm">Search</button>
        </div>
        <br>
        <hr>
        <div id="results"></div>
        
        <div class="modal" tabindex="-1" role="dialog" id="purchaseHistoryModal" >
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Product History</h5>
                        <button type ="button" class="close" data-dismiss="modal" aria-label"Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div classs="modal-body">
                         <div id="history"></div>
                    </div>
                    <div class="model-footer">
                        <button type="button" class="btn btn-secondary" data-dimiss="model">Close</button>
                    </div>
                </div>
            </div>
        </div>

    </body>
</html>