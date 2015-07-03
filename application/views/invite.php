<?php  print_header();?>
<script src="/assets/js/invites.js"></script>
<div class="container">
	<div class="row">
		<div class="col-lg-12">
			<center><h4>Get Started by inviting your friends</h4></center>
		</div>
	</div>
	<hr>
	<form action="#" onsubmit="return false;">
	<div class="row">
		<div class="col-lg-12">
			<div class="row">
				<div class="col-xs-8 col-lg-6">
					<h5><label for="email" class="col-lg-2">Email:</label></h5>
						<input class="col-xs-12 col-lg-8 pull-left" type="text" name="email" id="email" />
						<button type="submit" style="margin-top:1em; margin-bottom:10px;" class="invited-button btn btn-primary" >Invite Friend</button>
				</div>
				<div class="col-xs-4 col-lg-6">
					<h5 class="hidden-xs">Import Gmail Contacts</h5>
					<h5 class="visible-xs">Quicktime</h5>				
					<div class="col-lg-3"><a href="<?php echo $url;?>"><img width=40 src="/assets/images/Gmail-Logo.png"></a></div>
				</div>
			</div>
		</div>
		<div class="col-lg-12" style="overflow-y:auto; height: 400px;">
			<?php if($freinds!=null) {
				foreach ($freinds as $friend) {
				?>
			<div class="col-xs-6 col-md-2">
			 <a href="#" class="row thumbnail" style="margin-bottom:2px;"><img height=150 onError="this.src='/assets/images/avtar.png'" src=<?php echo $friend->image.$accesstoken;?>></a>
			 <span style="font-size:12px;"><?php if($friend->name=='') echo substr($friend->email,0,15); else echo substr($friend->name,0,15);?></span>
			 <?php if($friend->registered_user) {
			 	echo "<button type='button' class='btn btn-danger disabled pull-top' style='height:20px; font-size:12px; padding-top:0px; width:100%' value='$friend->email'>Registered</button>";
			 } else if($friend->invited) {
			 	echo "<button type='button' class='btn btn-success disabled pull-top' style='height:20px; font-size:12px; padding-top:0px; width:100%' value='$friend->email'>Invited</button>";
			 } else {
			 	echo "<button type='button' class='inviteUser btn btn-primary  pull-top' style='height:20px; font-size:12px; padding-top:0px; width:100%' value='$friend->email'>Invite</button>";
			 }
			 	?>
			</div>		
			<?php	}}?>
		</div>
	</div>
	</form>
</div>