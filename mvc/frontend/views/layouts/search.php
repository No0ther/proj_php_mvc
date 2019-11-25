<!-- Search -->
			 	<div class="col-md-3">
			 		<p class="font24 margin_bottom_20">Search</p>
			 		<div class="search_keyword">
			 			<form method="post"  action="?controller=products&action=search">
				 			<div class="form-group">
				 				<input type="text" id="searchBtn"  class="form-control" placeholder="Search something..." name="product_name" value="<?php echo isset($_POST['product_name']) ? $_POST['product_name'] : '' ?>">
				 				<button class="btn btn-info" id="btnSearch" type="submit" name="search"><i class="fa fa-search" ></i></button>
								<span id="searchSpan" class="red_color " style="margin: 15px 0px 0px 10px;">
									<?php
if (isset($_SESSION['error'])) {
	echo $_SESSION['error'];
	unset($_SESSION['error']);
}
;
?>
				 				</span>
				 			</div>
			 			</form>
			 		</div>
			 		<p class="font24 margin_bottom_20">Filter</p>
			 		<div class="filler_keyword">
			 			<form action="?controller=products&action=filter" method="post">
				 			<div class="form-group">
				 				<label for="">By Price</label>
				 				<select class="form-control" name="byprice">
				 					<option value="all" <?php echo (isset($_POST['byprice']) && $_POST['byprice'] == 'all') ? "selected = 'true'" : '' ?>>All price</option>
				 					<option value="lessthan100" <?php echo (isset($_POST['byprice']) && $_POST['byprice'] == 'lessthan100') ? "selected = 'true'" : '' ?>>Less than $100</option>
				 					<option value="100-500" <?php echo (isset($_POST['byprice']) && $_POST['byprice'] == '100-500') ? "selected = 'true'" : '' ?>>$100 - $500</option>
				 					<option value="500-1000" <?php echo (isset($_POST['byprice']) && $_POST['byprice'] == '500-1000') ? "selected = 'true'" : '' ?>>$500 - $1000</option>
				 					<option value="morethan1000" <?php echo (isset($_POST['byprice']) && $_POST['byprice'] == 'morethan1000') ? "selected = 'true'" : '' ?>>More than 1000$</option>
				 				</select>
				 			</div>
				 			<div class="form-group">
				 				<label for="">By Brand</label>
				 				<select name="bybrand" class="form-control" id="byBrand">
				 					<option value="all"  <?php echo (isset($_POST['bybrand']) && $_POST['bybrand'] == 'all') ? "selected = 'true'" : '' ?>>All brands</option>
				 					<option value="apple"  <?php echo (isset($_POST['bybrand']) && $_POST['bybrand'] == 'apple') ? "selected = 'true'" : '' ?>>Apple</option>
				 					<option value="samsung"  <?php echo (isset($_POST['bybrand']) && $_POST['bybrand'] == 'samsung') ? "selected = 'true'" : '' ?>>Samsung</option>
				 					<option value="xiaomi"  <?php echo (isset($_POST['bybrand']) && $_POST['bybrand'] == 'xiaomi') ? "selected = 'true'" : '' ?>>Xiaomi</option>
				 					<option value="other" <?php echo (isset($_POST['bybrand']) && $_POST['bybrand'] == 'other') ? "selected = 'true'" : '' ?>>Other</option>
				 				</select>
				 			</div>
				 			<div class="form-group" id="type_brand" style="display: none;">
				 				<label for="">Type brand</label>
				 				<input type="text" class="form-control" name="other_name" placeholder="Type brand">
				 			</div>
				 			<div class="form-group">
				 				<label for="">By Category</label>
				 				<select name="bycategory" class="form-control">
				 					<!-- <option>All categories</option> -->
				 					<option value="phone" <?php echo (isset($_POST['bycategory']) && $_POST['bycategory'] == 'phone') ? "selected = 'true'" : '' ?>>Phone</option>
				 					<option value="tablet" <?php echo (isset($_POST['bycategory']) && $_POST['bycategory'] == 'tablet') ? "selected = 'true'" : '' ?>>Tablet</option>
				 					<option value="watch" <?php echo (isset($_POST['bycategory']) && $_POST['bycategory'] == 'watch') ? "selected = 'true'" : '' ?>>Smart watch</option>
				 				</select>
				 			</div>
				 			<button class="btn btn-primary" type="submit" name="filter" style="width: 100%;">Filter</button>
			 			</form>
			 		</div>
			 	</div>
<!-- End Search -->
<script type="text/javascript" src="public/assets/js/jquery.min.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
			$("#btnSearch").click(function(){
				var ip = $("#searchBtn").val();
				var regex =   /[><]/gim;
				var text = regex.test(ip);
				if(text){
					$("#searchBtn").val("");
					$("#btnSearch").removeAttr("type");
					$("#btnSearch").attr("type","button");
					$("#searchSpan").html("Incorrect format");
				}else{
					$("#btnSearch").removeAttr("type");
					$("#btnSearch").attr("type","submit");
				}
			})
		})
</script>