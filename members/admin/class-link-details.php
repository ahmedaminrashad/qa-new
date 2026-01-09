<?
include("../includes/main-var.php");
$famID=$_GET['famID'];
$famAmu=$_GET['famAmu'];

?>
<div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Class Link:</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table class="table table-hover">
								<tbody>
								<tr>
								<td><?php echo $site; ?>/members/accounts/your-class.php?s=<?php echo base64_encode($famID); ?>&t=<?php echo base64_encode($famAmu); ?></td>
								</tr>

</tbody>
								</table>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>