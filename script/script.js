document.getElementById('toggleSidebar').addEventListener('click', function() {
    const sidebar = document.getElementById('sidebar');
    sidebar.classList.toggle('active');

    const icons = document.querySelectorAll('.fa-street-view, .fa-home, .fa-puzzle-piece, .fa-question, .fa-id-badge, .fa-info, .fa-angle-left');
    icons.forEach(icon => {
        icon.classList.toggle('hide-icons');
        icon.classList.toggle('hide-arrow');
    });

    if (sidebar.classList.contains('active')) {
        overlay.classList.add('active')
    } else {
        overlay.classList.remove('active')
    }
});

/*tab links*/
function openAbout(evt, aboutnames) {
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
      tabcontent[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
      tablinks[i].className = tablinks[i].className.replace(" active", "");
    }
    document.getElementById(aboutnames).style.display = "block";
    evt.currentTarget.className += " active";
}

window.onload = function() {
    document.querySelector('.tablinks').click();
    openAbout(event, 'Mudah');
};