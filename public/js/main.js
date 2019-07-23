window.onload = function(){
	document.querySelector('.boton').addEventListener('click', function(){
		document.querySelector('.sidebar').classList.toggle('invisible');
		this.classList.toggle('mif-chevron-right');
	});
}