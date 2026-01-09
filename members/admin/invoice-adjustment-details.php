<?
require ("../includes/dbconnection.php");
$famAdd=$_GET['famAdd'];
$famNote=$_GET['famNote'];
?>
<div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Add Invoice Adjustemnt for <?php echo $famName; ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            <table>
								<tbody>
								<tr>
								<td>Amount: <b><?php echo $famAdd; ?></b></td>
								</tr>
								<tr>
								<td>Note: <b><?php echo $famNote; ?></b></td>
							</tr>
</tbody>
								</table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>