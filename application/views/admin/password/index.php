 <?php $this->load->view('admin/include/header'); ?>
 <div class="cont">
        	<!---left_panel-->
 <?php $this->load->view('admin/include/left'); ?>
            <!---left_panel-->
            
            
            

            <!--right_panel-->
            <div class="left_panel" style="float: left;width: 760px;margin-left:8px;height:305px;">
                    <h1 class="title">Manage Password</h1>
                    
                    
                    <h3><?=@$error_match?> <?=@$this->session->flashdata('sucess')?></h3>
                    
                    <table>
        <?php echo form_open_multipart('password_manage/update_login') ; ?>
        <tr>
        <td width="100">
       Username
         </td>
        <td><strong><?=$this->session->userdata('UserEmail')?></strong></td>
        </tr>
         <tr>
        <td width="100">
       New Password
         </td>
        <td><input type="password" name="new_pass" style="width:300px;" /><?=@$error_new?></td>
        </tr>
        
        
         <tr>
        <td width="100">
        Confirm Password
         </td>
        <td><input type="password" name="con_pass" style="width:300px;" /><?=@$error_con?></td>
        </tr>
        
        
        
        <tr>
        
        <td>
        </td>
        <td>
        <input type="submit" value="submit"name="submit">
        </td>
        </tr>
        </form>
        
       </table>
                    
                    
                    
                    
                    
                    
                    
            </div>
            <!--right_panel-->
            
            
            
            
            
        	<div class="clear"></div>
 </div>
        
        
        <!--footer-->
<?php $this->load->view('admin/include/footer'); ?>
         <!--footer-->   
          
            
</body>

</html>