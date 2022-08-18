@if (session('success'))
<div class="alert alert-success">
    @lang('users.success')
</div>
@endif

@if (session('failed'))
<div class="alert alert-danger">
    @lang('users.failed')
</div>
@endif

@if (session('registered'))
<div class="alert alert-success">
    @lang('auth.your registration was successful')
</div>
@endif

@if (session('wronCredentials'))
<div class="alert alert-success">
    @lang('auth.user or password was wrong')
</div>
@endif

@if (session('emailHasVerified'))
<div class="alert alert-success">
    @lang('auth.email has verified')
</div>
@endif

@if (session('resetLinkSent'))
<div class="alert alert-success">
    @lang('auth.reset link sent')
</div>
@endif

@if (session('resetLinkFailed'))
<div class="alert alert-danger">
    @lang('auth.reset link failed')
</div>
@endif

@if (session('cantChangePassword'))
<div class="alert alert-danger">
    @lang('auth.cant change password')
</div>
@endif

@if (session('passwordChanged'))
<div class="alert alert-success">
    @lang('auth.password changed')
</div>
@endif



