<!-- 
   page_description
page_title
feature_img
page_keywords

-->

<!DOCTYPE html>
<html>
   <head>
      <!-- Basic -->
      <meta charset="utf-8" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge" />
      <!-- Mobile Metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
      <!-- Site Metas -->
      <meta name="keywords" content="" />
      <meta name="description" content="" />
      <meta name="author" content="" />

      <meta property="og:title" content="<?=$page_title?>">
    <meta property="og:description" content="<?=$page_description?>">
    <meta property="og:type" content="article">
    <meta property="og:url" content="<?=base_url()?>">
    <meta property="og:image" content="/public_asset/images/<?=$feature_img?>">


      <link rel="shortcut icon" href="/public_asset/images/logo.png" type="">
      <title>Candy Fashion</title>
      <!-- bootstrap core css -->
      <link rel="stylesheet" type="text/css" href="<?=base_url('public_asset/css/bootstrap.css')?>" />
      <!-- font awesome style -->
      <link href="<?=base_url('public_asset/css/font-awesome.min.css')?>" rel="stylesheet" />
      <!-- Custom styles for this template -->
      <link href="<?=base_url('public_asset/css/style.css')?>" rel="stylesheet" />
      <!-- responsive style -->
      <link href="<?=base_url('public_asset/css/responsive.css')?>" rel="stylesheet" />
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
      <style>
         .bg-dark, .btn-dark{
            background-color: #002c3e !important;
         }
         .btn-success{
            background-color: #002c3e !important; 
         }
         iframe{
            height:100% !important;
         }
        .pagination {
    display: flex;
    list-style: none;
    padding: 0;
    justify-content: center;
}

.pagination li {
    margin-right: 5px;
}

.pagination li a {
    color: #007bff;
    text-decoration: none;
    padding: 5px 10px;
    border: 1px solid #007bff;
    border-radius: 4px;
}

.pagination li.active a {
    background-color: #007bff;
    color: #fff;
    border-color: #007bff;
}

.pagination li.disabled a {
    pointer-events: none;
    color: #6c757d;
    background-color: #e9ecef;
    border-color: #dee2e6;
}


