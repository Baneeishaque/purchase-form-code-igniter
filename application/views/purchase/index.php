<?php echo validation_errors(); ?>

<?php echo form_open('purchase/index'); ?>

    <label for="name">Name</label>
    <select name="name" id="vendor">
        <option value="0">Select Vendor</option>    
    <?php foreach ($vendors as $vendor): ?>
        <option value="<?php echo $vendor['id']; ?>"><?php echo $vendor['name']; ?></option>    
    <?php endforeach; ?>
    </select><br />

    <label for="gst_no">GST No.</label>
    <input type="text" name="gst_no" disabled id="gst_no"/><br />
    
    <label for="bill_no">Bill No.</label>
    <input type="text" name="bill_no" id="bill_no"/><br />
    
    <hr />
    
    <label for="product">Product</label>
    <select name="product">
        <option value="p0">Select Product</option>    
        <option value="p1">P1</option>    
        <option value="p2">P2</option>    
        <option value="p3">P3</option>    
    </select><br />
    <label for="qty">Qty.</label>
    <input type="text" name="qty" id="qty"/><br />
    <label for="price">Selling Price</label>
    <input type="text" name="price" id="price"/><br />
    <label for="tax">Tax</label>
    <input type="text" name="tax" disabled id="tax"/><br />
    
    <label for="total">Total Am.</label>
    <input type="text" name="total" disabled id="total"/><br />

    <div id="products"></div>

    <hr />
    <input type="button" name="add_product" value="Add Product" onclick="addProduct()"/>
    <hr />

    <hr />
    <label for="net">Net Am.</label>
    <input type="text" name="net" disabled id="net"/><br />

    <hr />
    <input type="submit" name="submit" value="Submit Bill" />

</form>

<script type="text/javascript" src="<?php echo base_url().'assets/jquery-3.3.1.js'?>"></script>
<script type="text/javascript">

    var index=0;

    $(document).ready(function(){

        $('#vendor').change(function(){ 

            // alert("hai");
            var id=$(this).val();
            $.ajax({
                url : "<?php echo site_url('purchase/getVendor/');?>"+id,
                method : "POST",
                data : {id: id},
                async : true,
                dataType : 'text',
                success: function(data){
                     
                    alert(data);
                    $('#gst_no').val(data.substring(0,data.indexOf("-")));
                    $('#tax').val(data.substring(data.indexOf("-")+1));
                }
            });
        }); 

        $('#price').change(function(){ 

            var value=parseFloat($(this).val());
            // alert(value);
            var amount=value*parseInt($('#qty').val(),10);
            var tax_amount=amount*(parseFloat($('#tax').val())/100);
            var total=amount+tax_amount;
            $('#total').val(total);
            var net=$('#net').val();
            if(net==""){
                $('#net').val(total);
            }else{
                $('#net').val(parseFloat($('#net').val())+total);
            }
        }); 
    });

    function addProduct()
    {
        var products = document.getElementById('products');

        if (products)
        {
            index++;

            var newHr = document.createElement('hr');
            products.appendChild(newHr);

            // <label for="product">Product</label>
            // <select name="product">
            //     <option value="p0">Select Product</option>    
            //     <option value="p1">P1</option>    
            //     <option value="p2">P2</option>    
            //     <option value="p3">P3</option>    
            // </select><br />
            // <label for="qty">Qty.</label>
            // <input type="text" name="qty" id="qty"/><br />
            // <label for="price">Selling Price</label>
            // <input type="text" name="price" id="price"/><br />
            // <label for="tax">Tax</label>
            // <input type="text" name="tax" disabled id="tax"/><br />
            
            // <label for="total">Total Am.</label>
            // <input type="text" name="total" disabled id="total"/><br />

            var productLabel=document.createElement('label');
            productLabel.setAttribute('for','product');
            productLabel.innerHTML="Product";
            products.appendChild(productLabel);

            var productDropDown=document.createElement('select');
            productDropDown.setAttribute('name','product'+index);
            productDropDown.innerHTML=' <option value="p0">Select Product</option> <option value="p1">P1</option> <option value="p2">P2</option> <option value="p3">P3</option> ';
            products.appendChild(productDropDown);

            var br=document.createElement('br');
            products.appendChild(br);

            var qtyLabel=document.createElement('label');
            qtyLabel.setAttribute('for','qty');
            qtyLabel.innerHTML="Qty.";
            products.appendChild(qtyLabel);

            var qtyText=document.createElement('input');
            qtyText.setAttribute('type','text');
            qtyText.setAttribute('name','qty'+index);
            qtyText.setAttribute('id','qty');
            products.appendChild(qtyText);

            var br=document.createElement('br');
            products.appendChild(br);

            var priceLabel=document.createElement('label');
            priceLabel.setAttribute('for','price');
            priceLabel.innerHTML="Price";
            products.appendChild(priceLabel);

            var priceText=document.createElement('input');
            priceText.setAttribute('type','text');
            priceText.setAttribute('name','price'+index);
            priceText.setAttribute('id','price');
            priceText.setAttribute('onChange','calculateTotal(index)')
            products.appendChild(priceText);

            var br=document.createElement('br');
            products.appendChild(br);

            var taxLabel=document.createElement('label');
            taxLabel.setAttribute('for','tax');
            taxLabel.innerHTML="Tax";
            products.appendChild(taxLabel);

            var taxText=document.createElement('input');
            taxText.setAttribute('type','text');
            taxText.setAttribute('name','tax');
            taxText.setAttribute('id','tax');
            taxText.setAttribute('disabled','true');
            taxText.setAttribute('value',$('#tax').val());
            products.appendChild(taxText);

            var br=document.createElement('br');
            products.appendChild(br);

            var totalLabel=document.createElement('label');
            totalLabel.setAttribute('for','total');
            totalLabel.innerHTML="Total";
            products.appendChild(totalLabel);

            var totalText=document.createElement('input');
            totalText.setAttribute('type','text');
            totalText.setAttribute('name','total'+index);
            totalText.setAttribute('id','total');
            totalText.setAttribute('disabled','true');
            products.appendChild(totalText);

            var newHr = document.createElement('hr');
            products.appendChild(newHr);

        //     newP.innerHTML = 'Question ' + (count + 1);

        //     // Create the new text box
        //     var newInput = document.createElement('input');
        //     newInput.type = 'text';
        //     newInput.name = 'questions[]';

        //     // Good practice to do error checking
        //     if (newInput && newP)   
        //     {
        //         // Add the new elements to the form
        //         quiz.appendChild(newP);
        //         quiz.appendChild(newInput);
        //         // Increment the count
        //         count++;
        //     }
        }
    }

    function calculateTotal(indexValue){

        // alert(indexValue);
        // alert(document.getElementById("product").value);
        // alert(document.getElementById("product"+indexValue).value);
        // alert(document.getElementById("qty"+indexValue).value);
        // alert(document.getElementById("price"+indexValue).value);
        // alert(document.getElementById("tax"+indexValue).value);
        // alert(document.getElementById("total"+indexValue).value);
        // alert($('#product'+indexValue).val())
        // alert($(this).val())
        // alert(document.getElementByName("product").value);
        // alert(document.getElementByName("product"+indexValue).value);
        // alert(document.getElementByName("qty"+indexValue).value);
        // alert(document.getElementByName("price"+indexValue).value);
        // alert(document.getElementByName("tax"+indexValue).value);
        // alert(document.getElementByName("total"+indexValue).value);

    }
</script>