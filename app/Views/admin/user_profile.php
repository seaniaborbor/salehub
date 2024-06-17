<?= $this->extend('admin/common/layout') ?>

<?=$this->section('page_content')?>
<div class="container">
<div class="row">

<div class="col-md-4">
    <div class="card my-3 shadow-sm" style="border-radius:15px">
        <div class="card-header text-secondary">
            <h5>Account/Profile Details</h5>
        </div>
        <div class="card-body">
            <table class="table mb-3">
                <tr>
                    <td>User Name</td>
                    <td><?=$user[0]['userName']?></td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td><?=$user[0]['userEmail']?></td>
                </tr>
                <tr>
                    <td>Account Type</td>
                    <td><?=$user[0]['userRole']?></td>
                </tr>
            </table>
            
        </div>
    </div>
</div>

<div class="col-md-4">
    <div class="card my-3 shadow-sm" style="border-radius:15px">
        <div class="card-header">
            <h5 class="text-secondary">Task Summary</h5>
        </div>
        <div class="card-body ">
            <div class="row text-center">
                <div class="col-6">
                    <h2><?=$pending_log_count?></h2>
                    <p>Total Delivery</p>
                </div>
                <div class="col-6">
                    <h2><?=$delivered_log_count?></h2>
                    <p>Pending Delivery</p>
                </div>
            </div>
            <hr>
            <a href="/dashboard/agent_delivery_log/<?=$user[0]['adminId']?>" class="btn btn-primary">View Log</a>
        </div>
    </div>
</div>

<div class="col-md-4">
    <div class="card my-3">
        <div class="card-header bg-danger text-white">
            <h5>Update Password</h5>
        </div>
        <div class="card-body">
            <form action="/dashboard/update_password" method="post">
                <input type="hidden" name="userEmail" value="<?=$user[0]['userEmail']?>" >
                <div class="form-group mb-3">
                    <label for="">Provide Old Password</label>
                    <input type="password" name="password" placeholder="Old Password" class="form-control mb-3">
                </div>
                <div class="form-group mb-3">
                    <label for="">New Password</label>
                    <input type="password" name="newPassword" placeholder="New  Password" class="form-control">
                </div>
                <input type="hidden" name="adminId" value="<?=$user[0]['adminId']?>">
                <button type="submit" class="btn btn-outline-danger rounded-pill">Update</button>
            </form>
        </div>
    </div>
</div>
</div>
</div>
<?= $this->endSection()?>