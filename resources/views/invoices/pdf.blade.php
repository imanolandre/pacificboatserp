<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        .invoice-box {
            width: 100%;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.15);
            font-size: 16px;
            line-height: 24px;
            color: #000;
        }
        .invoice-box table {
            width: 100%;
            line-height: inherit;
            text-align: left;
            border-collapse: collapse;
        }
        .invoice-box table td {

            vertical-align: top;
        }

        .invoice-box table tr.top table td.title {
            font-size: 45px;
            line-height: 45px;
            color: #333;
        }
        .invoice-box table tr.information table td {
            padding: 20px;
            background: #DCE6F1;
        }
        .invoice-box table tr.heading td {
            background: #244062;
            border-bottom: 1px solid #ddd;
            font-weight: bold;
            color: white;
        }
        .invoice-box table tr.item.last td {
            border-bottom: none;
        }

        .invoice-box table tr .logo {
            width: 100px;
            height: auto;
        }
        .invoice-box .notes {
            text-align: center;
            font-size: 25px;
        }
        .center {
            text-align: center;
        }
        .right {
            text-align: right;
        }
        .left {
            text-align: left;
        }
        .descrip {
            text-align: left;
        }
        .blue {
            color: #0000FF;
        }
        .tables{
            border: 2px solid #000;
        }
        .margen{
            padding-bottom: 10px;
        }
    </style>
</head>
<body>
    <div class="invoice-box">
        <table class="tables margen">
            <tr class="top information">
                <td colspan="5">
                    <table>
                        <tr>
                            <td class="title">
                                <img src="assets/tablar-logo.png" alt="Company logo" class="logo">
                            </td>
                            <td class="descrip" colspan="3">
                                <b>PACIFIC BOAT AND SERVICES</b><br>
                                3828 Udall st.<br>
                                San Diego, CA. 92107<br>
                                (619) 517 9074<br>
                                a1ex012@hotmail.com
                            </td>
                            <td class="right">
                                <h2 class="blue">INVOICE</h2>
                                <b>Inv. No.: {{ $invoice->id }}</b><br>
                                <b>Date:</b> {{ \Carbon\Carbon::parse($invoice->date)->format('M-d') }}<br>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr class="information">
                <td colspan="5">
                    <table>
                        <tr>

                            <td>
                                <b>Bill to:</b> {{ $invoice->client->customer_name }}<br>
                                {{ $invoice->location }}<br>
                                {{ $invoice->email }}
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr class="heading">
                <td colspan="2" class="center tables">SALES PERSON</td>
                <td class="center tables">JOB</td>
                <td class="center tables">TERMS</td>
                <td class="center tables">DUE DATE</td>
            </tr>
            <tr class="details ">
                <td class="tables" colspan="2"> {{ $invoice->client->customer_name }}</td>
                <td class="center tables">{{ $invoice->yacht_name }}</td>
                <td class="center tables">Due on Recipt</td>
                <td class="center tables">{{ \Carbon\Carbon::parse($invoice->due_date)->format('m/d/Y') }}</td>
            </tr>
        </table>
        <table class="tables">
            <tr class="heading">
                <td class="center tables">QTY</td>
                <td colspan="2" class="center des tables">DESCRIPTION</td>
                <td class="center tables">DATE</td>
                <td class="center tables">TOTAL</td>
            </tr>
            @foreach($invoice->details as $detail)
            <tr class="left">
                <td class="center ">{{ $detail->qty }}</td>
                <td colspan="2" class="center des">{{ $detail->service->name }}</td>
                <td class="center">{{ \Carbon\Carbon::parse($invoice->date)->format('m/d/Y') }}</td>
                <td class="center">${{ number_format($detail->total, 2) }}</td>
            </tr>
            @endforeach
        </table>
        <table class="tables">
            @php
                $subtotal = $invoice->details->sum('total');
            @endphp
            <tr colspan="5" class="total">
                <td></td>
                <td colspan="2"></td>
                <td class="center"><b>SUBTOTAL</b></td>
                <td class="center">${{ number_format($subtotal, 2) }}</td>
            </tr>
            <tr class="total">
                <td><b>NOTES:</b></td>
                <td colspan="2"></td>
                <td></td>
                <td></td>
            </tr>
            <tr class="total">
                <td></td>
                <td colspan="2"></td>
                <td class="center"><b>TOTAL DUE</b></td>
                <td class="center">${{ number_format($subtotal, 2) }}</td>
            </tr>
            <tr></tr>
            <tr style="padding-top: 10px;" class="notes">
                <td colspan="5">Make all Checks Payable to <span class="blue">ALEX MERINO</span></td>
            </tr>
        </table>
    </div>
</body>
</html>
