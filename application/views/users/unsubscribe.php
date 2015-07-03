<?php print_header(); ?>
<script>
function checkAll(ele) {
    var checkboxes = document.getElementsByTagName('input');
    if (ele.checked) {
        for (var i = 0; i < checkboxes.length; i++) {
            if (checkboxes[i].type == 'checkbox') {
                checkboxes[i].checked = true;
            }
        }
    } else {
        for (var i = 0; i < checkboxes.length; i++) {
            console.log(i)
            if (checkboxes[i].type == 'checkbox') {
                checkboxes[i].checked = false;
            }
        }
    }
}
</script>
<title> Maptags- Imagine Never writing your address again </title>
<div class="container">
	<div class="row" style="margin-top: 45px;">
		<div class="container col-lg-12">
			<h2 style="color: black;">Please select one of these options to update your subscriptions:.</h2>
			<hr>
		</div>
	</div>
	<div class="panel panel-success">
  <div class="panel-heading col-md-12">
    <h3 class="panel-title">Email Subcription for: <?php echo $email;?></h3>
  </div>
  <div class="panel-body">
			<div class="row list-group">
				<div class="container col-lg-12">
					<h4 style="color: gray;"> Keep me subscribed to the following selected lists: </h4>
					<form action="">
						<input type="hidden" name="email" id="email" value="<?php echo $email;?>"/>
					<div class="row list-group-item" style="margin-top:45px;">
						<div class="col-xs-3 col-md-2">
							<input type="checkbox" value="1" name="lists[]" id="lists_1" <?php if($transactionmail) echo "checked"; else echo "";?>>
						</div>
						<div class="col-xs-6 col-md-8">
						<h5>Transaction Mails </h5>
						</div>
						<div class="col-xs-3 col-md-2">
						<?php if($transactionmail) echo "<p>Subscribed</p>"; else echo "<p>Un-Subscribe</p>";?>
						</div>
					</div>
					<div class="row list-group-item">
						<div class="col-xs-3 col-md-2">
							<input type="checkbox" value="2" name="lists[]" id="lists_2" <?php if($promotionalmail) echo "checked"; else echo "";?>>
						</div>
						<div class="col-xs-6 col-md-8">
						<h5>Promotional Mail </h5>
						</div>
						<div class="col-xs-3 col-md-2">
						<?php if($promotionalmail) echo "<p>Subscribed</p>"; else echo "<p>Un-Subscribe</p>";?>
						</div>
					</div>
					<div class="row list-group-item">
						<div class="col-xs-3 col-md-2">
							<input onchange="checkAll(this)" type="checkbox" value="3" name="lists[]" id="lists_3" <?php if($transactionmail&&$promotionalmail) echo "checked"; else echo "";?>>
						</div>
						<div class="col-xs-6 col-md-8">
							<h5>Select All</h5>
						</div>
						<div class="col-xs-3 col-md-2">
						</div>
					</div>
				</div>
			</div>
	  </div>
</div>
	<div class="col-md-12 col-xs-12" style="margin-top:30px;">
	<input type="hidden" value="1" name="update">
	<button type="submit" class=" col-md-12 btn btn-success">Update</button>
	</div>
	</form>
</div>
</div><!-- End book -->

<?php print_footer(); ?>