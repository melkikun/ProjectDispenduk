window.onload=function(){
//	var elementBrandingArea=document.getElementById("brandingArea");
//	var elementContentArea=document.getElementById("contentArea");
//	var w=window.innerWidth-150
//	var width='width :' + w + 'px';
//	elementBrandingArea.setAttribute("style", width);
//	elementContentArea.setAttribute("style", width);
}

function bodyResizePerformed(){
//	var elementBrandingArea=document.getElementById("brandingArea");
//	var elementContentArea=document.getElementById("contentArea");
//	var w=window.innerWidth-150
//	var width='width :' + w + 'px';
//	elementBrandingArea.setAttribute("style", width);
//	elementContentArea.setAttribute("style", width);
}	

function doLogin(){
	var loginStatus="SUCCESS";
	
	if(loginStatus=="SUCCESS"){
		var element1=document.getElementById("linkSignin");
		var element2=document.getElementById("userStamp");
		
		var dispNone="display: none";
		element1.setAttribute("style", dispNone);
		var dispBlock="display: block";
		element2.setAttribute("style", dispBlock);
		
	}
}
function showUserMenu(){
	var element3=document.getElementById("userMenu");
	var dispBlock="display: block";
	element3.setAttribute("style", dispBlock);
}
function collapseUserMenu(){
	var element3=document.getElementById("userMenu");
	var dispNone="display: none";
	element3.setAttribute("style", dispNone);
}
function doLogout(){
	var element1=document.getElementById("linkSignin");
	var element2=document.getElementById("userStamp");
	
	collapseUserMenu();
	
	var dispNone="display: none";
	element2.setAttribute("style", dispNone);
	var dispBlock="display: block";
	element1.setAttribute("style", dispBlock);
}



/*--------- Helper Methods --------*/
//Object.prototype.getKeyByValue = function( value ) {
//    for( var prop in this ) {
//        if( this.hasOwnProperty( prop ) ) {
//             if( this[ prop ] === value )
//                 return prop;
//        }
//    }
//}