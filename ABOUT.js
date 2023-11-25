let section = document.querySelectorAll('section');

window.onscroll = () =>{
	sections.foreach(sec=>{
		let top = window.scrolly;
		let offset = sec.offsetTop - 150;
		let height = sec.offsetHeight;

		if (top >= offset && top < offset + height) {
			sec.classList.add('show-animate');
		}
		// 
		else {
			sec.classList.remove('show-animate');
		}
	})
}