.product_card:hover {
   box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
  transition: 0.3s;
  cursor: pointer;
  scale: 1.03px;
  border-radius:18px;
  border: 1px solid white;
   
}



    </style>
   </head>
   <body>
      <div class="hero_area">
         <!-- header section strats -->
         <header class="header_section">
            <div class="container">
               <nav class="navbar navbar-expand-lg custom_nav-container ">
                  <a class="navbar-brand" href="/">
                     <img width="250" src="/public_asset/images/logo.png" alt="#" />
                  </a>
                  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                  <span class=""> </span>
                  </button>
                  <div class="collapse navbar-collapse" id="navbarSupportedContent">
                     <ul class="navbar-nav">
                        <li class="nav-item active">
                           <a class="nav-link" href="/">Home <span class="sr-only">(current)</span></a>
                        </li>
                       <!-- <li class="nav-item dropdown">
                           <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="true"> <span class="nav-label">Pages <span class="caret"></span></a>
                           <ul class="dropdown-menu">
                              <li><a href="/about">About</a></li>
                              <li><a href="/testimonials">Testimonial</a></li>
                           </ul>
                        </li> -->
                        <li class="nav-item">
                           <a class="nav-link" href="/products">Products</a>
                        </li>
                        <li class="nav-item">
                           <a class="nav-link" href="/products">About</a>
                        </li>
                        <li class="nav-item" class="btn btn-primary" >
                           <a class="nav-link" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" href="#">Contact</a>
                        </li>
                        <li class="nav-item">
                           <a class="nav-link" href="/view_cart">
                              <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 456.029 456.029" style="enable-background:new 0 0 456.029 456.029;" xml:space="preserve">
                                 <g>
                                    <g>
                                       <path d="M345.6,338.862c-29.184,0-53.248,23.552-53.248,53.248c0,29.184,23.552,53.248,53.248,53.248
                                          c29.184,0,53.248-23.552,53.248-53.248C398.336,362.926,374.784,338.862,345.6,338.862z" />
                                    </g>
                                 </g>
                                 <g>
                                    <g>
                                       <path d="M439.296,84.91c-1.024,0-2.56-0.512-4.096-0.512H112.64l-5.12-34.304C104.448,27.566,84.992,10.67,61.952,10.67H20.48
                                          C9.216,10.67,0,19.886,0,31.15c0,11.264,9.216,20.48,20.48,20.48h41.472c2.56,0,4.608,2.048,5.12,4.608l31.744,216.064
                                          c4.096,27.136,27.648,47.616,55.296,47.616h212.992c26.624,0,49.664-18.944,55.296-45.056l33.28-166.4
                                          C457.728,97.71,450.56,86.958,439.296,84.91z" />
                                    </g>
                                 </g>
                                 <g>
                                    <g>
                                       <path d="M215.04,389.55c-1.024-28.16-24.576-50.688-52.736-50.688c-29.696,1.536-52.224,26.112-51.2,55.296
                                          c1.024,28.16,24.064,50.688,52.224,50.688h1.024C193.536,443.31,216.576,418.734,215.04,389.55z" />
                                    </g>
                                 </g>
                                 <g>
                                 </g>
                                 <g>
                                 </g>
                                 <g>
                                 </g>
                                 <g>
                                 </g>
                                 <g>
                                 </g>
                                 <g>
                                 </g>
                                 <g>
                                 </g>
                                 <g>
                                 </g>
                                 <g>
                                 </g>
                                 <g>
                                 </g>
                                 <g>
                                 </g>
                                 <g>
                                 </g>
                                 <g>
                                 </g>
                                 <g>
                                 </g>
                                 <g>
                                 </g>
                              </svg>
                              <?php if(session()->has('cart')) : ?>
                              <?php  $cart = session()->get('cart'); ?>
                              <span class="badge bg-danger text-white">
                                 <?= count($cart); ?>
                              </span>
                           <?php endif; ?>
                           </a>
                        </li>
                        <form class="form-inline">
                           <button class="btn  my-2 my-sm-0 nav_search-btn" type="submit">
                           <i class="fa fa-search" aria-hidden="true"></i>
                           </button>
                        </form>
                     </ul>
                  </div>
               </nav>
            </div>
         </header>
         <!-- end header section -->
            <?= $this->renderSection('page') ?>
         <!-- footer start -->
      <footer>
         <div class="container">
            <div class="row">
               <div class="col-md-4">
                   <div class="full">
                      <div class="logo_footer">
                        <a href="#">
                           <img width="250" src="/public_asset/images/logo.png" alt="#" />
                        </a>
                      </div>
                      <div class="information_f">
                        <p><strong>ADDRESS:</strong> New Georgia Estate <br>Township of New Georgia <br> Monrovia</p>
                        <p><strong>TELEPHONE:</strong> +231 775 351 303</p>
                        <p><strong>EMAIL:</strong> tarnueatalx@gmail.com </p>
                      </div>
                   </div>
               </div>
               <div class="col-md-8">
                  <div class="row">
                     <div class="col-md-4">
                        <h5 class="text-uppercase fw-bold">Delivery Regions</h5>
                        <nav class="nav flex-column text-dark">
                           <?php if(isset($delivery_location) && !empty($delivery_location)): ?>
                              <?php foreach($delivery_location as $location) : ?>
                                 <a class="nav-link my-0 py-0 text-dark" href="#"><?=$location['regionName'] ?> </a>
                              <?php endforeach; ?>
                           <?php endif; ?>
                        </nav>
                     </div>
                     <div class="col-md-4">
                        <h5 class="text-uppercase fw-bold">Quick Links</h5>
                        <nav class="nav flex-column text-dark">
                        <a class="nav-link my-0 py-0 text-dark" href="/">Home </a>
                        <a class="nav-link my-0 py-0 text-dark" href="/products">Products & Goods </a>
                        <a class="nav-link my-0 py-0 text-dark" href="/about">About Us </a>
                        <a class="nav-link my-0 py-0 text-dark" href="#">Contact Us </a>
                        <a class="nav-link my-0 py-0 text-dark" href="#">Facebook</a>
                        <a class="nav-link my-0 py-0 text-dark" href="#">Whatapp</a>
                        </nav>
                     </div>
                     <div class="col-md-4">
                        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRyZ9u324zTd7EdS01w9XtEJU-lZApFQO1Hiw&s" alt="" class="img-fluid w-100 rounded">
                    </div>
                     
                  </div>
               </div>
               </div>
            </div>
           
         </div>
      </footer>
      <!-- footer end -->



      <div class="cpy_">
         <p class="mx-auto">© 2021 All Rights Reserved By <a href="https://html.design/">Jessica Online</a><br>
         
            Distributed By <a href="https://themewagon.com/" target="_blank">ThemeWagon</a>
         
         </p>
      </div>
      <!-- jQery -->
      <script src="<?=base_url('public_asset/js/jquery-3.4.1.min.js')?>"></script>
      <!-- popper js -->
      <script src="<?=base_url('public_asset/js/popper.min.js')?>"></script>
      <!-- bootstrap js -->
      <script src="<?=base_url('public_asset/js/bootstrap.js')?>"></script>
      <!-- custom js -->
      <script src="<?=base_url('public_asset/js/custom.js')?>"></script>


      <!-- The success modal-->
<?php if(session()->getFlashdata('success')) : ?>
<div class="modal fade" id="successModal">
  <div class="modal-dialog">
    <div class="modal-content">
      <!-- Modal body -->
      <div class="modal-body">
        <h3><?= session()->getFlashdata('success')?></h3>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>
<script>
  $(document).ready(function(){
    $('#successModal').modal('show');
  });
</script>
<?php endif;?>


      <!-- The success modal-->
      <?php if(session()->getFlashdata('error')) : ?>
<div class="modal  fade" id="errorModal">
  <div class="modal-dialog">
    <div class="modal-content rounded-0">
      <!-- Modal body -->
      <div class="modal-body">
        <h3 class="text-dnager"><?= session()->getFlashdata('error')?></h3>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>
<script>
  $(document).ready(function(){
    $('#errorModal').modal('show');
  });
</script>
<?php endif;?>



<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-body pt-5">
       <div class="row border-2 border-danger ">
         <div class="col-md-6">
            <a href="#">
            <img src="/public_asset/images/facebook.png" class="img-fluid" alt="">
            </a>
         </div>
         <div class="col-md-6 ">
            <a href="#">
               <img src="/public_asset/images/whatapp.png" class="img-fluid" alt="">
            </a>
         </div>
         <div class="d-flex justify-content-around mt-1 mb-2 w-100 px-4" style="text-align:right">
            <a type="button" href="#" data-dismiss="modal" aria-label="Close" class="btn btn-danger rounded-0 mt-3">Dismiss</a>
         </div>
       </div>
      </div>
    </div>
  </div>
</div>

   </body>
</html>