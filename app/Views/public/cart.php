   
<?=$this->extend('public/common/layout')?>

<?=$this->section('page')?>

<script>
        function showDeliveryCost() {
            var selectElement = document.getElementById('deliveryRegion');
            var selectedOption = selectElement.options[selectElement.selectedIndex];
            var price = selectedOption.getAttribute('data-cost');

            document.getElementById('delivery_cost').innerHTML = price;
        }
</script>
   
   <!-- slider section -->
    <section class="slider_section ">
    <div class="container">
        <div class="row" style="display: flex; align-items: flex-start;">
            <div class="col-md-8">
                <div class="card border-0 border-none ">
                    <div class="card-body">
                        <h4 class="card-title">Products in your cart</h4>
                        <table class="table table-stripped table-hover">
                            <thead>
                                <tr>
                                    <td>Product Name</td>
                                    <td>Quantity</td>
                                    <td>Price</td>
                                    <td>Total</td>
                                    <td>Currency</td>
                                    <td>Add </td>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                $total_usd = 0;
                                $total_lrd = 0;

                                if(session()->has('cart')) {
                                    $cartData = session()->get('cart');
                                    if(!empty($cartData)){
                                        
                                        foreach($cartData as $items){
                                            ?>
                                                <tr>
                                                    <td><?=$items['name']?></td>
                                                    <td>
                                                        <?=$items['quantity']?>
                                                    </td>
                                                    <td><?=$items['unitPrice']?></td>
                                                    <td><?='$'.$items['quantity']*$items['unitPrice']?></td>
                                                    <td><?=$items['currency']?></td>
                                                    <td>
                                                        <a href="/add_to_cart/<?=$items['id']?>"  class="btn-primary btn-sm rounded-pill">
                                                            <b class="mx-1">+</b>
                                                        </a>
                                                    </td>
                                                </tr>
                                            <?php 
                                            // add the total for each currency 
                                            if($items['currency'] == 'LRD'){
                                                $total_lrd += $items['quantity']*$items['unitPrice'];
                                            }else{
                                                $total_usd += $items['quantity']*$items['unitPrice'];
                                            }
                                        }
                                    }
                                }else{
                                    ?>
                                    <div class="card">
                                        <div class="card-body">
                                            <h3 class="text-danger">Your shopping cart is empty </h3>
                                            <a href="/" class="btn btn-primary">Shop products</a>
                                        </div>
                                    </div>
                                    <?php 
                                }
                                ?>
                            </tbody>
                        </table>

                        <?php if(!empty(session()->has('cart'))) : ?>
                            <div class=" mb-4 alert-danger alert border border-sm rounded shadow-sm">
                                <p class="lead">Billing of items in your cart and delivery cost</p>
                                <p class="d-flex text-secondary justify-content-between">
                                    <span>Total Lrd</span>
                                    <span class="text-dark fw-bold">$<?=$total_lrd?></span>
                                </p>
                                <p class="d-flex justify-content-between text-secondary">
                                    <span>Total USD</span>
                                    <span class="text-dark fw-bold">$<?=$total_usd?></span>
                                </p>
                                <p class="d-flex justify-content-between text-secondary">
                                    <span>Delivery Cost</span>
                                    <span class="text-dark fw-bold" id="delivery_cost"></span>
                                </p>
                            </div>
                        <?php endif; ?>

                        <?php if(!empty(session()->has('cart'))) : ?>
                            <div class="row py-2">
                                <div class="col-12 text-right">
                                    <a href="/products" class="btn btn-dark  rounded-0 m-2">Continue Chopping</a>
                                    <a href="/empty_cart" class="btn btn-danger rounded-0 m-2">Empty Cart</a>
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
            <?php if(empty(session()->has('cart'))){
                ?>
                   <div class="card border-danger border-2">
                    <div class="card-header bg-danger text-white">
                        <marquee behavior="" direction="">
                            <h5>Purchase the latest electronic device now at at gibsononlinestore.com </h5>
                        </marquee>
                    </div>
                    <div class="card-body">
                        <a href="">
                            <img src="http://gibsononlinestore.com/imgs/storebanner.jpg" alt='gibson online store' 
                            class="w-100 img-fluid" >
                        </a>
                    </div>
                   </div>
                <?php 

                }else{
                    ?>
                    <div class="card border border-secondary border-2">
                        <div class="card-header bg-dark">
                        <h4 class="text-white">Request Order</h4>
                        </div>
                    <div class="card-body">
                        <h6 class="text-danger">To receive your delivery, fill out the form below and submit. We'll 
                            deliver your products, in real time. </h6>
                        <form action="/save_order" method="post">

                            <input type="hidden" name="costLd" value="<?=$total_lrd?>">
                            <input type="hidden" name="costUsd" value="<?= $total_usd?>">

                            <div class="form-group mb-3">
                                <label for="name">Your Full Name <snap class="text-danger">(Required)</snap> </label>
                                <input type="text" name="fullName" class="form-control">
                                <?php if(isset($validation) && $validation->hasError('fullName')) : ?>
                                    <div class="text-danger mt-2"><?= $validation->getError('fullName') ?></div>
                                <?php endif; ?>
                            </div>
                            <div class="form-group mb-3">
                                <label for="name">Contact No <snap class="text-danger">(Required)</snap></label>
                                <input type="text" name="phoneNo" class="form-control">
                                <?php if(isset($validation) && $validation->hasError('phoneNo')) : ?>
                                    <div class="text-danger mt-2"><?= $validation->getError('phoneNo') ?></div>
                                <?php endif; ?>
                            </div>
                            <div class="form-group mb-3">
                                <label for="name">Email Address if Any  </label>
                                <input type="text" name="emailAddress" class="form-control">
                            </div>

                            <div class="form-group mb-3">
                                <label for="name">Delivery Region <snap class="text-danger">(Required)</snap></label>
                               <select onchange="showDeliveryCost()" name="deliveryRegion" id="deliveryRegion" class="form-control"> 
                                <option value="">-choose Region--</option>
                                <?php if(isset($delivery_location)) : ?>
                                    <?php foreach($delivery_location as $region) : ?>
                                        <option value="<?=$region['regionName']?>" data-cost="<?= esc($region['regionDeliveryCost']) ?>"><?=$region['regionName']?></option>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                               </select>
                               <?php if(isset($validation) && $validation->hasError('deliveryRegion')) : ?>
                                    <div class="text-danger mt-2"><?= $validation->getError('deliveryRegion') ?></div>
                                <?php endif; ?>
                            </div>

                            <div class="form-group mb-3">
                                <label for="name">Give your full address. <snap class="text-danger">(Required)</snap> </label>
                               <textarea name="deliveryAddress" class="form-control"></textarea>
                               <?php if(isset($validation) && $validation->hasError('deliveryAddress')) : ?>
                                    <div class="text-danger mt-2"><?= $validation->getError('deliveryAddress') ?></div>
                                <?php endif; ?>
                            </div>
                            <button class="btn btn-primary rounded-0">Submit</button>

                        </form>          
                    </div>
                </div>
                    <?php 

                }
            ?>
            </div>
        </div>
    </div>
    </section>
      <!-- end client section -->


      <script>
        let locations = json_encode(<?php $delivery_location; ?>);

        alert(locations.length)
      </script>

      <?= $this->endSection() ?>