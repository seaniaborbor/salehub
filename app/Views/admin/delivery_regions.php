<?= $this->extend('admin/common/layout') ?>

<?=$this->section('page_content')?>


<div class="container-fluid px-4">
    <div class="row">
        <div class="col-md-8">
          <div class="card">
            <div class="card-hdaer bg-primary text-white">
              <h4></h4>
            </div>
            <div class="card-body">
              <table class="table table-sm" id="example">
                <thead>
                  <tr>
                    <td>Region Name</td>
                    <td>Cost of delivery</td>
                  </tr>
                </thead>
                <tbody>
                  <?php if(isset($regions) && !empty($regions)) : ?>
                   <?php foreach($regions as $region) : ?>
                      <tr>
                        <td><?=$region['regionName']?></td>
                        <td><?=$region['regionDeliveryCost']?></td>
                      </tr>
                    <?php endforeach; ?>
                  <?php endif; ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card border-success border-2">
            <div class="card-header bg-success text-white">
              <h5>Add New Delivery Location</h5>
            </div>
            <div class="card-body">
              <form action="/dashboard/delivery_regions" method="post">
                <div class="form-group mb-3">
                  <label for="regionName">Name of the location</label>
                  <input type="text" name="regionName" id="regionName" class="form-control">
                </div>
                <div class="form-group mb-3">
                  <label for="regionDeliveryCost">Delivery Cost</label>
                  <input type="text" name="regionDeliveryCost" id="regionDeliveryCost" class="form-control">
                </div>
                <button class="btn btn-success mt-3">Save Region</button>
              </form>
            </div>
          </div>
        </div>
    </div>
  </div>


<?= $this->endSection()?>