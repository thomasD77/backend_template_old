<?php require '../resources/inc/_global/config.php'; ?>
<?php require '../resources/inc/backend/config.php'; ?>
<?php require '../resources/inc/_global/views/head_start.php'; ?>
<?php require '../resources/inc/_global/views/head_end.php'; ?>
<?php require '../resources/inc/_global/views/page_start.php'; ?>

<!-- Hero -->
<div class="bg-image" style="background-image: url('http://localhost/backend_template/public/media/photos/photo10@2x.jpg');">
  <div class="bg-primary-dark-op">
    <div class="content content-full text-center">
      <div class="my-3">
          <?php $one->get_avatar(13, '', false, true); ?>
      </div>
      <h1 class="h2 text-white mb-0">Edit Account</h1>
      <h2 class="h4 fw-normal text-white-75">
          <?php echo Auth::user()->name; ?>
      </h2>
      <a class="btn btn-alt-secondary" href="{{ asset('/dashboard') }}">
        <i class="fa fa-fw fa-arrow-left text-danger"></i> Back to Dashboard
      </a>
    </div>
  </div>
</div>
<!-- END Hero -->

<!-- Page Content -->
<div class="content content-boxed">
  <!-- User Profile -->
  <div class="block block-rounded">
    <div class="block-header block-header-default">
      <h3 class="block-title">User Profile</h3>
    </div>
    <div class="block-content">
          <div class="row push">
          <div class="col-lg-4">
            <p class="fs-sm text-muted">
              Your account’s vital info. Your username will be publicly visible.
            </p>
          </div>
          <div class="col-lg-8 col-xl-5">
              {!! Form::open(['method'=>'PATCH', 'action'=>['App\Http\Controllers\AdminUsersController@update',$user->id],
            'files'=>true])
             !!}
              <div class="form-group mb-4">
                  {!! Form::label('one-profile-edit-username', 'Username:',['class'=>'form-label']) !!}
                  {!! Form::text('username',$user->username,['class'=>'form-control']) !!}
              </div>
              <div class="form-group mb-4">
                  {!! Form::label('one-profile-edit-name', 'Name:', ['class'=>'form-label']) !!}
                  {!! Form::text('name',$user->name,['class'=>'form-control']) !!}
              </div>
              <div class="form-group mb-4">
                  {!! Form::label('one-profile-edit-email', 'E-mail:', ['class'=>'form-label']) !!}
                  {!! Form::text('email',$user->email,['class'=>'form-control']) !!}
              </div>

<!--              <div class="form-group">
                  {!! Form::label('password', 'Password:') !!}
                  {!! Form::password('password',['class'=>'form-control']) !!}
              </div>
              <div class="form-group">
                  {!! Form::label('photo_id', 'Photo:') !!}
                  {!! Form::file('photo_id',null,['class'=>'form-control']) !!}
              </div>-->

              <div class="d-flex justify-content-between">
                  <div class="form-group mr-1">
                      {!! Form::submit('Update',['class'=>'btn btn-alt-primary']) !!}
                  </div>
              {!! Form::close() !!}


