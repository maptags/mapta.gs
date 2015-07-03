<?php print_header(); ?>
<script src='https://www.google.com/recaptcha/api.js'></script>

<meta name="alexaVerifyID" content="5H1TzN9QZFKXWbDKifmVj_63G6c"/>

 <meta name="description" content=" Maptags is the worlds easiest Address sharing platform, Maptags shortens your address to your favourite word so sharing your address is easy as sharing a word which takes away the pain of writing address forever. Maptags is integrated to Google Maps hence providing seamless driving directions which ensures you never lose your way, its time to register ">
        <meta name="keywords" content="address , address label , address search , Maptags, Maptag, address revolution , directions ,ecommerce , ecommerce sites , world map , zip codes">

    <title>Maptags- Imagine Never writing your address again - Sign up Now</title>



<script type="text/javascript">
  $(function() {
      var strPassword;
  var charPassword;
  var complexity = $("#complexity");
  var minPasswordLength = 8;
  var baseScore = 0, score = 0;
  
  var num = {};
  num.Excess = 0;
  num.Upper = 0;
  num.Numbers = 0;
  num.Symbols = 0;

  var bonus = {};
  bonus.Excess = 3;
  bonus.Upper = 4;
  bonus.Numbers = 5;
  bonus.Symbols = 5;
  bonus.Combo = 0; 
  bonus.FlatLower = 0;
  bonus.FlatNumber = 0;
  
  outputResult();
  $("#pwd").bind("keyup", checkVal);

function checkVal()
{
  init();
  
  if (charPassword.length >= minPasswordLength)
  {
    baseScore = 50; 
    analyzeString();  
    calcComplexity();   
  }
  else
  {
    baseScore = 0;
  }
  
  outputResult();
}

function init()
{
  strPassword= $("#pwd").val();
  charPassword = strPassword.split("");
    
  num.Excess = 0;
  num.Upper = 0;
  num.Numbers = 0;
  num.Symbols = 0;
  bonus.Combo = 0; 
  bonus.FlatLower = 0;
  bonus.FlatNumber = 0;
  baseScore = 0;
  score =0;
}

function analyzeString ()
{ 
  for (i=0; i<charPassword.length;i++)
  {
    if (charPassword[i].match(/[A-Z]/g)) {num.Upper++;}
    if (charPassword[i].match(/[0-9]/g)) {num.Numbers++;}
    if (charPassword[i].match(/(.*[!,@,#,$,%,^,&,*,?,_,~])/)) {num.Symbols++;} 
  }
  
  num.Excess = charPassword.length - minPasswordLength;
  
  if (num.Upper && num.Numbers && num.Symbols)
  {
    bonus.Combo = 25; 
  }

  else if ((num.Upper && num.Numbers) || (num.Upper && num.Symbols) || (num.Numbers && num.Symbols))
  {
    bonus.Combo = 15; 
  }
  
  if (strPassword.match(/^[\sa-z]+$/))
  { 
    bonus.FlatLower = -15;
  }
  
  if (strPassword.match(/^[\s0-9]+$/))
  { 
    bonus.FlatNumber = -35;
  }
}
  
function calcComplexity()
{
  score = baseScore + (num.Excess*bonus.Excess) + (num.Upper*bonus.Upper) + (num.Numbers*bonus.Numbers) + (num.Symbols*bonus.Symbols) + bonus.Combo + bonus.FlatLower + bonus.FlatNumber;
  
} 
  
function outputResult()
{
  if ($("#pwd").val()== "")
  { 
    complexity.html("Enter a random value").removeClass("weak strong stronger strongest").addClass("default");
  }
  else if (charPassword.length < minPasswordLength)
  {
    complexity.html("At least " + minPasswordLength+ " characters please!").removeClass("strong stronger strongest").addClass("weak");
  }
  else if (score<50)
  {
    complexity.html("Weak!").removeClass("strong stronger strongest").addClass("weak");
  }
  else if (score>=50 && score<75)
  {
    complexity.html("Average!").removeClass("stronger strongest").addClass("strong");
  }
  else if (score>=75 && score<100)
  {
    complexity.html("Strong!").removeClass("strongest").addClass("stronger");
  }
  else if (score>=100)
  {
    complexity.html("Secure!").addClass("strongest");
  }
    
}

    });
</script>
      <div class="space-upper">

        <form id="registerform" class="form-horizontal" method="post" action="<?php echo site_url('user/register') ?>">
        <fieldset>

        <div class="row">
          <div class="col-md-6 col-md-offset-3">
          <?php
                if( validation_errors() ){
                  echo '<div class="alert alert-danger">'.validation_errors( ).'</div>';
                }
        ?>
        
        <?php if ($this->session->flashdata('register') != ''){?>
            <div class="alert alert-success" style="position:static; ">
                <?php echo $this->session->flashdata('register');?> 
            </div>
        <?php } ?>
        <?php if ($this->session->flashdata('result-1') != ''){ ?>
            <div class="alert alert-danger" style="position:static; ">
                <?php echo $this->session->flashdata('result-1');?> 
            </div>
        <?php } ?>
        <?php if ($this->session->flashdata('register-er') != ''){?>
            <div class="alert alert-danger" style="position:static; ">
                <?php echo $this->session->flashdata('register-er');?> 
            </div>
        <?php } ?>
      <?php if ($this->session->flashdata('recaptcha') != ''){?>
            <div class="alert alert-danger" style="position:static; ">
                <?php echo $this->session->flashdata('recaptcha');?> 
            </div>
        <?php } ?>
            <h4>Login Details<hr></h4>
          </div>
        </div>
        <div class="form-group">
          <label class="col-md-4 control-label" for="email">E-mail</label>
          <div class="col-md-4">
            <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
              <input id="email" name="email" class="form-control" value="<?php echo set_value('email') ?>" placeholder="user@example.com"  type="text">
            </div>
            
          </div>
        </div>
        <div class="form-group">
          <label class="col-md-4 control-label" for="pwd">Password</label>
          <div class="col-md-4">
            <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-key"></i></span>
              <input id="pwd" name="pwd" class="form-control" placeholder=""  type="password"> 

            </div>
            <div id="complexity" class="default"></div>
          </div>
        </div>

        <!-- Prepended text-->
        <div class="form-group">
          <label class="col-md-4 control-label" for="vpwd">Verify Password</label>
          <div class="col-md-4">
            <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-key"></i></span>
              <input id="vpwd" name="vpwd" class="form-control" placeholder=""  type="password">
            </div>
            
          </div>
        </div>

        <div class="row">
          <div class="col-md-6 col-md-offset-3">
            <h4>Personal Details<hr></h4>
          </div>
        </div>

        <!-- Text input-->
        <div class="form-group">
          <label class="col-md-4 control-label" for="fname">First Name</label>  
          <div class="col-md-4">
          <input id="fname" name="fname" placeholder="" value="<?php echo set_value('fname') ?>" class="form-control input-md"  type="text">
              <input id="refer_id" name="refer_id" placeholder="" class="form-control input-md" type="hidden" value="">
          </div>
        </div>

        <!-- Text input-->
        <div class="form-group">
          <label class="col-md-4 control-label" for="lname">Last Name</label>  
          <div class="col-md-4">
          <input id="lname" name="lname" placeholder="" value="<?php echo set_value('lname') ?>" class="form-control input-md"  type="text">
            
          </div>
        </div>

        <!-- Multiple Radios (inline) -->
        <div class="form-group">
          <label class="col-md-4 control-label" for="gender">Gender</label>
          <div class="col-md-4"> 
            <label class="radio-inline" for="gender-0">
              <input name="gender" id="gender-0" value="Male" checked="checked" type="radio">
              Male
            </label> 
            <label class="radio-inline" for="gender-1">
              <input name="gender" id="gender-1" value="Female" type="radio">
              Female
            </label>
          </div>
        </div>






        <!-- Select Basic -->
        <div class="form-group">
          <label class="col-md-4 control-label" for="country">Country</label>
          <div class="col-md-4">
            <select id="country" name="country" class="form-control">
              <option value="India">India</option>
              <option value="Afghanistan">Afghanistan</option>
                <option value="Åland Islands">Åland Islands</option>
                <option value="Albania">Albania</option>
                <option value="Algeria">Algeria</option>
                <option value="American Samoa">American Samoa</option>
                <option value="AndorrA">AndorrA</option>
                <option value="Angola">Angola</option>
                <option value="Anguilla">Anguilla</option>
                <option value="Antarctica">Antarctica</option>
                <option value="Antigua and Barbuda">Antigua and Barbuda</option>
                <option value="Argentina">Argentina</option>
                <option value="Armenia">Armenia</option>
                <option value="Aruba">Aruba</option>
                <option value="Australia">Australia</option>
                <option value="Austria">Austria</option>
                <option value="Azerbaijan">Azerbaijan</option>
                <option value="Bahamas">Bahamas</option>
                <option value="Bahrain">Bahrain</option>
                <option value="Bangladesh">Bangladesh</option>
                <option value="Barbados">Barbados</option>
                <option value="Belarus">Belarus</option>
                <option value="Belgium">Belgium</option>
                <option value="Belize">Belize</option>
                <option value="Benin">Benin</option>
                <option value="Bermuda">Bermuda</option>
                <option value="Bhutan">Bhutan</option>
                <option value="Bolivia">Bolivia</option>
                <option value="Bosnia and Herzegovina">Bosnia and Herzegovina</option>
                <option value="Botswana">Botswana</option>
                <option value="Bouvet Island">Bouvet Island</option>
                <option value="Brazil">Brazil</option>
                <option value="British Indian Ocean Territory">British Indian Ocean Territory</option>
                <option value="Brunei Darussalam">Brunei Darussalam</option>
                <option value="Bulgaria">Bulgaria</option>
                <option value="Burkina Faso">Burkina Faso</option>
                <option value="Burundi">Burundi</option>
                <option value="Cambodia">Cambodia</option>
                <option value="Cameroon">Cameroon</option>
                <option value="Canada">Canada</option>
                <option value="Cape Verde">Cape Verde</option>
                <option value="Cayman Islands">Cayman Islands</option>
                <option value="Central African Republic">Central African Republic</option>
                <option value="Chad">Chad</option>
                <option value="Chile">Chile</option>
                <option value="China">China</option>
                <option value="Christmas Island">Christmas Island</option>
                <option value="Cocos (Keeling) Islands">Cocos (Keeling) Islands</option>
                <option value="Colombia">Colombia</option>
                <option value="Comoros">Comoros</option>
                <option value="Congo">Congo</option>
                <option value="Congo, Democratic Republic">Congo, Democratic Republic</option>
                <option value="Cook Islands">Cook Islands</option>
                <option value="Costa Rica">Costa Rica</option>
                <option value="Cote D" ivoire"="">Cote D"Ivoire</option>
                <option value="Croatia">Croatia</option>
                <option value="Cuba">Cuba</option>
                <option value="Cyprus">Cyprus</option>
                <option value="Czech Republic">Czech Republic</option>
                <option value="Denmark">Denmark</option>
                <option value="Djibouti">Djibouti</option>
                <option value="Dominica">Dominica</option>
                <option value="Dominican Republic">Dominican Republic</option>
                <option value="Ecuador">Ecuador</option>
                <option value="Egypt">Egypt</option>
                <option value="El Salvador">El Salvador</option>
                <option value="Equatorial Guinea">Equatorial Guinea</option>
                <option value="Eritrea">Eritrea</option>
                <option value="Estonia">Estonia</option>
                <option value="Ethiopia">Ethiopia</option>
                <option value="Falkland Islands (Malvinas)">Falkland Islands (Malvinas)</option>
                <option value="Faroe Islands">Faroe Islands</option>
                <option value="Fiji">Fiji</option>
                <option value="Finland">Finland</option>
                <option value="France">France</option>
                <option value="French Guiana">French Guiana</option>
                <option value="French Polynesia">French Polynesia</option>
                <option value="French Southern Territories">French Southern Territories</option>
                <option value="Gabon">Gabon</option>
                <option value="Gambia">Gambia</option>
                <option value="Georgia">Georgia</option>
                <option value="Germany">Germany</option>
                <option value="Ghana">Ghana</option>
                <option value="Gibraltar">Gibraltar</option>
                <option value="Greece">Greece</option>
                <option value="Greenland">Greenland</option>
                <option value="Grenada">Grenada</option>
                <option value="Guadeloupe">Guadeloupe</option>
                <option value="Guam">Guam</option>
                <option value="Guatemala">Guatemala</option>
                <option value="Guernsey">Guernsey</option>
                <option value="Guinea">Guinea</option>
                <option value="Guinea-Bissau">Guinea-Bissau</option>
                <option value="Guyana">Guyana</option>
                <option value="Haiti">Haiti</option>
                <option value="Heard Island and Mcdonald Islands">Heard Island and Mcdonald Islands</option>
                <option value="Holy See (Vatican City State)">Holy See (Vatican City State)</option>
                <option value="Honduras">Honduras</option>
                <option value="Hong Kong">Hong Kong</option>
                <option value="Hungary">Hungary</option>
                <option value="Iceland">Iceland</option>
                <option value="Indonesia">Indonesia</option>
                <option value="Iran">Iran</option>
                <option value="Iraq">Iraq</option>
                <option value="Ireland">Ireland</option>
                <option value="Isle of Man">Isle of Man</option>
                <option value="Israel">Israel</option>
                <option value="Italy">Italy</option>
                <option value="Jamaica">Jamaica</option>
                <option value="Japan">Japan</option>
                <option value="Jersey">Jersey</option>
                <option value="Jordan">Jordan</option>
                <option value="Kazakhstan">Kazakhstan</option>
                <option value="Kenya">Kenya</option>
                <option value="Kiribati">Kiribati</option>
                <option value="Korea (North)">Korea (North)</option>
                <option value="Korea (South)">Korea (South)</option>
                <option value="Kosovo">Kosovo</option>
                <option value="Kuwait">Kuwait</option>
                <option value="Kyrgyzstan">Kyrgyzstan</option>
                <option value="Laos">Laos</option>
                <option value="Latvia">Latvia</option>
                <option value="Lebanon">Lebanon</option>
                <option value="Lesotho">Lesotho</option>
                <option value="Liberia">Liberia</option>
                <option value="Libyan Arab Jamahiriya">Libyan Arab Jamahiriya</option>
                <option value="Liechtenstein">Liechtenstein</option>
                <option value="Lithuania">Lithuania</option>
                <option value="Luxembourg">Luxembourg</option>
                <option value="Macao">Macao</option>
                <option value="Macedonia">Macedonia</option>
                <option value="Madagascar">Madagascar</option>
                <option value="Malawi">Malawi</option>
                <option value="Malaysia">Malaysia</option>
                <option value="Maldives">Maldives</option>
                <option value="Mali">Mali</option>
                <option value="Malta">Malta</option>
                <option value="Marshall Islands">Marshall Islands</option>
                <option value="Martinique">Martinique</option>
                <option value="Mauritania">Mauritania</option>
                <option value="Mauritius">Mauritius</option>
                <option value="Mayotte">Mayotte</option>
                <option value="Mexico">Mexico</option>
                <option value="Micronesia">Micronesia</option>
                <option value="Moldova">Moldova</option>
                <option value="Monaco">Monaco</option>
                <option value="Mongolia">Mongolia</option>
                <option value="Montserrat">Montserrat</option>
                <option value="Morocco">Morocco</option>
                <option value="Mozambique">Mozambique</option>
                <option value="Myanmar">Myanmar</option>
                <option value="Namibia">Namibia</option>
                <option value="Nauru">Nauru</option>
                <option value="Nepal">Nepal</option>
                <option value="Netherlands">Netherlands</option>
                <option value="Netherlands Antilles">Netherlands Antilles</option>
                <option value="New Caledonia">New Caledonia</option>
                <option value="New Zealand">New Zealand</option>
                <option value="Nicaragua">Nicaragua</option>
                <option value="Niger">Niger</option>
                <option value="Nigeria">Nigeria</option>
                <option value="Niue">Niue</option>
                <option value="Norfolk Island">Norfolk Island</option>
                <option value="Northern Mariana Islands">Northern Mariana Islands</option>
                <option value="Norway">Norway</option>
                <option value="Oman">Oman</option>
                <option value="Pakistan">Pakistan</option>
                <option value="Palau">Palau</option>
                <option value="Palestinian Territory, Occupied">Palestinian Territory, Occupied</option>
                <option value="Panama">Panama</option>
                <option value="Papua New Guinea">Papua New Guinea</option>
                <option value="Paraguay">Paraguay</option>
                <option value="Peru">Peru</option>
                <option value="Philippines">Philippines</option>
                <option value="Pitcairn">Pitcairn</option>
                <option value="Poland">Poland</option>
                <option value="Portugal">Portugal</option>
                <option value="Puerto Rico">Puerto Rico</option>
                <option value="Qatar">Qatar</option>
                <option value="Reunion">Reunion</option>
                <option value="Romania">Romania</option>
                <option value="Russian Federation">Russian Federation</option>
                <option value="RWANDA">RWANDA</option>
                <option value="Saint Helena">Saint Helena</option>
                <option value="Saint Kitts and Nevis">Saint Kitts and Nevis</option>
                <option value="Saint Lucia">Saint Lucia</option>
                <option value="Saint Pierre and Miquelon">Saint Pierre and Miquelon</option>
                <option value="Saint Vincent and the Grenadines">Saint Vincent and the Grenadines</option>
                <option value="Samoa">Samoa</option>
                <option value="San Marino">San Marino</option>
                <option value="Sao Tome and Principe">Sao Tome and Principe</option>
                <option value="Saudi Arabia">Saudi Arabia</option>
                <option value="Senegal">Senegal</option>
                <option value="Serbia">Serbia</option>
                <option value="Montenegro">Montenegro</option>
                <option value="Seychelles">Seychelles</option>
                <option value="Sierra Leone">Sierra Leone</option>
                <option value="Singapore">Singapore</option>
                <option value="Slovakia">Slovakia</option>
                <option value="Slovenia">Slovenia</option>
                <option value="Solomon Islands">Solomon Islands</option>
                <option value="Somalia">Somalia</option>
                <option value="South Africa">South Africa</option>
                <option value="South Georgia and the South Sandwich Islands">South Georgia and the South Sandwich Islands</option>
                <option value="Spain">Spain</option>
                <option value="Sri Lanka">Sri Lanka</option>
                <option value="Sudan">Sudan</option>
                <option value="Suriname">Suriname</option>
                <option value="Svalbard and Jan Mayen">Svalbard and Jan Mayen</option>
                <option value="Swaziland">Swaziland</option>
                <option value="Sweden">Sweden</option>
                <option value="Switzerland">Switzerland</option>
                <option value="Syrian Arab Republic">Syrian Arab Republic</option>
                <option value="Taiwan, Province of China">Taiwan, Province of China</option>
                <option value="Tajikistan">Tajikistan</option>
                <option value="Tanzania">Tanzania</option>
                <option value="Thailand">Thailand</option>
                <option value="Timor-Leste">Timor-Leste</option>
                <option value="Togo">Togo</option>
                <option value="Tokelau">Tokelau</option>
                <option value="Tonga">Tonga</option>
                <option value="Trinidad and Tobago">Trinidad and Tobago</option>
                <option value="Tunisia">Tunisia</option>
                <option value="Turkey">Turkey</option>
                <option value="Turkmenistan">Turkmenistan</option>
                <option value="Turks and Caicos Islands">Turks and Caicos Islands</option>
                <option value="Tuvalu">Tuvalu</option>
                <option value="Uganda">Uganda</option>
                <option value="Ukraine">Ukraine</option>
                <option value="United Arab Emirates">United Arab Emirates</option>
                <option value="United Kingdom">United Kingdom</option>
                <option value="United States">United States</option>
                <option value="United States Minor Outlying Islands">United States Minor Outlying Islands</option>
                <option value="Uruguay">Uruguay</option>
                <option value="Uzbekistan">Uzbekistan</option>
                <option value="Vanuatu">Vanuatu</option>
                <option value="Venezuela">Venezuela</option>
                <option value="Viet Nam">Viet Nam</option>
                <option value="Virgin Islands, British">Virgin Islands, British</option>
                <option value="Virgin Islands, U.S.">Virgin Islands, U.S.</option>
                <option value="Wallis and Futuna">Wallis and Futuna</option>
                <option value="Western Sahara">Western Sahara</option>
                <option value="Yemen">Yemen</option>
                <option value="Zambia">Zambia</option>
                <option value="Zimbabwe">Zimbabwe</option>
            </select>
          </div>
        </div>
        <div class="form-group">
          <label class="col-md-4 control-label" for="lname">Captcha</label>  
          <div class="col-md-4">
              <div class="g-recaptcha" data-sitekey="6LcZOwUTAAAAAGpPt9zIFi1zP1iT_TgsRidoFB39"></div>
          <?php //echo $recaptcha_html; ?>
            
          </div>
        </div>
        <!-- File Button --> 
        <!--<div class="form-group">
          <label class="col-md-4 control-label" for="filebutton">Profile Picture</label>
          <div class="col-md-4">
            <input id="filebutton" name="filebutton" class="input-file" type="file">
          </div>
        </div>-->

        <!-- Button (Double) -->
        <div class="form-group">
            <label class="col-md-4 control-label" for="submit"></label>
            <div class="col-md-4">
               <!-- <input name="savelogin" id="savelogin-0" value="" type="checkbox"> Remember Me  -->
               <div class="pull-right">
                 <button type="reset" class="btn btn-default"><i class="fa fa-eraser"></i> Clear</button>
                 <input id="submit" type="submit" name="register" value="Register" class="btn btn-success">
               </div>
               
            </div>
        </div>

        </fieldset>
  </form>
      </div><!-- End book -->


<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
  ga('require', 'displayfeatures');
  ga('create', 'UA-58667648-2', 'auto');
    ga('newTracker.send', 'pageview');
  ga('send', 'pageview');

</script>

<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
  ga('require', 'displayfeatures');

  ga('newTracker.send', 'pageview');
  ga('create', 'UA-58667648-1', 'auto');
  ga('send', 'pageview');

</script>



<SCRIPT LANGUAGE="JavaScript">
<!-- BidVertiser Performance Tracker Code
var bdv_Performance_Ver = "1.0";
var bdv_AID = 285394455;
var bdv_protocol="http://";
if(location.protocol == "https:")
{
	bdv_protocol="https://";
}
var bdv_queryStr = "?" + "ver=" + bdv_Performance_Ver + "&AID=" + bdv_AID +"&ref=" + escape(document.referrer); 
var bdv_imageUrl = bdv_protocol + "secure.bidvertiser.com/performance/pc.dbm" + bdv_queryStr; 
var bdv_imageObject = new Image(); 
bdv_imageObject.src = bdv_imageUrl; 
// --> 
</SCRIPT>
<noscript>
	<img height=1 width=1 border=0 src="https://secure.bidvertiser.com/performance/pc.dbm?ver=1.0&AID=285394455">
</noscript>



<!-- Google Code for mappyconversion Conversion Page -->
<script type="text/javascript">
/* <![CDATA[ */
var google_conversion_id = 1013984767;
var google_conversion_language = "en";
var google_conversion_format = "3";
var google_conversion_color = "ffffff";
var google_conversion_label = "EWxRCLKH7FoQ_9vA4wM";
var google_remarketing_only = false;
/* ]]> */
</script>

<script type="text/javascript" src="//www.googleadservices.com/pagead/conversion.js">
</script>
<noscript>
<div style="display:inline;">
<img height="1" width="1" style="border-style:none;" alt="" src="//www.googleadservices.com/pagead/conversion/1013984767/?label=EWxRCLKH7FoQ_9vA4wM&amp;guid=ON&amp;script=0"/>
</div>
</noscript>



<!-- Facebook Conversion Code for loginsbaby -->
<script>(function() {
  var _fbq = window._fbq || (window._fbq = []);
  if (!_fbq.loaded) {
    var fbds = document.createElement('script');
    fbds.async = true;
    fbds.src = '//connect.facebook.net/en_US/fbds.js';
    var s = document.getElementsByTagName('script')[0];
    s.parentNode.insertBefore(fbds, s);
    _fbq.loaded = true;
  }
})();
window._fbq = window._fbq || [];
window._fbq.push(['track', '6023007980085', {'value':'0.00','currency':'INR'}]);
</script>
<noscript><img height="1" width="1" alt="" style="display:none" src="https://www.facebook.com/tr?ev=6023007980085&amp;cd[value]=0.00&amp;cd[currency]=INR&amp;noscript=1" /></noscript>



<?php print_footer(); ?>