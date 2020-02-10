function getErrorMessage($type)
{
	switch($type)
	{
		case "email_errorM":
			return "Email đăng nhập không hợp lệ";
			break;
		case "password_errorM":
			return "Mật khẩu không hợp lệ";
			break;
		case "repassword_errorM":
			return "Xác nhận mật khẩu không hợp lệ";
			break;
		case "fullname_errorM":
			return "Vui lòng nhập họ tên";
			break;
		case "address_errorM":
			return "Vui lòng nhập địa chỉ";
			break;
		case "birthday_errorM":
			return "Ngày sinh sai định dạng";
			break;
		case "mobile_errorM":
			return "Vui lòng nhập số điện thoại";
			break;
		case "province_errorM":
			return "Vui lòng chọn tỉnh thành";
			break;
		default:
			return "Vui lòng nhập đầy đủ thông tin";
	}
}


function checkValidate()
{
	$("form._check_validate button").click(function() {
		error_none = false;
		error_ele = new Array();
	
		$("form._check_validate div.errorMessage").remove();
		$("form._check_validate ._required").each(function() {
								 
			val_ele = $(this).val();

			//xoa bo ky tu rong
			while (val_ele.indexOf(" ") != -1)
			{
				val_ele = val_ele.replace(" ", "");
			}
			
			//neu null bao gan loi
			if(!val_ele)
			{
				error_none = true;
				error_ele[error_ele.length] = this;
				
				parent_dl = $(this).parent();
				check_has = parent_dl.children().filter('.errorMessage');
				if (check_has.length < 1)
				{
					$('<div class="errorMessage"></div>').text(getErrorMessage($(this).attr("message_id"))).appendTo(parent_dl);
				}
			}
		});
		
		//thong bao
		if(error_none == true)
		{
			$(error_ele[0]).focus();
			return false;
		}
		else
		{
			return true;
		}

	});
}

function onlyNum()
{
	if (event.keyCode < 48 || event.keyCode > 57 ) {
		event.preventDefault();
	}
}

function addCommas(obj)
{
	var $this = $(obj);
  	var num = $this.val().replace(/,/gi, "").split("").reverse().join("");

		var num2 = RemoveRougeChar(num.replace(/(.{3})/g,"$1,").split("").reverse().join(""));

  	// the following line has been simplified. Revision history contains original.
  	$this.val(num2);
}

function RemoveRougeChar(convertString){
    
	if(convertString.substring(0,1) == ",")
    {
    	return convertString.substring(1, convertString.length)
	}
	
	return convertString;
}

function getCatPrice(obj, obj1, obj2, url_str)
{
	$.ajax({
	  method: "GET",
	  url: url_str,
	  data: { kind_id: $(obj).val() },
	  success: function(data) {
		  arr_ddl = data.split("|");
		  $(obj1).html(arr_ddl[0]);
		  $(obj2).html(arr_ddl[1]);
		  },
	});
}