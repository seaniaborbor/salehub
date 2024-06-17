<?php if(isset($validation) && $validation->getErrors()): ?>
    <div class="alert alert-danger">
        <ul>
            <?php foreach ($validation->getErrors() as $error) : ?>
                <li><?= esc($error) ?></li>
            <?php endforeach ?>
        </ul>
    </div>
<?php endif ?>
<!-- 
    Array ( [0] => stdClass Object ( [prodId] => 10 [prodName] => Good Office Wear 
    [prodCategory] => 1 [prodPrice] => 40.00 [prodPic] => 1713751847_a342d94f391b3494e64e.png 
    [prodAvailabilityStatus] => Available [prodQty] => 20 [prodCurrency] => USD [prodSize] => 28
     [categoryId] => 1 [categoryName] => Slippers ) )
            -->
<form method="post" action="/dashboard/edit_product/<?=$product_to_edit[0]->prodId?>" enctype="multipart/form-data">
    <div class="row">
        <div class="col-md-6">
            <div class="mb-3">
                <label for="prodName" class="form-label">Product Name</label>
                <input type="text" value="<?=$product_to_edit[0]->prodName?>" class="form-control border-success" id="prodName" name="prodName">
                <?php if(isset($validation) && $validation->hasError('prodName')) : ?>
                    <div class="text-danger mt-2"><?= $validation->getError('prodName') ?></div>
                <?php endif; ?>
            </div>
        </div>
        <div class="col-md-6">
            <div class="mb-3">
                <label for="prodSize" class="form-label">Product Size</label>
                <input type="text" value="<?=$product_to_edit[0]->prodSize?>" class="form-control border-success" id="prodSize" name="prodSize">
                <?php if(isset($validation) && $validation->hasError('prodSize')) : ?>
                    <div class="text-danger mt-2"><?= $validation->getError('prodSize') ?></div>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="mb-3">
                <label for="prodCategory" class="form-label">
                    Product Category
                    <a href="#" data-bs-toggle="modal" data-bs-target="#categoryModal">
                        <i class="fas fa-solid fa-plus"></i>
                    </a>
                </label>
                <select name="prodCategory" id="prodCategory" class="form-control border-success" > 
                <option value="">--choose...</option>
                <?php if(isset($categories) && !empty($categories)) : ?>
                    <?php foreach($categories as $cats): ?>
                    <option value="<?=$cats['categoryId']?>"><?=$cats['categoryName']?></option>
                    <?php endforeach; ?>
                <?php endif; ?>
                </select>
                <?php if(isset($validation) && $validation->hasError('prodCategory')) : ?>
                    <div class="text-danger mt-2"><?= $validation->getError('prodCategory') ?></div>
                <?php endif; ?>
            </div>
        </div>
        <div class="col-md-6">
            <div class="mb-3">
                <label for="currency" class="form-label">
                   Currency
                </label>
                <select name="prodCurrency" id="prodCurrency" class="form-control border-success" > 
                  <option value="">--choose...</option>
                  <option value="LRD">LRD</option>
                  <option value="USD">USD</option>
                </select>
                <?php if(isset($validation) && $validation->hasError('prodCurrency')) : ?>
                    <div class="text-danger mt-2"><?= $validation->getError('prodCurrency') ?></div>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="mb-3">
                <label for="prodPrice" class="form-label">Product Price</label>
                <input type="number" value=<?=$product_to_edit[0]->prodPrice?> class="form-control border-success" id="prodPrice" name="prodPrice">
                <?php if(isset($validation) && $validation->hasError('prodPrice')) : ?>
                    <div class="text-danger mt-2"><?= $validation->getError('prodPrice') ?></div>
                <?php endif; ?>
            </div>
        </div>
        <div class="col-md-6">
            <div class="mb-3">
                <label for="prodPic" class="form-label">Product Picture</label>
                <input type="file" class="form-control border-success" id="prodPic" name="prodPic">
                <?php if(isset($validation) && $validation->hasError('prodPic')) : ?>
                    <div class="text-danger mt-2"><?= $validation->getError('prodPic') ?></div>
                <?php endif; ?>
            </div>
        </div>
    </div>
    
    <div class="row">
        
    </div>
    <div class="mb-3">
        <label for="prodAvailabilityStatus" class="form-label">Product Availability Status</label>
        <select class="form-select" id="prodAvailabilityStatus" name="prodAvailabilityStatus">
            <option value="">--choose--</option>
            <option value="Available">Available</option>
            <option value="Finished">Out of Stock/Finished</option>
            <option value="In-Route">In Route (Comming Soon)</option>
        </select>
    </div>
    <div class="mb-3">
        <label for="prodQty" class="form-label">Product Quantity</label>
        <input type="number" value=<?=$product_to_edit[0]->prodQty?> class="form-control border-success" id="prodQty" name="prodQty">
        <?php if(isset($validation) && $validation->hasError('prodQty')) : ?>
            <div class="text-danger mt-2"><?= $validation->getError('prodQty') ?></div>
        <?php endif; ?>
    </div>
    <button type="submit" id="submitBtn" class="btn btn-primary">Submit</button>
</form>


<script>
    // Add event listener to the file input field
    document.getElementById('prodPic').addEventListener('change', function() {
        var file = this.files[0];
        var img = new Image();
        img.onload = function() {
            if (this.width === 350 && this.height === 400) {
                document.getElementById('submitBtn').style.display = 'block';
            } else {
                document.getElementById('submitBtn').style.display = 'none';
                alert('The product image dimension must be 350px by 400px. Resize your pic and proceed')
            }
        };
        img.src = URL.createObjectURL(file);
    });
</script>