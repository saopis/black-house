<style>
	.notice{
		background-color: red;
		color: white;
		padding: 5px;
		border-radius: 10px;
		display: none;
	}
</style>
<li class="has-dropdown <?php if (strpos($_SERVER['REQUEST_URI'], "manage_member") !== false){echo 'active'; } ?>"><a  >จัดการบัญชีผู้ใช้ <span class="notice zoom-in-loop notice_user">*</span></a>
	<ul class="dropdown">
		<li><a href="../../executive/view/manage_member.php?action=all"><span>รายชื่อพนักงานทั้งหมด</span></a></li>
		<li><a href="../../executive/view/manage_member.php?action=blocked"><span>รายชื่อพนักงานที่ถูกบล็อก</span></a></li>
		<li><a href="../../executive/view/manage_member.php?action=wait"><span>บัญชีที่รอการอนุมัติ</span></a></li>
	</ul>
</li>
<li class="has-dropdown <?php if (strpos($_SERVER['REQUEST_URI'], "menu") !== false){echo 'active'; } ?>"><a >จัดการรายการอาหาร <span class="notice zoom-in-loop notice_menu">*</span></a>
	<ul class="dropdown">
		<li><a href="../../executive/view/all_menu.php"><span>รายการอาหารทั้งหมด</span></a></li>
		<li><a href="../../executive/view/wait_menu.php"><span>เมนูที่รอการอนุมัติ</span></a></li>
		<li><a href="../../executive/view/add_menu.php"><span>เพิ่มเมนู</span></a></li>
	</ul>
</li>
<li class="has-dropdown <?php if (strpos($_SERVER['REQUEST_URI'], "report") !== false){echo 'active'; } ?>"><a >รายงาน</a>
	<ul class="dropdown">
		<li><a href="../../executive/view/months_report.php"><span>รายรับรายจ่ายประจำเดือน</span></a></li>
		<li><a href="../../executive/view/years_report.php"><span>รายรับรายจ่ายประจำปี</span></a></li>
		<li><a href="../../executive/view/best_seller.php"><span>รายการยอดนิยมเดือนนี้</span></a></li>
	</ul>
</li>
<li class="<?php if (strpos($_SERVER['REQUEST_URI'], "expenditure") !== false){echo 'active'; } ?>"><a href="more_expenditure.php">รายจ่ายในร้าน</a></li>
