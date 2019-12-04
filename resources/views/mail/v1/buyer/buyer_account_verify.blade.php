@include('mail.v1.include.head')
@include('mail.v1.include.header')

<h2 style=" background-color: #00c0ef;    color: #fff;">Email Verification</h2>
<div class="content">
    <div style="width: 100%; clear: both;">
        <table class="table table-striped">
            <tr>
                <td style="border-top: none;">Please click the button below to verify your email address.</td>
            </tr>
            <tr>
                <td style="text-align: center; "><a style="color: #fff !important;" href="{{ $url }}"  class="btn-info">Verify Your Account</a></td>
            </tr>
            <tr>
                <td>If you did not create an account, no further action is required.</td>
            </tr>
        </table>
    </div>

</div>
@include('mail.v1.include.footer')
