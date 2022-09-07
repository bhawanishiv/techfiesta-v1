function gsac()
{
	document.getElementById('gsac').style.display='inline';
	document.getElementById('technical').style.display='none';
	document.querySelector('.anchor1').style.color = 'white';
	document.querySelector('.anchor2').style.color = 'green';
	
}

function tech()
{
	document.getElementById('gsac').style.display='none',
	document.getElementById('technical').style.display='inline';
	document.querySelector('.anchor3').style.color = 'green';
	document.querySelector('.anchor4').style.color = 'white';
}

