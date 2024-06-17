   
<?=$this->extend('public/common/layout')?>

<?=$this->section('page')?>
   
   <!-- slider section -->
    <section class="slider_section ">
            <div class="slider_bg_box">
               <img src="/public_asset/images/slider-bg.jpg" alt="">
            </div>
            <div id="customCarousel1" class="carousel slide" data-ride="carousel">
               <div class="carousel-inner">
                  <div class="carousel-item active">
                     <div class="container ">
                        <div class="row">
                           <div class="col-md-7 col-lg-6 ">
                              <div class="detail-box">
                                 <h1>
                                    <span>
                                    Shop Easy
                                    </span>
                                    <br>
                                    On Everything
                                 </h1>
                                 <p>
                                 (If no Card don't worry) Just screenshot the product you want, and call +231775643247/+231886654320
                                 </p>
                                 <div class="btn-box">
                                    <a href="" class="btn1">
                                    Shop Now
                                    </a>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="carousel-item ">
                     <div class="container ">
                        <div class="row">
                           <div class="col-md-7 col-lg-6 ">
                              <div class="detail-box">
                                 <h1>
                                    <span>
                                    Timely Delivery
                                    </span>
                                    <br>
                                    at Your Door Step
                                 </h1>
                                 <p>
                                    We deliver to your door step once you order any item in our store with great speed, and our products are 100% gurantee. 
                                 </p>
                                 <div class="btn-box">
                                    <a href="" class="btn1">
                                    Shop Now
                                    </a>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="carousel-item">
                     <div class="container ">
                        <div class="row">
                           <div class="col-md-7 col-lg-6 ">
                              <div class="detail-box">
                                 <h1>
                                    <span>
                                    Order Product
                                    </span>
                                    <br>
                                    Before it arriaves
                                 </h1>
                                 <p>
                                    You can order product  that are already on it way from abroad on our online store and we're will deliver it to you upon its arrival. 
                                 </p>
                                 <div class="btn-box">
                                    <a href="" class="btn1">
                                    Shop Now
                                    </a>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="container">
                  <ol class="carousel-indicators">
                     <li data-target="#customCarousel1" data-slide-to="0" class="active"></li>
                     <li data-target="#customCarousel1" data-slide-to="1"></li>
                     <li data-target="#customCarousel1" data-slide-to="2"></li>
                  </ol>
               </div>
            </div>
         </section>
         <!-- end slider section -->
      </div>
      <!-- why section -->


      <section class="why_section layout_padding">
         <div class="container">
            <div class="heading_container heading_center">
               <h2>
                  Why Shop With Us
               </h2>
            </div>
            <div class="row">
               <div class="col-md-4">
                  <div class="box ">
                     <div class="img-box">
                     <i class="bi display-4 text-white bi-truck"></i>
                     </div>
                     <div class="detail-box">
                        <h5>
                           Fast Delivery
                        </h5>
                        <p>
                           We deliver within an hour upon placing your order.
                        </p>
                     </div>
                  </div>
               </div>
               <div class="col-md-4">
                  <div class="box ">
                     <div class="img-box">
                     <i class="bi display-4 text-white  bi-cash-coin"></i>
                     </div>
                     <div class="detail-box">
                        <h5>
                           Easy Payment
                        </h5>
                        <p>
                          You don't even need credi...t card, we deliver, you pay. 
                        </p>
                     </div>
                  </div>
               </div>
               <div class="col-md-4">
                  <div class="box ">
                     <div class="img-box">
                     <i class="bi display-4 text-white  bi-cart-plus-fill"></i>
                     </div>
                     <div class="detail-box">
                        <h5>
                           Pre Order
                        </h5>
                        <p>
                           You can request a product and we'll inport and let you know. 
                        </p>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <!-- end why section -->
      

<!-- product section -->
<section class="product_section layout_padding">
   <div class="container">
      <div class="heading_container heading_center">
         <h2>
            Our <span>products</span>
         </h2>
      </div>

      <div class="row">
         <?php include_once('common/product_loader.php'); ?>
      </div>

    <div class="py-5 text-center">
      <a href="#" class="btn btn-outline-danger shadow-lg btn-lg rounded-pill">
         Load More Products 
      </a>
    </div>

   </div>
</section>


<div class="container-fluid alert-warning py-3">
   <div class="row py-5">
      <div style="border-radius: 15px;" class="col-md-8 shadow-lg text-center offset-md-2 py-3 border border-dark rounded shadow bg-dark text-white">
        <div class="p-3" style="border: 3px dotted white; ">
        <div class="col-md-4 offset-md-4 col-sm-6 offset-sm-3 ">
         <center>
         <img  src="/public_asset/images/no_credig_card.jpg" 
         class="img img-fluid  rounded-circle ml-auto" 
         style="max-width:150px; margin-top:-90px; " alt="">
         </center>
      </div>
      <h4 class="mt-3">No Credit Card, No Problem</h4>
        <p style="margin-top: 20px;margin-bottom: 30px;">
        "Shop hassle-free with us! No credit card? No worries! Simply screenshot any product from our store and send it to us via Facebook or WhatsApp. We'll be happy to discuss your order 
        and arrange delivery before payment. Your convenience is our priority." 
         </p>
         <a class="btn btn-info" href="">
         Facebook 
         </a>
         <a class="btn btn-success" href="">
         Facebook 
         </a>
        </div>
      </div>
   </div>
</div>


      <!-- subscribe section -->
      <!-- <section class="subscribe_section">
         <div class="container-fuild">
            <div class="box">
               <div class="row">
                  <div class="col-md-6 offset-md-3">
                     <div class="subscribe_form ">
                        <div class="heading_container heading_center">
                           <h3>Subscribe To Get Discount Offers</h3>
                        </div>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor</p>
                        <form action="">
                           <input type="email" placeholder="Enter your email">
                           <button>
                           subscribe
                           </button>
                        </form>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </section> -->


      <!-- end subscribe section -->
      <!-- client section -->
      <!-- <section class="client_section layout_padding">
         <div class="container">
            <div class="heading_container heading_center">
               <h2>
                  Customer's Testimonial
               </h2>
            </div>
            <div id="carouselExample3Controls" class="carousel slide" data-ride="carousel">
               <div class="carousel-inner">
                  <div class="carousel-item active">
                     <div class="box col-lg-10 mx-auto">
                        <div class="img_container">
                           <div class="img-box">
                              <div class="img_box-inner">
                                 <img src="/public_asset/images/client.jpg" alt="">
                              </div>
                           </div>
                        </div>
                        <div class="detail-box">
                           <h5>
                              Anna Trevor
                           </h5>
                           <h6>
                              Customer
                           </h6>
                           <p>
                              Dignissimos reprehenderit repellendus nobis error quibusdam? Atque animi sint unde quis reprehenderit, et, perspiciatis, debitis totam est deserunt eius officiis ipsum ducimus ad labore modi voluptatibus accusantium sapiente nam! Quaerat.
                           </p>
                        </div>
                     </div>
                  </div>
                  <div class="carousel-item">
                     <div class="box col-lg-10 mx-auto">
                        <div class="img_container">
                           <div class="img-box">
                              <div class="img_box-inner">
                                 <img src="/public_asset/images/client.jpg" alt="">
                              </div>
                           </div>
                        </div>
                        <div class="detail-box">
                           <h5>
                              Anna Trevor
                           </h5>
                           <h6>
                              Customer
                           </h6>
                           <p>
                              Dignissimos reprehenderit repellendus nobis error quibusdam? Atque animi sint unde quis reprehenderit, et, perspiciatis, debitis totam est deserunt eius officiis ipsum ducimus ad labore modi voluptatibus accusantium sapiente nam! Quaerat.
                           </p>
                        </div>
                     </div>
                  </div>
                  <div class="carousel-item">
                     <div class="box col-lg-10 mx-auto">
                        <div class="img_container">
                           <div class="img-box">
                              <div class="img_box-inner">
                                 <img src="/public_asset/images/client.jpg" alt="">
                              </div>
                           </div>
                        </div>
                        <div class="detail-box">
                           <h5>
                              Anna Trevor
                           </h5>
                           <h6>
                              Customer
                           </h6>
                           <p>
                              Dignissimos reprehenderit repellendus nobis error quibusdam? Atque animi sint unde quis reprehenderit, et, perspiciatis, debitis totam est deserunt eius officiis ipsum ducimus ad labore modi voluptatibus accusantium sapiente nam! Quaerat.
                           </p>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="carousel_btn_box">
                  <a class="carousel-control-prev" href="#carouselExample3Controls" role="button" data-slide="prev">
                  <i class="fa fa-long-arrow-left" aria-hidden="true"></i>
                  <span class="sr-only">Previous</span>
                  </a>
                  <a class="carousel-control-next" href="#carouselExample3Controls" role="button" data-slide="next">
                  <i class="fa fa-long-arrow-right" aria-hidden="true"></i>
                  <span class="sr-only">Next</span>
                  </a>
               </div>
            </div>
         </div>
      </section> -->
      <!-- end client section -->

      <?= $this->endSection() ?>