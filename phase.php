<?php
require "panel/production/db.php";
$id= $_GET[article];
$qs="SELECT * FROM `phases` WHERE `id`='$id'";
    $qruns=mysqli_query($connection,$qs);
    while($rowss=mysqli_fetch_array($qruns)){
        $id = $rowss[id];
        $enname = $rowss[entitle];
        $arname = $rowss[artitle];
        $endescrip = $rowss[encontent];
        $ardescrip = $rowss[arcontent];
        $cover = $rowss[cover];
      }
?>
<?php require 'head.php';?>
<?php require 'nav.php';?>
<section class="container-fluid">
    <div class="row">
    <img src="<?php echo $cover;?>" class="col-12 p-0 img-fluid pro-cover">
        </div>
</section>
<section class="container mt-5  pb-5">
    <div class="title text-center main-color pb-3">
        <h2 class="text-center"><?php echo $enname;?></h2>
    </div>
    <div class="details"><?php echo $endescrip;?></div>
        <br>
<?php
if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on') $link = "https"; 
else $link = "http"; 
$link .= "://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
echo '<a href="https://www.facebook.com/sharer.php?u='.$link.'//?&u='.$link.'" class="btn btn-success">Share Via Facebook</a>';

echo '<a href="whatsapp://send?text='.$link.'" data-action="share/whatsapp/share" class="btn btn-success">Share via Whatsapp</a>';

echo '<a href="https://twitter.com/intent/tweet?text='.$link.'" class="btn btn-success">Share Via Twitter</a>';

?>

</section>

<?php require 'footer.php';?>