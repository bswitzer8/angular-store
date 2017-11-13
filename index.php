
<?php

?>
<!DOCTYPE html>
<html lang="en-US">
	<head>
	    <title>COP 4813 - Assignment 6</title>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
	    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.1/angular.min.js"></script>
		<link rel="stylesheet" type="text/css" href="../style.css" />
        <link href="https://fonts.googleapis.com/css?family=Oswald" rel="stylesheet" />
  
		<script type="text/javascript" src="app.js?version=2"></script>
		<style>
		  
		</style>
    </head>
    <body> 
    <div class="content" ng-app="store" ng-controller="storeController">
         <nav>
            <a href="../index.html">Home</a>
            <a href="diagram.html">Diagram</a>
          </nav>

            <div style=" margin: auto; width:90%; padding: 20px;">
            <div class="row">
                <h2>Store Inventory Manager </h2>
                
                <button type="button" ng-hide="deleted || product" class="buttc" ng-click="add()">Add</button>
             
            </div>
            
            <div class="row" ng-hide="deleted || product">
    
                <table>
                    
                    <thead>
                        <tr>
							<th>Picture</th>
                            <th>Name</th>
                            <th>Category</th>
                            <th>Price</th>
                            <th>Shippable </th>
                            <th>Quantity</th>
                            <th>Condition</th>
                            <th>Update</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    
                    <tbody >
                      <tr ng-show="products.length == 0" ><td colspan="5">There are no products available.</td></tr>
                       <tr ng-repeat-start="item in products">
            						<td> <img src="{{ item.picture }}" height="75px" width="75px" alt="{{ item.name}}"/> </td>
            						<td> {{ item.name }} </td>
            						<td> {{ assocCats[item.category_id] }} </td>
            						<td> {{ item.price }} </td>
            						<td> {{ item.shipping == '0' ? "No" : "Yes" }}</td>
            						<td> {{ item.quantity }} </td>
            				        <td> {{ item.status }} </td>
            						<td> <button type="button" class="buttc" ng-click="update(item)" name="butts">Update</button> </td>
            						<td> <button type="button" class="buttd" ng-click="delete(item)" name="butts">Delete</button> </td>
            					   </tr>
            					   <tr ng-repeat-end >
            					     <td colspan="6"><strong>Description </strong> <span style="color: gray;" > {{  item.description }}</span></td>
            					 
            					   </tr>
                    </tbody>
                </table>
            
            </div>
                
            
            <div class="row" ng-show="product">
                <form role = "form">
          
					<div class="row">
    			        <label class="column-fourth">Picture Url</label>
    			        <div class="column-threefourth">
                            <input type = "text" 
                                   name = "picture" ng-model="product.picture" placeholder = "www.google.images.com" 
                                   required/>
                        </div>
                    </div>
		  
                    <div class="row">
    			        <label class="column-fourth">Name</label>
                        <input type = "text" 
                               name = "name" ng-model="product.name" placeholder = "Product Name" 
                               required/>
                    </div>
                   
                     <div class="row">
    			        <label class="column-fourth">Category</label>
						<select  ng-model="product.category_id">
							<option ng-repeat="cat in categories" ng-value="cat.id">{{ cat.name }}</option>
							
						</select>
                    </div>
					
					 <div class="row">
    			        <label class="column-fourth">Price</label>
                        <input type = "text" 
                               name = "price" ng-model="product.price" placeholder = "0.00" 
                               required/>
                    </div>
					
					<div class="row">
    			        <label class="column-fourth">Quantity</label>
                        <input type = "text" 
                               name = "price" ng-model="product.quantity" placeholder = "0" 
                               required/>
                  </div>
                  
                  	<div class="row">
    			        <label class="column-fourth">Condition</label><br/>
                       
                       
                       <div class="column-threefourth">
                       <label>
                        <input type="radio" ng-model="product.status" value="New">
                        New
                      </label><br/>
                      <label>
                        <input type="radio" ng-model="product.status" value="Average Wear">
                        Average Wear
                      </label><br/>
                      <label>
                        <input type="radio" ng-model="product.status" value="Used">
                        Used
                      </label><br/></div>
                  </div>
                  
                  	<div class="row">
    			        <label class="column-fourth">Shippable</label>
                        <input type = "checkbox" 
                               name = "shipping" 
                               ng-true-value="1"
                               ng-false-value="0"
                               ng-value="product.shipping"
                               ng-model="product.shipping" 
                               ng-checked="product.shipping == '1'"
                               />
                  </div>
          <div class="row">
    			    <label class="column-fourth">Description</label>
    			    
                        <textarea style="width:300px; height:200px"   
                               name = "description" ng-model="product.description" 
                               ></textarea>
          </div>
					

					<hr>
					 <div class="row">
                        <button class="buttc" type = "button" ng-click="save()"
                                name = "Save"> Save
                        </button>
						<button class="buttd" type = "button"
							name = "cancel"
							ng-click="cancel()">
							Cancel
						</button>
				
                   </div>
                </form>
            </div>
           
            
            
            
            
             <div class="row" ng-show="deleted">
                <form role = "form" 
                    >
                    
                    <div class="row">
    			    	<h2> Do you want to delete {{ deleted.name + " - " + assocCats[deleted.category_id] }}?</h2>
                 

                        
                    </div>
                   
                    <div class="row">
                        <button class="buttc" type = "button" 
                                name = "delete" ng-click="confirmDelete()"> Yes
                        </button>
    					<button class="buttd" type = "button"
    							name = "cancel"
    							ng-click="cancel()">
    							Cancel
    					</button>
                   </div>
                </form>
             </div>
      </div>
    </div>
</body>
</html>
