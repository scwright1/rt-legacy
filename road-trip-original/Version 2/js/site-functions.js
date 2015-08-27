//menu functions
function mouseOverMenu(menu, label){
    document.getElementById(menu).style.display = 'block';
    document.getElementById(label).style.backgroundColor = '#232323';
    document.getElementById(label).style.color = '#CCCCCC';
}

function mouseOutMenu(menu, label) {
    document.getElementById(menu).style.display = 'none';
    document.getElementById(label).style.backgroundColor = 'transparent';
    document.getElementById(label).style.color = '#AAAAAA';
}

//signup form open
function openSignupDialog() {
	$('#signup').dialog("open");
}

//logout functions (close shutter and disable search)
function closeShutter() {
    $('#page-wrapper').slideDown('slow');
    var searchBar = document.getElementById('searchInput');
    searchBar.setAttribute('disabled','disabled');
}
