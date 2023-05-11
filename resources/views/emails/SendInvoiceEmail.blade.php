      
@extends('layouts.emails')

@section('content')

    
 <table role="presentation" border="0" cellpadding="0" cellspacing="0" style="border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; width: 100%;" width="100%">
                    <tr>
                      <td style="font-family: sans-serif; font-size: 14px; vertical-align: top;" valign="top">
  <p style="font-family: sans-serif; font-size: 14px; font-weight: normal; margin: 0; margin-bottom: 15px;">
     <!-- Dear{{--$order_details->full_name--}} !-->
      
      </p>
                      <table class="table table-dark   table-bordered">
  <thead>
    <tr>
      <th scope="col">Dear {{$full_name}}{{--$order_details->full_name--}} !</th>
     </tr>
  </thead>
  <tbody>
     <tr >
       <td> Welcome To our Site Ur Invoice  Details is </td> 
 	 </tr>
        
        <tr >
       <td> Name: {{--$order_details->full_name--}}{{$full_name}}<br />
 </td> 
 	 </tr>
     
     <tr >
       <td> coupon_amount: {{--$order_details->coupon_amount--}}{{$coupon_amount}}<br />
</td> 
 	 </tr>
     <tr >
       <td> Grand Total: {{--$order_details->grand_total--}}{{$grand_total}}<br />
</td> 
 	 </tr>
     <tr >
       <td> </td> 
 	 </tr>
     Thanks & Regards,                  
  </tbody>
</table> 
                       
                        <p style="font-family: sans-serif; font-size: 14px; font-weight: normal; margin: 0; margin-bottom: 15px;">
     
                        <p style="font-family: sans-serif; font-size: 14px; font-weight: normal; margin: 0; margin-bottom: 15px;">
                       <!-- Thanks & Regards,--></p>
                       </td>
                    </tr>
                  </table>
                                          
  
 
 
                    
					 