
	function Get_Cookie(name) {
	
		var start = document.cookie.indexOf(name + '=');
		var len = start + name.length + 1;
	
		if ((!start) && (name != document.cookie.substring(0,name.length)))
			return null;
		
		if (start == -1)
			return null;
	
		var end = document.cookie.indexOf(';',len);
	
		if (end == -1) end = document.cookie.length;
			return unescape(document.cookie.substring(len,end));
	}
	
	//名称，值，有效天数，路径，域，安全
	function Set_Cookie(name, value, expires, path, domain, secure) {
		
		// set time, it's in milliseconds
		var today = new Date();
		
		today.setTime( today.getTime() );
		
		/*
		if the expires variable is set, make the correct 
		expires time, the current script below will set 
		it for x number of days, to make it for hours, 
		delete * 24, for minutes, delete * 60 * 24
		*/
		
		if (expires){
			expires = expires * 1000 * 60 * 60 * 24;
		}
		
		//alert(expires);
		
		var expires_date = new Date( today.getTime() + (expires) );
		
		//alert(expires_date);
		
		document.cookie = name + "=" + escape( value ) +
			( ( expires ) ? ";expires=" + expires_date.toGMTString() : "" ) + 
			( ( path ) ? ";path=" + path : "" ) + 
			( ( domain ) ? ";domain=" + domain : "" ) +
			( ( secure ) ? ";secure" : "" );			
		
	}
	
	function Delete_Cookie(name,path,domain){
		
		if (Get_Cookie(name))
			document.cookie = 
				name + '=' +
				( (path) ? ';path=' + path : '') +
				( (domain) ? ';domain=' + domain : '') +
				';expires=Thu, 01-Jan-1970 00:00:01 GMT';
	}