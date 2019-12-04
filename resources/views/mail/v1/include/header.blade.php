<div class="invoice-box">
<div class="header">
    <div class="logo">
        <img src="{{ asset('saliim.png') }}">
    </div>
    <div class="ionfo">
        <h2 class="text text-bold">Company Name</h2>
        <div>Email: <span class="email">info@domail.com</span></div>
        <div>Telephone: <span  class="phne">+000 00000000</span></div>
        <div>Address: <span  class="address">this is your company full address</span></div>
    </div>
    <div class="print-date">
        <span>Date: {{ \Carbon\Carbon::today()->format('d M Y') }}</span>
    </div>
</div>