<!--                <div class="mb-4">
                  <label class="form-label">Your Avatar</label>
                  <div class="mb-4">
                      <?php $one->get_avatar(13); ?>
                  </div>
                  <div class="mb-4">
                    <label for="one-profile-edit-avatar" class="form-label">Choose a new avatar</label>
                    <input class="form-control" type="file" id="one-profile-edit-avatar">
                  </div>
                </div>-->

          </div>
        </div>
      </div>
  </div>
  <!-- END User Profile -->

  <!-- Change Password -->
  <div class="block block-rounded">
    <div class="block-header block-header-default">
      <h3 class="block-title">Change Password</h3>
    </div>
    <div class="block-content">
        <div class="row push">
          <div class="col-lg-4">
            <p class="fs-sm text-muted">
              Changing your sign in password is an easy way to keep your account secure.
            </p>
          </div>
          <div class="col-lg-8 col-xl-5">
              {!! Form::open(['method'=>'POST', 'action'=>['App\Http\Controllers\AdminUsersController@updatePassword',$user->id]]) !!}
              <div class="form-group mb-4">
                  {!! Form::label('one-profile-edit-password', 'Current Password:',['class'=>'form-label']) !!}
                  {!! Form::password('currentPassword',['class'=>'form-control']) !!}
                  @if(Session::has('user_message'))
                      <p class="alert alert-danger my-2">{{session('user_message')}}</p>
                  @endif
              </div>
              <div class="form-group mb-4">
                  {!! Form::label('one-profile-edit-password-new', 'New Password:',['class'=>'form-label']) !!}
                  {!! Form::password('newPassword',['class'=>'form-control']) !!}
              </div>
              <div class="form-group mb-4">
                  {!! Form::label('one-profile-edit-password-new-confirm', 'Confirm Password:',['class'=>'form-label']) !!}
                  {!! Form::password('confirmPassword',['class'=>'form-control']) !!}
                  @if(Session::has('user_password'))
                      <p class="alert alert-danger my-2">{{session('user_password')}}</p>
                  @endif
                  @if ($errors->any())
                      <div class="alert alert-danger mb-0 mt-2">
                          <ul>
                              @foreach ($errors->all() as $error)
                                  <li>{{ $error }}</li>
                              @endforeach
                          </ul>
                      </div>
                  @endif
              </div>

              <div class="d-flex justify-content-between">
                  <div class="form-group mr-1">
                      {!! Form::submit('Update',['class'=>'btn btn-alt-primary']) !!}
                  </div>
              {!! Form::close() !!}
          </div>
        </div>
  </div>
  <!-- END Change Password -->

  <!-- Billing Information -->
  <div class="block block-rounded">
    <div class="block-header block-header-default">
      <h3 class="block-title">Billing Information</h3>
    </div>
    <div class="block-content">
        <div class="row push">
          <div class="col-lg-4">
            <p class="fs-sm text-muted">
              Your billing information is never shown to other users and only used for creating your invoices.
            </p>
          </div>
          <div class="col-lg-8 col-xl-5">
              @if(Auth::user()->billing)
                  {!! Form::open(['method'=>'PATCH', 'action'=>['App\Http\Controllers\AdminBillingController@update', $user->billing->id]]) !!}

                  <div class="form-group mb-4">
                      {!! Form::label('one-profile-edit-company', 'Company (Optional):',['class'=>'form-label']) !!}
                      {!! Form::text('company',$user->billing? $user->billing->company : "",['class'=>'form-control']) !!}
                  </div>

                  <div class="row mb-4">
                      <div class="form-group col-6">
                          {!! Form::label('one-profile-edit-firstname', 'Firstname:',['class'=>'form-label']) !!}
                          {!! Form::text('firstname',$user->billing? $user->billing->firstname : "",['class'=>'form-control']) !!}
                      </div>
                      <div class="form-group col-6">
                          {!! Form::label('one-profile-edit-lastname', 'Lastname:',['class'=>'form-label']) !!}
                          {!! Form::text('lastname',$user->billing? $user->billing->lastname : "",['class'=>'form-control']) !!}
                      </div>
                  </div>

                  <div class="form-group mb-4">
                      {!! Form::label('one-profile-edit-streetAddress1', 'Street Address 1:',['class'=>'form-label']) !!}
                      {!! Form::text('streetAddress1',$user->billing? $user->billing->streetAddress1 : "",['class'=>'form-control']) !!}
                  </div>

                  <div class="form-group mb-4">
                      {!! Form::label('one-profile-edit-streetAddress2', 'Street Address 2:',['class'=>'form-label']) !!}
                      {!! Form::text('streetAddress2',$user->billing? $user->billing->streetAddress2 : "",['class'=>'form-control']) !!}
                  </div>

                  <div class="form-group mb-4">
                      {!! Form::label('one-profile-edit-city', 'City:',['class'=>'form-label']) !!}
                      {!! Form::text('city',$user->billing? $user->billing->city : "",['class'=>'form-control']) !!}
                  </div>

                  <div class="form-group mb-4">
                      {!! Form::label('one-profile-edit-postalCode', 'Postal Code:',['class'=>'form-label']) !!}
                      {!! Form::text('postalCode',$user->billing? $user->billing->postalCode : "",['class'=>'form-control']) !!}
                  </div>

                  <div class="form-group mb-4">
                      {!! Form::label('one-profile-edit-VAT', 'VAT Number:',['class'=>'form-label']) !!}
                      {!! Form::text('VAT',$user->billing? $user->billing->VAT : "",['class'=>'form-control']) !!}
                  </div>

                  <div class="d-flex justify-content-between">
                      <div class="form-group mr-1">
                          {!! Form::submit('Update',['class'=>'btn btn-alt-primary']) !!}
                      </div>
                      {!! Form::close() !!}
              @else
                  {!! Form::open(['method'=>'POST', 'action'=>['App\Http\Controllers\AdminBillingController@store']]) !!}

                  <div class="form-group mb-4">
                      {!! Form::label('one-profile-edit-company', 'Company (Optional):',['class'=>'form-label']) !!}
                      {!! Form::text('company',$user->billing? $user->billing->company : "",['class'=>'form-control']) !!}
                  </div>

                  <div class="row mb-4">
                      <div class="form-group col-6">
                          {!! Form::label('one-profile-edit-firstname', 'Firstname:',['class'=>'form-label']) !!}
                          {!! Form::text('firstname',$user->billing? $user->billing->firstname : "",['class'=>'form-control']) !!}
                      </div>
                      <div class="form-group col-6">
                          {!! Form::label('one-profile-edit-lastname', 'Lastname:',['class'=>'form-label']) !!}
                          {!! Form::text('lastname',$user->billing? $user->billing->lastname : "",['class'=>'form-control']) !!}
                      </div>
                  </div>

                  <div class="form-group mb-4">
                      {!! Form::label('one-profile-edit-streetAddress1', 'Street Address 1:',['class'=>'form-label']) !!}
                      {!! Form::text('streetAddress1',$user->billing? $user->billing->streetAddress1 : "",['class'=>'form-control']) !!}
                  </div>

                  <div class="form-group mb-4">
                      {!! Form::label('one-profile-edit-streetAddress2', 'Street Address 2:',['class'=>'form-label']) !!}
                      {!! Form::text('streetAddress2',$user->billing? $user->billing->streetAddress2 : "",['class'=>'form-control']) !!}
                  </div>

                  <div class="form-group mb-4">
                      {!! Form::label('one-profile-edit-city', 'City:',['class'=>'form-label']) !!}
                      {!! Form::text('city',$user->billing? $user->billing->city : "",['class'=>'form-control']) !!}
                  </div>

                  <div class="form-group mb-4">
                      {!! Form::label('one-profile-edit-postalCode', 'Postal Code:',['class'=>'form-label']) !!}
                      {!! Form::text('postalCode',$user->billing? $user->billing->postalCode : "",['class'=>'form-control']) !!}
                  </div>

                  <div class="form-group mb-4">
                      {!! Form::label('one-profile-edit-VAT', 'VAT Number:',['class'=>'form-label']) !!}
                      {!! Form::text('VAT',$user->billing? $user->billing->VAT : "",['class'=>'form-control']) !!}
                  </div>

                  <div class="d-flex justify-content-between">
                      <div class="form-group mr-1">
                          {!! Form::submit('Save',['class'=>'btn btn-alt-primary']) !!}
                      </div>
                      {!! Form::close() !!}
              @endif

          </div>
          </div>
        </div>
    </div>
  </div>
  <!-- END Billing Information -->

  <!-- Connections -->
