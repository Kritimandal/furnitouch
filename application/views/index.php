<?php $this->load->view('include/head.php'); ?>
<body class="noJS" id="top">

  <!-- This script will overwrite default select box -->
  <script>
  var bodyTag = document.getElementsByTagName("body")[0];
  bodyTag.className = bodyTag.className.replace("noJS", "hasJS");
  </script>  

  <?php $this->load->view('include/header.php'); ?>
    
    <div class="popUpWrapper" style="width:960px;margin:0px auto;" >
        <?php $queryJob = $this->db->query("SELECT * FROM client");
          foreach($queryJob->result() as $row){ ?>
          <div class="popup" id="pop<?=$row->Id?>">
            <img class="close" src="<?=base_url('paradise/images/close.png')?>" />
            <h2>TurnKey General Contractors</h2>
            <img src="<?=base_url('file/c_logo/company2.png')?>" style="height: 115px;position: absolute;right: 60px;"><br/>
            <br/><strong>Job detail</strong>
            <br/><br/> 
            <p>
              Here is the . You can post your resume to get an opportunity to work in different countries.
            </p>
            <p>
              Company:  Saudi Pankingdom (SAPAC)<br/>
              Country:  Saudi Arabia<br/>
              Job Title:  Construction Labour<br/>
              Gender: male<br/>
              Age:   yrs<br/>
              Quantity: 70<br/>
              Salary: 600 SR<br/>
              Job Description: <br/> 
              Construction Labour<br/>
              Interview Start Date: 0000-00-00<br/>
              Interview End Date: 0000-00-00<br/>
              Interview Time: 
            </p>
            <input type="button" value="Apply" style="background: blue;color: #fff;font-size: 12px;padding: 5px 30px;position: absolute;
      right: 30px;bottom: 30px;cursor:pointer" id="apply"/>
          </div>
        <?php } ?>

    </div>



  <div class="main-wrapper">
    <div class="big-slider-wrapper">
    <ul class="big-slider">
      <!-- 1st slider -->
      <li class="big-slider-0">
        <div class="screen-wrapper">
          <img src="<?=base_url('paradise')?>/images/slider0.png">
          <div class="image-info">
            <h1>Nepal: A reliable source of manpower for the rest of the world</h1>
            <p>
              Nepalese are honest, hardworking & strong inherently. They cope with change in no time, are trustworthy on the assigned duties.            
            </p>
            <a class="slider-btn" href="<?=base_url('page').'/index/22'?>">read more <span>»</span></a>
          </div>
        </div>
      </li> 
      <!-- 2nd slider -->
       <li class="big-slider-2">
        <div class="screen-wrapper">
          <img src="<?=base_url('paradise')?>/images/slider2.png">
          <div class="image-info">
            <h1>Significantly Different</h1>
            <p>"Some dream of great accomplishments, while others stay awake and do them."</p>           
          </div>
        </div>
      </li>
      <!-- 3rd slider -->
      <li class="big-slider-1">
        <div class="screen-wrapper">
          <img src="<?=base_url('paradise')?>/images/slider1.png">
          <div class="image-info">
            <h1>With us, your dream will be true</h1>
            <p>
              "Some dream of great accomplishments, while others stay awake and do them."
            </p>
          </div>
        </div>
      </li> 
     <!-- 4th slider -->
      <li class="big-slider-3">
        <div class="screen-wrapper">
          <img src="<?=base_url('paradise')?>/images/slider3.png">
          <div class="image-info">
            <h1>With us, your dream will be true</h1> 
            <p>"Some dream of great accomplishments, while others stay awake and do them."</p>          
          </div>
        </div>
      </li>
      <li class="big-slider-4">
        <div class="screen-wrapper">
          <img src="<?=base_url('paradise')?>/images/slider4.png">
          <div class="image-info">
            <h1>Management Team</h1>
            <p>Our team possess co-operation, commitment, enthusiasm, focused in the according field due to which we’ve been succeeding on providing the best overseas recruitment services throughout the tough competitions.</p>        
          </div>
        </div>
      </li>   
    </ul>    
  </div>
<!-- end of big slider -->



    
    <div class="box-wrapper">
      <div class="screen-wrapper">
        <div class="home-box-1">        
          <?php $welcomeQuery = $this->db->query("SELECT *  FROM content WHERE heading = 'Welcome to Paradise'");
          foreach($welcomeQuery->result() as $rowWelcome){ ?>
              <strong><?=$rowWelcome->heading?></strong>
              <?=wordwrap($rowWelcome->description,100)?>
              <a href="<?=base_url('page/index').'/'.$rowWelcome->category?>" class="btn more-btn">See More</a>
          <?php } ?>
      </div>
      <div class="home-box-2">
        <h4>Our Partners</h4>
        <div class="client-slider-wrapper">
          <ul class="client-slider">
            <li>
              <a href="#"><img src="<?=base_url('paradise/images/logo-2.png')?>"></a>
              <div class="hiddenButtons">
                <a href="#"><span>Nepal</span>Marron Int'l Travels (P.) Ltd.</a>  
              </div>
            </li>

            <li>
              <a href="#"><img src="<?=base_url('paradise/images/logo-1.png')?>"></a>
              <div class="hiddenButtons">
                <a href="#"><span>Nepal</span>Paradise Polyclinic & Pathology Lab</a>   
              </div>
            </li>
            
            <li>
              <a href="#"><img src="<?=base_url('paradise/images/logo-3.png')?>"></a>
              <div class="hiddenButtons">
                <a href="#"><span>Nepal</span>Jai Guru Karya Vinayak Housing</a>   
              </div>
            </li>
          </ul>
        </div>
      </div>
    </div>
    </div> <!-- end of home box wrapper -->


  
   
<!-- start of slider job -->
<div class="slider-2">
  <div class="screen-wrapper">
    <div class="slider-2-header">
      <h2><span class="icon-job"></span>Available Jobs</h2>
      <!-- <div class="select-box">
        <label>Sort by</label>
        <select name="option-select" class="custom">
          <option value="">Company</option>
          <option value="1">Job</option>         
        </select>
      </div> -->
    </div>
    <div class="job-slider-wrapper">
      <ul class="job-slider">
       <?php $queryJob = $this->db->query("SELECT * FROM client");
        foreach($queryJob->result() as $rowJob){
          $countryCode = $rowJob->country;
          $countryQuery = $this->db->query("SELECT * FROM country WHERE Id='$countryCode'");
          foreach($countryQuery->result() as $rowCountry){
            $country = $rowCountry->name;
          }
          ?>
          <li>
            <a class="hidden-box" href="javascript:void(0)">
              <h5><?=$country?></h5>
              <p><?=$rowJob->name?></p>
              <span class="viewDetails" data='<?=$rowJob->Id?>'>View Details »</span>
            </a>


      

            <div class="image-box">
              <img src="<?=base_url('file/c_logo')?>/<?=$rowJob->c_logo?>">
            </div>
            <div class="box-content">
              <h3><?=$rowJob->name?></h3> 
            </div>             
          </li>
        <?php
          }
        ?>

        
</ul>
</div>

</div>
</div><!-- end of slider job -->


  <?php $this->load->view('include/subFooter'); ?>

  </div><!-- end of main wrapper -->

<?php $this->load->view('include/footer.php'); ?>
</body>
</html>