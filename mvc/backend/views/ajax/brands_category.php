<?php
require_once 'models/brands.php';
$id = $_GET['id'];
$brandsModel = new brands();
$brands = $brandsModel->getByCatelogyId($id);
?>
<?php foreach ($brands as $brand): ?>
<option value="<?php echo $brand['ID'] ?>"><?php echo $brand['name'] ?></option>
<?php endforeach;?>
?>