<!--  <div class="block block-rounded">
    <div class="block-header block-header-default">
      <h3 class="block-title">Connections</h3>
    </div>
    <div class="block-content">
      <div class="row push">
        <div class="col-lg-4">
          <p class="fs-sm text-muted">
            You can connect your account to third party networks to get extra features.
          </p>
        </div>
        <div class="col-lg-8 col-xl-7">
          <div class="row mb-4">
            <div class="col-sm-10 col-md-8 col-xl-6">
              <a class="btn w-100 btn-alt-danger text-start" href="javascript:void(0)">
                <i class="fab fa-fw fa-google opacity-50 me-1"></i> Connect to Google
              </a>
            </div>
          </div>
          <div class="row mb-4">
            <div class="col-sm-10 col-md-8 col-xl-6">
              <a class="btn w-100 btn-alt-info text-start" href="javascript:void(0)">
                <i class="fab fa-fw fa-twitter opacity-50 me-1"></i> Connect to Twitter
              </a>
            </div>
          </div>
          <div class="row mb-4">
            <div class="col-sm-10 col-md-8 col-xl-6">
              <a class="btn w-100 btn-alt-primary bg-white d-flex align-items-center justify-content-between" href="javascript:void(0)">
                <span>
                  <i class="fab fa-fw fa-facebook me-1"></i> John Doe
                </span>
                <i class="fa fa-fw fa-check me-1"></i>
              </a>
            </div>
            <div class="col-sm-12 col-md-4 col-xl-6 mt-1 d-md-flex align-items-md-center fs-sm">
              <a class="btn btn-sm btn-alt-secondary rounded-pill" href="javascript:void(0)">
                <i class="fa fa-fw fa-pencil-alt me-1"></i> Edit Facebook Connection
              </a>
            </div>
          </div>
          <div class="row mb-4">
            <div class="col-sm-10 col-md-8 col-xl-6">
              <a class="btn w-100 btn-alt-warning bg-white d-flex align-items-center justify-content-between" href="javascript:void(0)">
                <span>
                  <i class="fab fa-fw fa-instagram me-1"></i> @john_doe
                </span>
                <i class="fa fa-fw fa-check me-1"></i>
              </a>
            </div>
            <div class="col-sm-12 col-md-4 col-xl-6 mt-1 d-md-flex align-items-md-center fs-sm">
              <a class="btn btn-sm btn-alt-secondary rounded-pill" href="javascript:void(0)">
                <i class="fa fa-fw fa-pencil-alt me-1"></i> Edit Instagram Connection
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>-->
  <!-- END Connections -->
</div>
<!-- END Page Content -->

<?php require '../resources/inc/_global/views/page_end.php'; ?>
<?php require '../resources/inc/_global/views/footer_start.php'; ?>
<?php require '../resources/inc/_global/views/footer_end.php'; ?>
