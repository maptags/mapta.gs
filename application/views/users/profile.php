<?php print_header(); 

  if(isset($profile_data)){
    foreach ($profile_data as $profile) {
      $email = $profile->email;
      $fname = $profile->fname;
      $lname = $profile->lname;
      $gender = $profile->gender;
      $country = $profile->country;
      
    }
  }
?>
      <div style="margin-bottom: 45px;" >

        <form id="registerform" enctype="multipart/form-data" class="form-horizontal" method="post" action="<?php echo site_url('user/update_profile') ?>">
        <fieldset>

        <div class="row">
          <div class="col-md-6 col-md-offset-3">
          <?php
                if( validation_errors() ){
                  echo '<div class="alert alert-danger">'.validation_errors( ).'</div>';
                }
        ?>
        
        <?php if ($this->session->flashdata('result') != ''){?>
            <div class="alert alert-success" style="position:static; ">
                <?php echo $this->session->flashdata('result');?> 
            </div>
        <?php } ?>
       
      <?php if ($this->session->flashdata('recaptcha') != ''){?>
            <div class="alert alert-danger" style="position:static; ">
                <?php echo $this->session->flashdata('recaptcha');?> 
            </div>
        <?php } ?>
            <h4>Update Profile<hr></h4>
          </div>
        </div>
        <div class="form-group">
          <label class="col-md-4 control-label" for="email">E-mail</label>
          <div class="col-md-4">
            <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
              <input id="email" name="email" class="form-control" value="<?php echo $email; ?>" placeholder="user@example.com"  type="text" data-original-title="" title="">
            </div>
            
          </div>
        </div>
        <?php if (!$this->session->userdata('logged')=='social'): ?>
        <div class="form-group">
          <label class="col-md-4 control-label" for="pwd">Password</label>
          <div class="col-md-4">
            <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-key"></i></span>
              <input id="pwd" name="pwd" class="form-control" placeholder=""  type="password" data-original-title="" title=""> 
            </div>            
          </div>
        </div>
    <?php endif; ?>
        <div class="row">
          <div class="col-md-6 col-md-offset-3">
            <h4>Personal Details<hr></h4>
          </div>
        </div>

        <!-- Text input-->
        <div class="form-group">
          <label class="col-md-4 control-label" for="fname">First Name</label>  
          <div class="col-md-4">
          <input id="fname" name="fname" placeholder="" value="<?php echo $fname; ?>" class="form-control input-md"  type="text">
              <input id="refer_id" name="refer_id" placeholder="" class="form-control input-md" type="hidden" value="">
          </div>
        </div>

        <!-- Text input-->
        <div class="form-group">
          <label class="col-md-4 control-label" for="lname">Last Name</label>  
          <div class="col-md-4">
          <input id="lname" name="lname" placeholder="" value="<?php echo $lname; ?>" class="form-control input-md"  type="text">
            
          </div>
        </div>

        <!-- Multiple Radios (inline) -->
        <div class="form-group">
          <label class="col-md-4 control-label" for="gender">Gender</label>
          <div class="col-md-4"> 
            <label class="radio-inline" for="gender-0">
              <input name="gender" id="gender-0" value="Male" <?php if($gender =='Male'): ?> checked="checked" <?php endif; ?> type="radio">
              Male
            </label> 
            <label class="radio-inline" for="gender-1">
              <input name="gender" id="gender-1" <?php if($gender =='Female'): ?> checked="checked" 
            <?php endif; ?> value="Female" type="radio">
              Female
            </label>
          </div>
        </div>
        <?php if (!$this->session->userdata('logged')=='social'): ?>
        <div class="form-group">
          <label class="col-md-4 control-label" for="userfile">profile Picture</label>
          <div class="col-md-4"> 
                 <input id="userfile" name="userfile" class="form-control input-md"  type="file">       
          </div>
        </div>
        <?php endif; ?>
        <!-- Select Basic -->
        <div class="form-group">
          <label class="col-md-4 control-label" for="country">Country</label>
          <div class="col-md-4">
            <select id="country" name="country" class="form-control">
                        <?php
                        $countryrray = array(
                            'India'
                            , 'Afghanistan'
                            , 'Åland Islands'
                            , 'Albania'
                            , 'Algeria'
                            , 'American Samoa'
                            , 'AndorrA'
                            , 'Angola'
                            , 'Anguilla'
                            , 'Antarctica'
                            , 'Antigua and Barbuda'
                            , 'Argentina'
                            , 'Armenia'
                            , 'Aruba'
                            , 'Australia'
                            , 'Austria'
                            , 'Azerbaijan'
                            , 'Bahamas'
                            , 'Bahrain'
                            , 'Bangladesh'
                            , 'Barbados'
                            , 'Belarus'
                            , 'Belgium'
                            , 'Belize'
                            , 'Benin'
                            , 'Bermuda'
                            , 'Bhutan'
                            , 'Bolivia'
                            , 'Bosnia and Herzegovina'
                            , 'Botswana'
                            , 'Bouvet Island'
                            , 'Brazil'
                            , 'British Indian Ocean Territory'
                            , 'Brunei Darussalam'
                            , 'Bulgaria'
                            , 'Burkina Faso'
                            , 'Burundi'
                            , 'Cambodia'
                            , 'Cameroon'
                            , 'Canada'
                            , 'Cape Verde'
                            , 'Cayman Islands'
                            , 'Central African Republic'
                            , 'Chad'
                            , 'Chile'
                            , 'China'
                            , 'Christmas Island'
                            , 'Cocos (Keeling) Islands'
                            , 'Colombia'
                            , 'Comoros'
                            , 'Congo'
                            , 'Congo, Democratic Republic'
                            , 'Cook Islands'
                            , 'Costa Rica'
                            , 'Croatia'
                            , 'Cuba'
                            , 'Cyprus'
                            , 'Czech Republic'
                            , 'Denmark'
                            , 'Djibouti'
                            , 'Dominica'
                            , 'Dominican Republic'
                            , 'Ecuador'
                            , 'Egypt'
                            , 'El Salvador'
                            , 'Equatorial Guinea'
                            , 'Eritrea'
                            , 'Estonia'
                            , 'Ethiopia'
                            , 'Falkland Islands (Malvinas)'
                            , 'Faroe Islands'
                            , 'Fiji'
                            , 'Finland'
                            , 'France'
                            , 'French Guiana'
                            , 'French Polynesia'
                            , 'French Southern Territories'
                            , 'Gabon'
                            , 'Gambia'
                            , 'Georgia'
                            , 'Germany'
                            , 'Ghana'
                            , 'Gibraltar'
                            , 'Greece'
                            , 'Greenland'
                            , 'Grenada'
                            , 'Guadeloupe'
                            , 'Guam'
                            , 'Guatemala'
                            , 'Guernsey'
                            , 'Guinea'
                            , 'Guinea-Bissau'
                            , 'Guyana'
                            , 'Haiti'
                            , 'Heard Island and Mcdonald Islands'
                            , 'Holy See (Vatican City State)'
                            , 'Honduras'
                            , 'Hong Kong'
                            , 'Hungary'
                            , 'Iceland'
                            , 'Indonesia'
                            , 'Iran'
                            , 'Iraq'
                            , 'Ireland'
                            , 'Isle of Man'
                            , 'Israel'
                            , 'Italy'
                            , 'Jamaica'
                            , 'Japan'
                            , 'Jersey'
                            , 'Jordan'
                            , 'Kazakhstan'
                            , 'Kenya'
                            , 'Kiribati'
                            , 'Korea (North)'
                            , 'Korea (South)'
                            , 'Kosovo'
                            , 'Kuwait'
                            , 'Kyrgyzstan'
                            , 'Laos'
                            , 'Latvia'
                            , 'Lebanon'
                            , 'Lesotho'
                            , 'Liberia'
                            , 'Libyan Arab Jamahiriya'
                            , 'Liechtenstein'
                            , 'Lithuania'
                            , 'Luxembourg'
                            , 'Macao'
                            , 'Macedonia'
                            , 'Madagascar'
                            , 'Malawi'
                            , 'Malaysia'
                            , 'Maldives'
                            , 'Mali'
                            , 'Malta'
                            , 'Marshall Islands'
                            , 'Martinique'
                            , 'Mauritania'
                            , 'Mauritius'
                            , 'Mayotte'
                            , 'Mexico'
                            , 'Micronesia'
                            , 'Moldova'
                            , 'Monaco'
                            , 'Mongolia'
                            , 'Montserrat'
                            , 'Morocco'
                            , 'Mozambique'
                            , 'Myanmar'
                            , 'Namibia'
                            , 'Nauru'
                            , 'Nepal'
                            , 'Netherlands'
                            , 'Netherlands Antilles'
                            , 'New Caledonia'
                            , 'New Zealand'
                            , 'Nicaragua'
                            , 'Niger'
                            , 'Nigeria'
                            , 'Niue'
                            , 'Norfolk Island'
                            , 'Northern Mariana Islands'
                            , 'Norway'
                            , 'Oman'
                            , 'Pakistan'
                            , 'Palau'
                            , 'Palestinian Territory, Occupied'
                            , 'Panama'
                            , 'Papua New Guinea'
                            , 'Paraguay'
                            , 'Peru'
                            , 'Philippines'
                            , 'Pitcairn'
                            , 'Poland'
                            , 'Portugal'
                            , 'Puerto Rico'
                            , 'Qatar'
                            , 'Reunion'
                            , 'Romania'
                            , 'Russian Federation'
                            , 'RWANDA'
                            , 'Saint Helena'
                            , 'Saint Kitts and Nevis'
                            , 'Saint Lucia'
                            , 'Saint Pierre and Miquelon'
                            , 'Saint Vincent and the Grenadines'
                            , 'Samoa'
                            , 'San Marino'
                            , 'Sao Tome and Principe'
                            , 'Saudi Arabia'
                            , 'Senega'
                            , 'Serbia'
                            , 'Montenegro'
                            , 'Seychelles'
                            , 'Sierra Leone'
                            , 'Singapore'
                            , 'Slovakia'
                            , 'Slovenia'
                            , 'Solomon Islands'
                            , 'Somalia'
                            , 'South Africa'
                            , 'South Georgia and the South Sandwich Islands'
                            , 'Spain'
                            , 'Sri Lanka'
                            , 'Sudan'
                            , 'Suriname'
                            , 'Svalbard and Jan Mayen'
                            , 'Swaziland'
                            , 'Sweden'
                            , 'Switzerland'
                            , 'Syrian Arab Republic'
                            , 'Taiwan, Province of China'
                            , 'Tajikistan'
                            , 'Tanzania'
                            , 'Thailand'
                            , 'Timor-Leste'
                            , 'Togo'
                            , 'Tokelau'
                            , 'Tonga'
                            , 'Trinidad and Tobago'
                            , 'Tunisia'
                            , 'Turkey'
                            , 'Turkmenistan'
                            , 'Turks and Caicos Islands'
                            , 'Tuvalu'
                            , 'Uganda'
                            , 'Ukraine'
                            , 'United Arab Emirates'
                            , 'United Kingdom'
                            , 'United States'
                            , 'United States Minor Outlying Islands'
                            , 'Uruguay'
                            , 'Uzbekistan'
                            , 'Vanuatu'
                            , 'Venezuela'
                            , 'Viet Nam'
                            , 'Virgin Islands, British'
                            , 'Virgin Islands, U.S.'
                            , 'Wallis and Futuna'
                            , 'Western Sahara'
                            , 'Yemen'
                            , 'Zambia'
                            , 'Zimbabwe'
                        );
                        
                        foreach ($countryrray as $value) {
                            if ($value==$country){
                                echo "<option selected='true' value='$value'>$value</option>";
                            }else{
                                 echo "<option value='$value'>$value</option>";
                            }
                        }
                        ?>
                    </select>
          </div>
        </div>
        <div class="form-group">
          <label class="col-md-4 control-label" for="lname">Captcha</label>  
          <div class="col-md-4">
          <?php echo $recaptcha_html; ?>
            
          </div>
        </div>

        <!-- Button (Double) -->
        <div class="form-group">
            <label class="col-md-4 control-label" for="submit"></label>
            <div class="col-md-4">
               <!-- <input name="savelogin" id="savelogin-0" value="" type="checkbox"> Remember Me  -->
               <div class="pull-right">
                 <button type="reset" class="btn btn-default"><i class="fa fa-eraser"></i> Clear</button>
                 <input id="update_profile" type="submit" name="update_profile" value="update profile" class="btn btn-success">
               </div>
               
            </div>
        </div>

        </fieldset>
  </form>
      </div><!-- End book -->
<?php print_footer(); ?>