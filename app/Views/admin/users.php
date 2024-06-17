<?= $this->extend('admin/common/layout') ?>

<?=$this->section('page_content')?>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h3>User Accounts</h3>
                </div>
                <div class="card-body">
                    <?php if(isset($all_users) && !empty($all_users)) : ?>
                        <table class="table table-sm">
                           <thead>
                            <tr>
                                <td>User Name</td>
                                <td>User Email</td>
                                <td>Account Type </td>
                                <td>Actions</td>
                            </tr>
                           </thead>
                           <tbody>
                            <?php foreach($all_users as $user) : ?>
                                <tr>
                                    <td><?=$user['userName']?></td>
                                    <td><?=$user['userEmail']?></td>
                                    <td><?=$user['userName']?></td>
                                    <td>
                                    <div class="dropdown">
                                        <a class="btn btn-primary btn-sm dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                           Mores
                                        </a>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="/dashboard/profile/<?=$user['adminId']?>">Profile</a></li>
                                            <li><a class="dropdown-item text-warning" href="#" data-bs-toggle="modal" data-bs-target="#warningModel">Deactivate</a></li>
                                        </ul>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                           </tbody>
                        </table>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card shadow-lg">
                <div class="card-header bg-success text-white">
                    <h3>Add New User </h3>
                </div>
                <div class="card-body">
                    <form action="/dashboard/users" method="post">
                        <div class="form-group">
                            <label for="userName">User Full Name </label>
                            <input type="text" name="userName" class="form-control">
                            <?php if(isset($validation) && $validation->hasError('userName')) : ?>
                                <div class="text-danger mt-2"><?= $validation->getError('userName') ?></div>
                            <?php endif; ?>
                        </div>
                        <div class="form-group">
                            <label for="userEmail">User Email</label>
                            <input type="email" name="userEmail" class="form-control">
                            <?php if(isset($validation) && $validation->hasError('userEmail')) : ?>
                                <div class="text-danger mt-2"><?= $validation->getError('userEmail') ?></div>
                            <?php endif; ?>
                        </div>
                        <div class="form-group">
                            <label for="userType">User Type</label>
                            <select name="userRole" id="userType" class="form-control">
                                <option value="">--choose--</option>
                                <option value="agent">Delivery Agent</option>
                                <option value="admin">Administrator</option>
                            </select>
                            <?php if(isset($validation) && $validation->hasError('userRole')) : ?>
                                <div class="text-danger mt-2"><?= $validation->getError('userRole') ?></div>
                            <?php endif; ?>
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-primary mt-3" value="Submit">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>




<!-- Modal -->
<div class="modal fade" id="warningModel" tabindex="-1" aria-labelledby="warningModelLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      
      <div class="modal-body text-center p-3 ">
       <h4 class="text-danger">This functionality is not finished yet. Contact Developer to do it on the server</h4>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Dismiss</button>
      </div>
    </div>
  </div>
</div>

<?= $this->endSection()?>