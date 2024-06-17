<?= $this->extend('admin/common/layout') ?>

<?=$this->section('page_content')?>
<?php
   
?>
<div class="container">
<div class="row">
  
    <div class="col-md-8">
      <div class="row">
        <marquee behavior="" direction="">
        <h5><span class="text-success"><?=count($products_ordered)?> </span>Products ordered by
         <span class="text-success"><?=$customer_profile[0]->fullName?></span>
         on <?=$customer_profile[0]->orderDate?>
        </h5>
        </marquee>
      </div>
       <div class="row">
        <div class="col-md-12">

        <?php if($assigned_for_delivery) : ?>
          <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>You marked this for delivery!</strong> <span class="text-danger"> You can't delete it anymore</span>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
        <?php endif; ?>

        </div>
       <?php  if(isset($products_ordered) && !empty($products_ordered)) : ?>
                        <?php foreach($products_ordered as $alprod) : ?>
                            <div class="col-md-4">
                              <div class="card mt-1 pt-0">
                                <img src="/public_asset/products/<?=$alprod->prodPic?>" alt="pic" class="card-img-top">
                                <div class="card-body ">
                                  <p class="text-success fw-bold  my-2 text-center"><?=$alprod->prodName?></p>
                                  <small>
                                    <p class="d-flex justify-content-between  my-0 border-top border-bottom">
                                      <span>Price</span>
                                      <span><?=$alprod->prodPrice?><?=$alprod->prodCurrency?></span>
                                    </p>
                                    <p class="d-flex justify-content-between  my-0 border-bottom">
                                      <span>Quantity Ordered </span>
                                      <span><?=$alprod->productQuantity?></span>
                                    </p>
                                  </small>
                                </div>
                              </div>
                            </div>
                        <?php endforeach; ?>
                      <?php endif; ?>
       </div>
    </div>

    <div class="col-md-4">
        <div class="card card-border border border-success border-2 rounded-0 shadow-lg">
            <div class="card-header text-white bg-success">
                <h5>Customer Detail/Profile </h5>
            </div>
            <div class="card-body border-success border-2">
              <div class="row mb-3">
                <div class="col-6 text-center">
                  <div class="m-1 shadow-sm bg-light">
                    <h3 class="mb-0"><?=$customer_profile[0]->costLd?></h3>
                    <small class="text-success">Product Cost in LRD(LRD) </small>
                  </div>
                </div>
                <div class="col-6 text-center">
                  <div class="m-1 shadow-sm bg-light">
                    <h3 class="mb-0"><?=$customer_profile[0]->costUsd?></h3>
                    <small class="text-success">Total Product Cost In USD ($) </small>
                  </div>
                </div>
              </div>
              <p class="d-flex justify-content-between border-bottom">
                <span class="text-dark">Order Date :</span>
                <span class="text-secondary"> <?=$customer_profile[0]->orderDate?></span>
              </p>
              <p class="d-flex justify-content-between border-bottom">
                <span class="text-dark">Phone:</span>
                <span class="text-secondary"> <?=$customer_profile[0]->phoneNo?></span>
              </p>
              <p class="d-flex justify-content-between border-bottom">
                <span class="text-dark">Delivery Region:</span>
                <span class="text-secondary"> <?=$customer_profile[0]->deliveryRegion?></span>
              </p>
              <p class="d-flex justify-content-between border-bottom">
                <span class="text-dark">Customer Name:</span>
                <span class="text-secondary"> <?=$customer_profile[0]->fullName?></span>
              </p>
               <p class="d-flex justify-content-between border-bottom">
                <span class="text-dark">Order Serial Number:</span>
                <span class="text-secondary"> <?=$customer_profile[0]->orderCode?></span>
              </p>
              <p><?=$customer_profile[0]->deliveryAddress?></p>              
            </div>
        </div>

  <!-- show delete if the logged user is admin and if this order is not assigned --> 
  <?php if(session()->get('userData')[0]['userRole'] == 'admin' && !$assigned_for_delivery): ?>
          <div class="card mt-3">
            <div class="card-body">
            <form action="/dashboard/assign_to_agent" method="post">
                        <input type="hidden" value="<?=$customer_profile[0]->orderCode?>" name="order_code">
                        <div class="row m-2 py-2 border border-success alert alert-info shadow-lg">
                          <div class="col-12">Assign this order to an agent for delivery by choosing the agent and then hit the submit button</div>
                          <div class="col-7">
                            <select name="agent_id" id="" class="form-control">
                              <option value="">--choose--</option>
                              <?php if(isset($agents)) : ?>
                                  <?php foreach($agents as $agnt ) : ?>
                                    <option value="<?=$agnt->adminId?>"><?=$agnt->userName?></option>
                                  <?php endforeach; ?>
                                <?php endif; ?>
                            </select>
                          </div>
                          <div class="col-5">
                            <input type="submit" value="submit" class="btn btn-primary">
                          </div>
                        </div>
                </form>
            </div>
          </div>
    

          <div class="alert alert-danger mt-3 ">
           <a href="/dashboard/delete_order/<?=$customer_profile[0]->orderCode?>" class="btn btn-danger mt-3">Delete Order</a>
          </div>
        <?php endif; ?>

    </div>
</div>

</div>



<?= $this->endSection()?>