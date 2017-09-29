	<div class="container">
		<h2>Judul Form</h2>
		<!--FORM<-->
		<form>
		  <div class="form-group">
		    <label for="email">Email address:</label>
		    <input type="email" class="form-control" id="email">
		  </div>
		  <div class="form-group">
		    <label for="pwd">Password:</label>
		    <input type="password" class="form-control" id="pwd">
		  </div>
		  <div class="form-group">
		      <label for="comment">Comment:</label>
		      <textarea class="form-control" rows="5" id="comment"></textarea>
		    </div>
		  <div class="checkbox">
	      	<label><input type="checkbox" value="">Option 1</label>
		  </div>
	      <div class="checkbox">
	        <label><input type="checkbox" value="">Option 2</label>
		  </div>
		  
		  <label class="checkbox-inline"><input type="checkbox" value="">Option 1</label>
		  <label class="checkbox-inline"><input type="checkbox" value="">Option 2</label><br>
		  
		  <div class="radio">
		  	<label><input type="radio" name="optradio">Option 1</label>
	      </div>

	      <div class="radio">
	      	<label><input type="radio" name="optradio">Option 2</label>
	      </div>

		  <label class="radio-inline"><input type="radio" name="optradio">Option 1</label>
		  <label class="radio-inline"><input type="radio" name="optradio">Option 2</label><br>

		  <br>
		  <label for="sel1">Select list (select one):</label>
		    <select class="form-control" id="sel1">
		        <option>1</option>
		        <option>2</option>
		        <option>3</option>
		        <option>4</option>
		    </select>

		  <br>
		  <button type="submit" class="btn btn-default">Submit</button>
		</form>
	</div>

