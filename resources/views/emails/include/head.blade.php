<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-xVVam1KS4+Qt2OrFa+VdRUoXygyKIuNWUUUBZYv+n27STsJ7oDOHJgfF0bNKLMJF" crossorigin="anonymous">
        <meta charset="utf-8">
        <style>
            .invoice-box{
                max-width:800px;
                margin:auto;
                border:1px solid #eee;
                box-shadow:0 0 10px rgba(0, 0, 0, .15);
                font-size:16px;
                line-height:24px;
                font-family:'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
                color:#555;
            }

            .invoice-box .header{
                padding:15px  20px;
                border-bottom: 1px solid #87c940;
                background-color: #fff;

            }
            .invoice-box .content{
                padding:10px 20px;
            }

            .invoice-box .footer{
                padding: 10px 20px;
                font-size: 12px;
                margin-top: 10px;
                border-top: 1px solid #87c940;

            }

            .invoice-box .footerRight{
                text-align: right;
            }

            .approveBtn{
                padding: 15px;
                display: block;
                margin: 10px 0;
                color: #fff;
                background-color: #00c0ef;
                border: 1px solid #00c0ef;
                text-align: center;
                max-width: 190px;
                text-decoration: none;
            }
            h2 {
                padding: 15px;
                margin: 0 0 15px;
                text-align: center;
            }
            .table {
                width: 100%;
                max-width: 100%;
                margin-bottom: 1rem;
                border: .5px solid #eee;
                padding: 2px;
                box-shadow: 0px 0px 4px #eee;
            }
            .table.table-striped tbody tr:nth-of-type(odd) {
                background: #f2f4f8;
            }
            .table-striped tbody tr:nth-of-type(odd) {
                background-color: #f9f9f9;
            }
            .bg-success {
                color: #fff!important;
                background-color: #5cb85c!important;
            }

            .table  tr:first-child td:first-child {
                border-top: none;
            }
            .table td, .table th {
                border-color: #eceff4;
            }
            .table td, .table th {
                padding: .75rem;
                line-height: 1.5;
                vertical-align: top;
                border-top: 1px solid #eceeef;
            }
            .bg-warning {
                color: #fff!important;
                background-color: #f0ad4e!important;
            }
            .bg-info {
                background-color: #00c0ef !important;
                color: #fff!important;
            }
            .btn-info{
                font-family: Avenir, Helvetica, sans-serif;
                box-sizing: border-box;
                border-radius: 3px;
                box-shadow: 0 2px 3px rgba(0, 0, 0, 0.16);
                color: #FFF;
                display: inline-block;
                text-decoration: none;
                -webkit-text-size-adjust: none;
                background-color: #3097D1;
                border-top: 10px solid #3097D1;
                border-right: 18px solid #3097D1;
                border-bottom: 10px solid #3097D1;
                border-left: 18px solid #3097D1;
            }
        </style>
        @include('emails.include.bootstrap')
    </head>
<body>
