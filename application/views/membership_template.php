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
    <td><?php echo $membership_fullname?></td> 
</tr> 
<tr> 
    <td>Email :</td> 
    <td><?php echo $membership_email?></td> 
</tr> 
<tr> 
    <td>Permanent Address :</td> 
    <td><?php echo $membership_address?></td> 
</tr> 
<tr> 
    <td>Zone :</td> 
    <td><?php echo $membership_zone?></td> 
</tr> 
<tr> 
    <td>District :</td> 
    <td><?php echo $membership_district?></td> 
</tr> 
<tr> 
    <td>VDC/Municipality:</td> 
    <td><?php echo $membership_VDCMunicipality?></td> 
</tr> 
<tr> 
    <td>Date of Birth :</td> 
    <td><?php echo $membership_dateofbirth?></td> 
</tr> 
<tr> 
    <td>Citizen No : </td> 
    <td><?php echo $membership_citizenshipno?></td> 
</tr>

<tr> 
    <td>Issue From : </td> 
    <td><?php echo $membership_issuefrom?></td> 
</tr>

<tr> 
    <td>Contact : </td> 
    <td><?php echo $membership_contact?></td> 
</tr>

</tbody> 
</table> 