window.onload = function(){
	ajaxrandompic();
}

function ajaxrandompic(){
//AJAX
	//loome ühenduse
	let xmlhttp = new XMLHttpRequest();
	//sõltuvalt päringu tulemusest tegutsen
	xmlhttp.onreadystatechange = function(){
		if(this.readyState == 4 && this.status == 200){
			//kui päring õnnestus ja tuli vastus
			//paneme keskmise hinde nähtavale :D :D 
			document.getElementById("pic").innerHTML = this.responseText;
		}
	}
	xmlhttp.open("GET", "addrandomphoto.php", true);
	xmlhttp.send();
	//AJAX lõppes

}