var acc = document.getElementsByClassName("accordion");
var panel = document.getElementsByClassName("panel");
// var acc = document.getElementsByTagName("body");
var i;
/* Open when someone clicks on the span element */
function openNavFilter() {
    document.getElementById("myNav").style.width = "25%";
    // for (i = 0; i < acc.length; i++) {

    //     /* Toggle between adding and removing the "active" class,
    //     to highlight the button that controls the panel */
    //     acc[i].classList.toggle("active");

    //     var panel = acc[i].nextElementSibling;
    //     // panel.style.display = "block";
    // }
}

/* Close when someone clicks on the "x" symbol inside the overlay */
function closeNavFilter() {
    document.getElementById("myNav").style.width = "0%";
}

// --------


for (i = 0; i < acc.length; i++) {
    acc[i].addEventListener("click", function () {
        /* Toggle between adding and removing the "active" class,
        to highlight the button that controls the panel */
        this.classList.toggle("active");

        /* Toggle between hiding and showing the active panel */
        var panel = this.nextElementSibling;
        if (panel.style.display === "block") {
            panel.style.display = "none";
        } else {
            panel.style.display = "block";
        }
    });
}


for (i = 0; i < acc.length; i++) {
    acc[i].addEventListener("click", function () {
        this.classList.toggle("active");
        var panel = this.nextElementSibling;
        if (panel.style.maxHeight) {
            panel.style.maxHeight = null;
        } else {
            panel.style.maxHeight = panel.scrollHeight + "px";
        }
    });
}
