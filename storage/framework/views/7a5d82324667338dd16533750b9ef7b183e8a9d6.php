<?php $__env->startSection('content'); ?>
    <div class="container-fluid app-body">
        <div class="panel panel-default">
            <div class="panel-body">
                <h3>Recent post sent to buffer</h3>
                <div class="activities">
                    <div class="filter-box">
                        <form>
                            <div class="row">
                                <div class="col-md-3">
                                    <input type="text" name="" placeholder="Search" class="form-control">
                                </div>
                                <div class="col-md-3">
                                    <input type="text" name="" class="form-control datepicker" placeholder="Select Date">
                                </div>
                                <div class="col-md-3">
                                    <select name="" class="form-control">
                                        <option value="">Select Group</option>
                                        <?php $__currentLoopData = $groups; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $group): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($group->id); ?>"><?php echo e($group->type); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                            </div>
                        </form>
                    </div>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Group Name</th>
                                <th>Group Type</th>
                                <th>Account name</th>
                                <th>Post Text</th>
                                <th>Time</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if($posts): ?>
                                <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e($post->groupInfo->name); ?></td>
                                        <td><?php echo e($post->groupInfo->type); ?></td>
                                        <td>
                                            <div class="avatar-media">
                                                <a href="#">
                                                    <span><i class="fa fa-<?php echo e($post->account_service); ?>"></i></span>
                                                    <img src="<?php echo e($post->accountInfo->avatar); ?>" alt="" class="media-object img-circle" width="50">
                                                </a>
                                            </div>
                                        </td>
                                        <td><?php echo e($post->post_text); ?></td>
                                        <td><?php echo e(date('d M, Y h:i a', strtotime($post->created_at))); ?></td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>
                        </tbody>
                    </table>

                    <?php echo e($posts->links()); ?>

                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('header-custom-styles'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('css/bootstrap-material-datetimepicker.css')); ?>">
    <style>
        .avatar-media a {
            position: relative;
        }

        .avatar-media a i.fa {
            position: absolute;
            top: 0;
            left: 35px;
            color: #fbfdff;
            background: #2196f3;
            border-radius: 50%;
            padding: 3px;
            z-index: 999;
            box-shadow: 0px 0px 0px 2px #fff;
        }

        .filter-box {
            padding: 0px 0px 15px 15px;
        }
    </style>
<?php $__env->stopPush(); ?>


<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>