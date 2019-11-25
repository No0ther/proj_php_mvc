<?php require_once 'views/layouts/header.php'?>
 	<div class="container-fluid">
 		<h3 class="text-center">Send Voucher</h3>

 		<div class="widget-content no-padding">
             <?php if (isset($_SESSION['success'])): ?>
                   <div class="alert alert-info fade in">
            <?php
echo $_SESSION['success'];
unset($_SESSION['success']);
?>
                </div>
             <?php endif;?>
             <?php if (isset($_SESSION['error'])): ?>
            <div class="alert alert-info fade in">
                 <?php
echo $_SESSION['error'];
unset($_SESSION['error']);
?>
              </div>
        <?php endif;?>
	<div class="col-md-4 offset-2 mt-5">
        <form action="" method="post">
            <div class="form-group">
                <label>Email:</label>
                <input class="form-control" type="text" name="email" value="<?php echo isset($customer['email']) ?
$customer['email'] : "" ?>">
                <label>Voucher:</label>
                <input class="form-control" type="text" name="voucher" value="<?php echo isset($voucher['description']) ?
$voucher['description'] : "" ?>">
            </div>
            <input class="btn btn-primary" type="submit" name="submit" value="Send">
        </form>
    </div>

 	</div>
<?php require_once 'views/layouts/footer.php'?>