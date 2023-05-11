 <!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title> فاتوره رقم#{{$id}}</title>
   <style>
   .clearfix:after {
  content: "";
  display: table;
  clear: both;
}

a {
  color: #5D6975;
  text-decoration: underline;
}

body {
  position: relative;
  width: 21cm;  
  height: 29.7cm; 
  margin: 0 auto; 
  color: #001028;
  background: #FFFFFF; 
  font-family:  'XBRiyaz', sans-serif; 
  font-size: 12px; 
  
}

 header {
  padding: 10px 0;
  margin-bottom: 20px;
  border-bottom: 1px solid #AAAAAA;
}

#logo {
  float: left;
  margin-top: 8px;
}

#logo img {
  height: 70px;
}

#company {
  float: right;
  text-align: right;
}


#details {
  margin-bottom: 50px;
}

#client {
  padding-left: 6px;
  border-left: 6px solid #0087C3;
  float: left;
}

#client .to {
  color: #777777;
}

h2.name {
  font-size: 1.4em;
  font-weight: normal;
  margin: 0;
}

#invoice {
  float: right;
  text-align: right;
}

#invoice h1 {
  color: #0087C3;
  font-size: 2.4em;
  line-height: 1em;
  font-weight: normal;
  margin: 0  0 10px 0;
}

#invoice .date {
  font-size: 1.1em;
  color: #777777;
}

 
table {
  width: 100%;
  border-collapse: collapse;
  border-spacing: 0;
  margin-bottom: 20px;
}

table tr:nth-child(2n-1) td {
  background: #F5F5F5;
}

table th,
table td {
  text-align: center;
}

table th {
  padding: 5px 20px;
  color: #5D6975;
  border-bottom: 1px solid #C1CED9;
  white-space: nowrap;        
  font-weight: normal;
}

table .service,
table .desc {
  text-align: left;
}

table td {
  padding: 20px;
  text-align: right;
}

table td.service,
table td.desc {
  vertical-align: top;
}

table td.unit,
table td.qty,
table td.total {
  font-size: 1.2em;
}

table td.grand {
  border-top: 1px solid #5D6975;;
}

#notices .notice {
  color: #5D6975;
  font-size: 1.2em;
}

footer {
  color: #5D6975;
  width: 100%;
  height: 30px;
  position: absolute;
  bottom: 0;
  border-top: 1px solid #C1CED9;
  padding: 8px 0;
  text-align: center;
}
<!--add this to make header and footer in PDF -->
@page {
  header: page-header;
  footer: page-footer;
}
   </style>
  </head>
  <body>
    <header class="clearfix">
      <div id="logo">
         <img src="{{asset('images/noimage.png')}}" style="width:70px;height:70px;">
      </div>
      <div id="company">
        <h2 class="name">Company Name</h2>
        <div>455 Foggy Heights, AZ 85004, US</div>
        <div>(602) 519-0450</div>
        <div><a href="mailto:company@example.com">company@example.com</a></div>
      </div>
      </div>
    </header>
    <main><div id="details" class="clearfix">
    <table style="border:0;background:#FFFFFF; " ><tr><td style="border:0;background:#FFFFFF;float:right " align="right">
        
          <div class="to">INVOICE TO:</div>
          <h2 class="name"> {{$user_name}}</h2>
          <div class="address"> {{$country}},{{$city}},{{$address}} </div>
          <div class="email"><a href="mailto:{{$email}}">{{$email}}</a></div>
         </td>
        <td style="border:0;background:#FFFFFF; "> 
        &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
        </td>
      <td> 
         <img src="{{asset('images/noimage.png')}}" style="width:70px;height:70px;">
       </td>
      
        <td style="border:0;background:#FFFFFF;float:left " align="left"> 
          <h1>INVOICE 3-2-1</h1>
          <div class="date">Date of Invoice: {{$date}}</div>
          <div class="date">Due Date: 30/06/2014</div>
        
     </td>
      </tr>
      </table>
       </div>
        
        
          
        
        
       <table>
        <thead>
          <tr>
            <th class="service">المنتجات</th>
            <th class="desc">DESCRIPTION</th>
            <th>PRICE</th>
            <th>QTY</th>
            <th>TOTAL</th>
          </tr>
        </thead>
        <tbody>
             
            @php $total=0; @endphp
                 @foreach($items as $pro_detail)

          <tr>
            <td class="service">{{$pro_detail['name']}} </td>
            <td class="desc">  size : {{$pro_detail['size']}}<br>
            Color: {{$pro_detail['color']}}
</td>

            <td class="unit">${{$pro_detail['price']}} </td>
            <td class="qty">{{$pro_detail['quantity']}}</td>
            <td class="total">${{$pro_detail['sub_total']}} </td>
             @php $sub_total=$pro_detail['sub_total'];
                        $total+=$sub_total;
                        @endphp
          </tr>
            @endforeach
          <tr> 
            <td colspan="4">SUBTOTAL</td>
            <td class="total">${{$total}}</td>
          </tr>
          <tr>
            <td colspan="4">Shipping Charges</td>
            <td class="total">${{$shipping_charges}}</td>
          </tr>
          <tr>
            <td colspan="4">TAX 25%</td>
            <td class="total">$0</td>
          </tr>
           <tr>
            <td colspan="4">Coupon Amount</td>
            <td class="total">${{$coupon_amount}}</td>
          </tr>
          <tr>
            <td colspan="4" class="grand total">GRAND TOTAL</td>
            <td class="grand total"> ${{$grand_total}}</td>
          </tr>
        </tbody>
      </table>
      <div id="thanks">Thank you!</div>
      <div id="notices">
        <div>NOTICE:</div>
        <div class="notice">A finance charge of 1.5% will be made on unpaid balances after 30 days.</div>
      </div>
    </main>
    <footer>
      Invoice was created on a computer and is valid without the signature and seal.
    </footer>
  </body>
</html>