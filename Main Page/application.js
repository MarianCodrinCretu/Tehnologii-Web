function init() {

    var coll = document.getElementsByClassName("card-media");
    var i;
    console.log(coll);
    console.log(coll.length);
    for (i = 0; i < coll.length; i++) {
        coll[i].addEventListener("click", function() {
            var content = this.nextElementSibling;
            if (content.style.position === "absolute" || content.style.position.length == 0) {
                closeAllMovies();
                content.style.position = "relative";
                content.style.top = 0;
                content.style.left = 0;
                console.log("hidden -> shown");

            } else {
                content.style.position = "absolute";
                content.style.top = "-9999px";
                content.style.left = "-9999px";
                console.log("show -> hidden");
            }
        });
    }
}

function closeAllMovies() {
    var toClose = document.getElementsByClassName("card-body");

    var j;
    for (j = 0; j < toClose.length; j++) {
        toClose[j].style.position = "absolute";
        toClose[j].style.top = "-9999px";
        toClose[j].style.left = "-9999px";
    }
}

init();
