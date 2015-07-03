<?php print_header(); ?>

  <section class="bodyContent">
    
   
    <article class="basketball bluebg">Purchase History</article>
    
    <article class="livetop">

      <div class="livein"> Name </div>
      <div class="livetime" style="width:132px"> Date </div>
      <div class="liveevt"> Method </div>
      <div class="livematch"> Price </div>
      <div class="livoddtype"> Status </div>
      <div class="livehand">IP address</div>
      
    </article>
    <?php foreach ($orders as $order) { ?>
    <article class="livecontent">
      <div class="livein"><?php echo $order->orders_products ?></div>
      <div class="livetime" style="width:132px"><?php echo $order->orders_datetime ?> </div>
      <div class="liveevt"><?php echo $order->orders_method ?></div>
      <div class="livematch"><?php echo $order->orders_price ?></div>
      <div class="livoddtype"><?php echo $order->orders_status ?></div>
      <div class="livehand"><?php echo $order->orders_ip_address ?></div>
    </article>
    <?php 
      } 
    ?>
    <div class="clear"></div>
  </section>
  <!--bodyContent-->
  <section class="colright">
    <div class="rjoinnow"><a href="#"><img src="<?php echo site_url('assets/images/rjoinnow.png')?>" /></a></div>
    <article class="shipbox">
      <div class="shiptotxt"> Ship to </div>
      <input type="text" class="shipinput" />
      <div class="howtoappy">How you will apply</div>
      <div class="howtoappy">
        <input type="radio" class="radiobtn"  />
        <img src="<?php echo site_url('assets/images/visa2.png')?>" alt="visa" /></div>
      <div class="howtoappy">
        <input type="radio" class="radiobtn"  />
        <img src="<?php echo site_url('assets/images/paypall.png')?>" alt="visa" /></div>
      <div class="itotal">item total</div>
      <div class="itotal2">$145</div>
      <div class="itotal">shipping </div>
      <div class="itotal2">$18</div>
      <div class="itotal">tax </div>
      <div class="itotal2">$0</div>
      <div class="clear"></div>
      <div class="totalpr">
        <div class="itotal red"><strong>order total</strong> </div>
        <div class="itotal2">$163</div>
      </div>
    </article>
  </section>
  <!--colright-->
  <div class="contentline"></div>
 
  <div class="clear"></div>
   <div class="top"><img src="<?php echo site_url('assets/images/top.png')?>" alt="top" /><a href="#top">Top</a></div>
</div>
<?php print_footer(); ?>
