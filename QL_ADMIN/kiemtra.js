function kiemtra() {
	var ten_KH = document.getElementById("idName");
	var email_KH = document.getElementById("idEmail");
	var diachi_KH = document.getElementById("idAddress");
	var so_dien_thoai_KH = document.getElementById("idPhone");
	var mat_khau_KH = document.getElementById("idPassword");
	if (ten_KH.value == "") {
		alert("Nhập tên khách hàng");
		ten_KH.focus();
		return false;
	}
	if (email_KH.value == "") {
		alert("Nhập email khách hàng");
		email_KH.focus();
		return false;
	}
	if (diachi_KH.value == "") {
		alert("Nhập địa chỉ khách");
		diachi_KH.focus();
		return false;
	}
	if (so_dien_thoai_KH.value == "") {
		alert("Nhap nhập số điện thoại khách hàng");
		so_dien_thoai_KH.focus();
		return false;
	}
	if (mat_khau_KH.value == null) {
		alert("Nhập mật khẩu");
		mat_khau_KH.focus();
		return false;
	}
	if (ten_KH.value != "" && email_KH.value != "" && diachi_KH.value != "" && so_dien_thoai_KH!="" && mat_khau_KH!="") {
		return true;
	}
}