<?php
?>
<style>
table {
  border-collapse: collapse;
  width: 100%;
}
th, td {
  padding: 0.25rem;
  text-align: left;
  border: 1px solid #ccc;
}
tbody tr:nth-child(odd) {
  background: #eee;
}
</style>

<table class="zebra"> 
<tbody> 
<tr> 
    <td>Full Name :</td> 
    <td><?php echo $donation_fullname?></td> 
</tr> 
<tr> 
    <td>Email :</td> 
    <td><?php echo $donation_email?></td> 
</tr> 
<tr> 
    <td>Address :</td> 
    <td><?php echo $donation_address?></td> 
</tr> 
<tr> 
    <td>Phone No :</td> 
    <td><?php echo $donation_phoneno?></td> 
</tr> 
<tr> 
    <td>Donate Amount :</td> 
    <td><?php echo $donation_amount?></td> 
</tr> 
<tr> 
    <td>Donate Amount In Word:</td> 
    <td><?php echo $donation_amountinword?></td> 
</tr> 
<tr> 
    <td>Voucher No :</td> 
    <td><?php echo $donation_voucherno?></td> 
</tr> 
<tr> 
    <td>Bank Name : </td> 
    <td><?php echo $donation_bankname?></td> 
</tr> 
</tbody> 
</table> 