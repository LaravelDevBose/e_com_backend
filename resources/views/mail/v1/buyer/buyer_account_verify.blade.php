@include('mail.v1.include.head')
@include('mail.v1.include.header')

<h2 style=" background-color: #00c0ef;    color: #fff;">Email Verification</h2>
<div class="content">
    <p>Please click the button below to verify your email address.</p>
    <div class="action" style="width: 100%; clear: both;">
        <a style="color: #fff !important;" href="{{ $url }}"  class="button button-primary">Verify Your Account</a>
    </div>
    <p>If you did not create an account, no further action is required.</p>
</div>
@include('mail.v1.include.footer')
