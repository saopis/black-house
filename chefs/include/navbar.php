<style>
	.notice{
		background-color: red;
		color: white;
		padding: 5px;
		border-radius: 10px;
		display: none;
	}
</style>
<li class="has-dropdown <?php if (strpos($_SERVER['REQUEST_URI'], "order") !== false){echo 'active'; } ?>"><a >จัดการรายการออเดอร์ <span class="notice zoom-in-loop notice_order">*</span></a>
	<ul class="dropdown">
		<li><a href="../../chefs/view/all_order.php"><span>รายการออเดอร์ทั้งหมด</span></a></li>
		<li><a href="../../chefs/view/my_order.php"><span>ออเดอร์ที่เราทำ</span></a></li>
	</ul>
</li>
<li class="has-dropdown <?php if (strpos($_SERVER['REQUEST_URI'], "menu") !== false){echo 'active'; } ?>"><a >จัดการรายการอาหาร</a>
	<ul class="dropdown">
		<li><a href="../../chefs/view/all_menu.php"><span>รายการอาหารทั้งหมด</span></a></li>
		<li><a href="../../chefs/view/no_obj_menu.php"><span>รายการอาหารวัตถุดิบหมด</span></a></li>
		<li><a href="../../chefs/view/add_menu.php"><span>เสนอรายการอาหาร</span></a></li>
	</ul>
</li>
<li class="has-dropdown <?php if (strpos($_SERVER['REQUEST_URI'], "buy_obj") !== false){echo 'active'; } ?>"><a >จัดการการสั่งซื้อ</a>
	<ul class="dropdown">
		<li><a href="../../chefs/view/buy_obj_list.php"><span>รายการสั่งซื้อทั้งหมด</span></a></li>
		<li><a href="../../chefs/view/buy_obj.php"><span>สั่งซื้อวัตถุดิบ</span></a></li>
	</ul>
</li>
<li class="has-dropdown <?php if (strpos($_SERVER['REQUEST_URI'], "material") !== false){echo 'active'; } ?>"><a >จัดการวัตถุดิบ</a>
	<ul class="dropdown">
		<li><a href="../../chefs/view/all_raw_material.php"><span>วัตถุดิบทั้งหมด</span></a></li>
		<li><a href="../../chefs/view/add_raw_material.php"><span>เพิ่มวัตถุดิบ</span></a></li>
	</ul>
</li>
