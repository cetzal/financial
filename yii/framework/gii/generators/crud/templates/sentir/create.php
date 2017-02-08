<?php
/**
 * The following variables are available in this template:
 * - $this: the CrudCode object
 */
?>
<?php echo "<?php\n"; ?>
/* @var $this <?php echo $this->getControllerClass(); ?> */
/* @var $model <?php echo $this->getModelClass(); ?> */

<?php
$label=$this->pluralize($this->class2name($this->modelClass));
echo "\$this->breadcrumbs=array(
	'$label'=>array('index'),
	'Create',
);\n";

?>
?>

	<!-- Begin page heading -->
    <h1 class="page-heading">Plantilla Create</small></h1>
    <!-- End page heading -->

	<!-- Begin breadcrumb -->
	<ol class="breadcrumb default square rsaquo sm">
		<li><a href="index.html"><i class="fa fa-home"></i></a></li>
		<li><a href="#fakelink">Example pages</a></li>
		<li class="active">Blank</li>
	</ol>
	<!-- End breadcrumb -->


<div class="the-box" >
<?php echo "<?php \$this->renderPartial('_form', array('model'=>\$model)); ?>"; ?>
</div>