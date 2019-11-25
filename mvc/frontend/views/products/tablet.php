<?php require_once 'views/layouts/header.php'?>
<body>
	<!-- <div id="loading">
		<div id="loading-center">
			<div id="loading-center-absolute">
				<div class="object" id="object_one"></div>
				<div class="object" id="object_two"></div>
				<div class="object" id="object_three"></div>
			</div>
		</div>
	</div> -->
	<!-- Body -->
	<section class="main container-fluid margin_bottom_30">
		<!--- Breadcumb -->
			<nav aria-label="breadcrumb" class="margin_top_80" style="margin-top: 80px;">
			  <ol class="breadcrumb">
			    <li class="breadcrumb-item"><a href="?controller=home&action=index">Home</a></li>
			    <li class="breadcrumb-item active" aria-current="page">Products</li>
			  </ol>
			</nav>
		<!--- End readcumb -->

		<!--- Hot saler --->

		<!--- End hot saler --->


		<!--- Product list --->
			<div class="container-fluid product_list">

				<!--- Search --->
				<?php require_once 'views/layouts/search.php'?>
			 	<!--- End Search --->

				 <div class="col-md-9">
					 	<?php if (isset($products)): ?>
						 	<p class="font24 margin_bottom_20">Table<i class="font18">(<?php echo $product_found ?> products)</i></p>
						<?php foreach ($products as $product): ?>
							<div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
						     	   <img class="img-responsive" src="../backend/public/uploadsFrontend/products/<?php echo $product['avatar'] ?>" alt="" style="height: 220px; margin: 0px auto 8px auto; cursor: pointer;" onclick="location.href='?controller=products&action=detail&id=<?php echo $product['ID'] ?>'">

						            <p class="text-center no_margin"><?php echo $product['name'] ?></p>
						            <?php if ($product['stock'] != 0): ?>
							            <p class="red_color text-center font18 no_margin">$<?php echo $product['price'] ?></p>
							            <p class="rating_product text-center no_margin">
						            	<span class="fa fa-star" style="color: #f39c12"></span>
						            	<span class="fa fa-star" style="color: #f39c12"></span>
						            	<span class="fa fa-star" style="color: #f39c12"></span>
						            	<span class="fa fa-star" style="color: #f39c12"></span>
						            </p>
							            <p class="red_color text-center font18 no_margin" style="margin: 10px 0px;">
											<a class="btn btn-primary add_to_cart" id="<?php echo $product['ID'] ?>"><i class="fa fa-shopping-cart"></i></a>
											<a href="?controller=products&action=detail&id=<?php echo $product['ID'] ?>" class="btn btn-danger"><i class="fa fa-info-circle"></i></a>
							            </p>
						            <?php else: ?>
						            	<p class="rating_product text-center no_margin">
						            	<span class="fa fa-star" style="color: #f39c12"></span>
						            	<span class="fa fa-star" style="color: #f39c12"></span>
						            	<span class="fa fa-star" style="color: #f39c12"></span>
						            	<span class="fa fa-star" style="color: #f39c12"></span>
						            </p>
						            	<p class="red_color text-center font18 no_margin">Sold out</p>
						            	<p class="text-center" style="margin: 10px 0px;">
											<a href="?controller=products&action=detail&id=<?php echo $product['ID'] ?>" class="btn btn-danger"><i class="fa fa-info-circle"></i></a>
							            </p>
						            <?php endif;?>

							</div>
							<?php endforeach;?>
						<?php else: ?>
							<p class="font24">No result<i class="font18">(0 products found)</i></p>
						<?php endif;?>
				</div>
			 </div>
		<!--- End products list --->


		<!-- keyWord -->
		<div class="keyword_product margin_bottom_30">
			<h3>Popular KeyWord:</h3>
			<a href="" class="btn btn-primary">Apple</a>
			<a href="" class="btn btn-primary">Mi band 3</a>
		</div>
		<!-- end Keyword -->

		<!-- Recent news -->
	<?php require_once 'views/layouts/recent_news.php'?>
		<!-- End Recent news -->
	</section>
	<!-- End body -->

	<!-- Footer -->
<?php require_once 'views/layouts/footer.php'?>
	<script type="text/javascript">
		$(document).ready(function(){
			$("#byBrand").change(function(event) {
				var brand = $(this).children("option:selected").val();
				if(brand == 'other'){
					$("#type_brand").css({
						display: 'block',
					});
				}else{
					$("#type_brand").css({
						display: 'none',
					});
				}
			});
			$(".add_to_cart").click(function(){
			var id = $(this).attr('id');
			$.ajax({
				url:'?controller=cart&action=add',
				method: 'POST',
				data: {
					'id' : id,
				},
				success:function(data){
					Command: toastr["success"]("Product add, Do you wanna go to cart?")
					toastr.options = {
					  "closeButton": false,
					  "debug": false,
					  "newestOnTop": false,
					  "progressBar": true,
					  "positionClass": "toast-top-right",
					  "preventDuplicates": false,
					  "onclick": null,
					  "showDuration": "300",
					  "hideDuration": "1000",
					  "timeOut": "5000",
					  "extendedTimeOut": "1000",
					  "showEasing": "swing",
					  "hideEasing": "linear",
					  "showMethod": "fadeIn",
					  "hideMethod": "fadeOut"
					}
				}
			})
					toastr.options.onclick = function() {
						location.href = "?controller=cart&action=list";
					}
		})
		})
	</script>