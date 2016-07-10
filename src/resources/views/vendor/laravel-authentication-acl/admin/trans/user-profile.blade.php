<?php if (!empty($data['user'])): ?>
    <div class='user-profile-detail'>
        <div class="panel panel-info">
            <div class="panel-heading">
                <h3 class="panel-title"><?php echo $data['user']['first_name'].' '.$data['user']['last_name'] ?></h3>
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-3 col-lg-3 " align="center"> 
                        <img src="{!! URL::asset('/packages/jacopo/laravel-authentication-acl/images/avatar.png') !!}" width="{{50}}" class="img-circle">
                    </div>

                    <div class=" col-md-9 col-lg-9 "> 
                        <table class="table table-user-information">
                            <tbody>
                                <tr>
                                    <td>Họ và tên:</td>
                                    <td><?php echo $data['user']['first_name'].' '.$data['user']['last_name'] ?></td>
                                </tr>
                                <tr>
                                    <td>Mã nhân viên:</td>
                                    <td><?php echo $data['user']['uid'] ?></td>
                                </tr>
                                <tr>
                                    <td>Email:</td>
                                    <td><?php echo $data['user']['email'] ?></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>