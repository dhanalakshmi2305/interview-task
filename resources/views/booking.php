<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Booking</h2>
        </div>
    </div>
</div>
   
<form action="<?php echo config('app.url').'/bookSeats'; ?>" method="POST"> 
    @csrf
     <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Email:</strong>
                <input type="email" name="user_email" required class="form-control" placeholder="User Email">
            </div>
        </div>
		<br>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Your Choice:</strong>
                <select name="user_choice" required>
					<?php 
						for($i="A";$i<="T";$i++){
							for($j=1;$j<=10;$j++){ ?>
								<option value="<?php echo $i.$j; ?>"><?php echo $i.$j; ?></option>
							<?php } 
						} 
					?>
				</select>
            </div>
        </div>
		<br>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>No of Tickets:</strong>
                <input type="text" name="no_of_booking" class="form-control" placeholder="No of Tickets" required>
            </div>
        </div><br>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Book a Ticket</button>
        </div>
    </div>   
</form> 