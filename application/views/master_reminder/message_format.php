<pre style="font-size:14px;">
<b>Company Name : </b><?php echo $reminder_company_names?> 
<b>Website      : </b><?php echo $reminder_websites?>  
<b>Amount       : </b><?php echo $reminder_amount?>  
<b>GST @ 18     : </b><?php echo $reminder_gst_amt?>  
<b>Net          : </b><?php echo $reminder_net_amt?>  
<b>Renewal Date : </b><?php echo date("d-m-Y", strtotime($reminder_renewel_date))?></b>  
</pre> 
<p>Pending SSL Renewal payment to be paid within final renewal date.</p> 
<p>Thanks,</p>
<p>Webomindapps Team.</p>