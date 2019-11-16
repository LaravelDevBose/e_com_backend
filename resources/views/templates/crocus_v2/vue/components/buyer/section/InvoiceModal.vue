<template>
    <div id="invoice" class="modal fade">
        <div class="modal-dialog modal-lg modal-full">
            <div class="modal-content">
                <div class="hidden-print">
                    <div class="text-right">
                        <button id="printInvoice" class="btn btn-info"><i class="fa fa-print"></i> Print</button>
                        <button class="btn btn-info"><i class="fa fa-file-pdf-o"></i> Export as PDF</button>
                    </div>
                    <hr>
                </div>
                <div>
                    <div class="invoice overflow-auto">
                        <div >
                            <div class="invoice-header">
                                <div class="row">
                                    <div class="col-md-6">
                                        <a target="_blank" href="https://lobianijs.com">
                                            <img src="http://lobianijs.com/lobiadmin/version/1.0/ajax/img/logo/lobiadmin-logo-text-64.png" data-holder-rendered="true" />
                                        </a>
                                        <div class="comp-info">
                                            <h2 class="comp-name">John Doe</h2>
                                            <div class="address">796 Silver Harbour, TX 79273, US</div>
                                            <div class="email"><a href="mailto:john@example.com">john@example.com</a></div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 invoice-details">
                                        <h1 class="invoice-id">INVOICE 3-2-1</h1>
                                        <div class="date">Date of Invoice: 01/10/2018</div>
                                        <div class="date">Due Date: 30/10/2018</div>
                                    </div>
                                </div>
                            </div>

                            <main>
                                <div class="row contacts">
                                    <div class="col-md-4 invoice-to">
                                        <div class="text-gray-light">Shipping TO:</div>
                                        <h2 class="to">John Doe</h2>
                                        <div class="address">796 Silver Harbour, TX 79273, US</div>
                                        <div class="email"><a href="mailto:john@example.com">john@example.com</a></div>
                                    </div>
                                    <div class="col-md-4 invoice-to">
                                        <div class="text-gray-light">Billing TO:</div>
                                        <h2 class="to">John Doe</h2>
                                        <div class="address">796 Silver Harbour, TX 79273, US</div>
                                        <div class="email"><a href="mailto:john@example.com">john@example.com</a></div>
                                    </div>
                                    <div class="col-md-4 company-details">
                                        <div class="text-gray-light">Payment Details:</div>
                                        <h2 class="to">John Doe</h2>
                                        <div class="address">796 Silver Harbour, TX 79273, US</div>
                                        <div class="email"><a href="mailto:john@example.com">john@example.com</a></div>
                                    </div>
                                </div>
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th class="text-left">DESCRIPTION</th>
                                        <th class="text-right">HOUR PRICE</th>
                                        <th class="text-right">HOURS</th>
                                        <th class="text-right">TOTAL</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td class="no">04</td>
                                        <td class="text-left"><h3>
                                            <a target="_blank" href="https://www.youtube.com/channel/UC_UMEcP_kF0z4E6KbxCpV1w">
                                                Youtube channel
                                            </a>
                                        </h3>
                                            <a target="_blank" href="https://www.youtube.com/channel/UC_UMEcP_kF0z4E6KbxCpV1w">
                                                Useful videos
                                            </a>
                                            to improve your Javascript skills. Subscribe and stay tuned :)
                                        </td>
                                        <td class="unit">$0.00</td>
                                        <td class="qty">100</td>
                                        <td class="total">$0.00</td>
                                    </tr>
                                    <tr>
                                        <td class="no">01</td>
                                        <td class="text-left"><h3>Website Design</h3>Creating a recognizable design solution based on the company's existing visual identity</td>
                                        <td class="unit">$40.00</td>
                                        <td class="qty">30</td>
                                        <td class="total">$1,200.00</td>
                                    </tr>
                                    <tr>
                                        <td class="no">02</td>
                                        <td class="text-left"><h3>Website Development</h3>Developing a Content Management System-based Website</td>
                                        <td class="unit">$40.00</td>
                                        <td class="qty">80</td>
                                        <td class="total">$3,200.00</td>
                                    </tr>
                                    <tr>
                                        <td class="no">03</td>
                                        <td class="text-left"><h3>Search Engines Optimization</h3>Optimize the site for search engines (SEO)</td>
                                        <td class="unit">$40.00</td>
                                        <td class="qty">20</td>
                                        <td class="total">$800.00</td>
                                    </tr>
                                    </tbody>
                                    <tfoot>
                                    <tr>
                                        <td colspan="2"></td>
                                        <td colspan="2">SUBTOTAL</td>
                                        <td>$5,200.00</td>
                                    </tr>
                                    <tr>
                                        <td colspan="2"></td>
                                        <td colspan="2">TAX 25%</td>
                                        <td>$1,300.00</td>
                                    </tr>
                                    <tr>
                                        <td colspan="2"></td>
                                        <td colspan="2">GRAND TOTAL</td>
                                        <td>$6,500.00</td>
                                    </tr>
                                    </tfoot>
                                </table>
                                <div class="thanks">Thank you!</div>
                                <div class="notices">
                                    <div>NOTICE:</div>
                                    <div class="notice">A finance charge of 1.5% will be made on unpaid balances after 30 days.</div>
                                </div>
                            </main>
                            <footer>
                                Invoice was created on a computer and is valid without the signature and seal.
                            </footer>
                        </div>
                        <!--DO NOT DELETE THIS div. IT is responsible for showing footer always at the bottom-->
                        <div></div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import {mapGetters, mapActions} from 'vuex';

    export default {
        name: "InvoiceModal",
        methods:{
            ...mapActions([

            ])
        },
        computed:{
            ...mapGetters([
                'orderInfo',
            ])
        }
    }
