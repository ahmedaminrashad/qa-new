<?php
include("../includes/main-var.php");
$famID=$_GET['famID'];
$famAmu=$_GET['famAmu'];
$famAcc=$_GET['famAcc'];
$fammon=$_GET['fammon'];
$famEmail=$_GET['famEmail'];
$nfamAcc = mb_strlen($famAcc, 'UTF-8');
$nfamAmu = mb_strlen($famAmu, 'UTF-8');
$nfammon = mb_strlen('Payment-link-'.$fammon, 'UTF-8');
$secret = $secret2co;
$string = ''.$nfamAcc.''.$famAcc.''.$nfamAmu.''.$famAmu.''.$nfammon.'Payment-link-'.$fammon.'11107product';
$sig = hash_hmac('sha256', $string, $secret);
?>
<head>
    <link href='https://fonts.googleapis.com/css?family=Oswald' rel='stylesheet' type='text/css'> 

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script>
function copyToClipboard(element) {
  var $temp = $("<input>");
  $("body").append($temp);
  $temp.val($(element).text()).select();
  document.execCommand("copy");
  $temp.remove();
}
</script>
</head>
<div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Direct Payment Links Currency = <?php echo $famAcc; ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            <table>
								<tbody>
								<tr>
								    <td>2checkOut</td>
								    <td> &nbsp;</td>
								    <td><?php echo $site; ?>/members/accounts/direct-payment-link-1?py_id=<?php echo base64_encode($famID); ?></td>
								</tr>
								<tr>
								    <td>PayPal</td>
								    <td> &nbsp;</td>
								    <td><?php echo $site; ?>/members/accounts/direct-payment-link-2?py_id=<?php echo base64_encode($famID); ?></td>
								</tr>
</tbody>
								</table>
            </div>
                            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>