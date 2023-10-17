<style>
	.notice{
		background-color: red;
		color: white;
		padding: 5px;
		border-radius: 10px;
		display: none;
	}
</style>
<li class="<?php if (strpos($_SERVER['REQUEST_URI'], "list") !== false){echo 'active'; } ?>"><a href="../../supply_officer/view/order_list.php">รายการสั่งซื้อทั้งหมด <span class="notice zoom-in-loop">*</span></a></li>
<li class="<?php if (strpos($_SERVER['REQUEST_URI'], "confirm") !== false){echo 'active'; } ?>"><a href="../../supply_officer/view/order_confirm.php">การยืนยันรายการสั่งซื้อ</a></li>