</script>

<style scoped>
    #invoice{
        padding: 30px;
    }
    .invoice .invoice-header{
        border-bottom: 1px solid #ddd;
        margin-bottom: 1rem;
        padding-bottom: 1rem;
    }
    .invoice {
        position: relative;
        background-color: #FFF;
        min-height: 680px;
        padding: 15px
    }

    .invoice header {
        padding: 10px 0;
        margin-bottom: 20px;
        border-bottom: 1px solid #3989c6
    }

    .invoice .comp-info .comp-name{
        font-size: 2.5rem;
        margin-top: 0;
        margin-bottom: 0
    }
    .invoice .company-details {
        text-align: right
    }

    .invoice .company-details .name {
        margin-top: 0;
        margin-bottom: 0
    }

    .invoice .contacts {
        margin-bottom: 20px
    }

    .invoice .invoice-to {
        text-align: left
    }

    .invoice .invoice-to .to,.invoice .company-details .to {
        margin-top: 0;
        margin-bottom: 0
    }

    .invoice .invoice-details {
        text-align: right
    }

    .invoice .invoice-details .invoice-id {
        margin-top: 0;
        color: #3989c6;
        font-size: 2.5rem;
    }

    .invoice main {
        padding-bottom: 50px
    }

    .invoice main .thanks {
        margin-top: -100px;
        font-size: 2em;
        margin-bottom: 50px
    }

    .invoice main .notices {
        padding-left: 6px;
        border-left: 6px solid #3989c6
    }

    .invoice main .notices .notice {
        font-size: 1.2em
    }

    .invoice table {
        width: 100%;
        border-collapse: collapse;
        border-spacing: 0;
        margin-bottom: 20px
    }

    .invoice table td,.invoice table th {
        padding: 15px;
        background: #eee;
        border-bottom: 1px solid #fff
    }

    .invoice table th {
        white-space: nowrap;
        font-weight: 400;
        font-size: 16px
    }

    .invoice table td h3 {
        margin: 0;
        font-weight: 400;
        color: #3989c6;
        font-size: 1.2em
    }

    .invoice table .qty,.invoice table .total,.invoice table .unit {
        text-align: right;
        font-size: 1.2em
    }

    .invoice table .no {
        color: #fff;
        font-size: 1.6em;
        background: #3989c6
    }

    .invoice table .unit {
        background: #ddd
    }

    .invoice table .total {
        background: #3989c6;
        color: #fff
    }

    .invoice table tbody tr:last-child td {
        border: none
    }

    .invoice table tfoot td {
        background: 0 0;
        border-bottom: none;
        white-space: nowrap;
        text-align: right;
        padding: 10px 20px;
        font-size: 1.2em;
        border-top: 1px solid #aaa
    }

    .invoice table tfoot tr:first-child td {
        border-top: none
    }

    .invoice table tfoot tr:last-child td {
        color: #3989c6;
        font-size: 1.4em;
        border-top: 1px solid #3989c6
    }

    .invoice table tfoot tr td:first-child {
        border: none
    }

    .invoice footer {
        width: 100%;
        text-align: center;
        color: #777;
        border-top: 1px solid #aaa;
        padding: 8px 0
    }

    @media print {
        .invoice {
            font-size: 11px!important;
            overflow: hidden!important
        }

        .invoice footer {
            position: absolute;
            bottom: 10px;
            page-break-after: always
        }

        .invoice>div:last-child {
            page-break-before: always
        }
    }
</style>
