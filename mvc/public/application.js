function init() {

    var coll = document.getElementsByClassName("card-media");
    var i;
    // console.log(coll);
    // console.log(coll.length);
    for (i = 0; i < coll.length; i++) {
        coll[i].addEventListener("click", function () {
            var content = this.nextElementSibling;
            if (content.style.position === "absolute" || content.style.position.length == 0) {
                closeAllMovies();
                content.style.position = "relative";
                content.style.top = 0;
                content.style.left = 0;
                // console.log("hidden -> shown");

            } else {
                content.style.position = "absolute";
                content.style.top = "-9999px";
                content.style.left = "-9999px";
                // console.log("show -> hidden");
            }
        });
    }

    var random_btn = document.getElementById("random_movie");
    random_btn.addEventListener('click', GetRandomMovie);
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


function GetRandomMovie() {
    const cards = document.getElementsByClassName('card');
    let url = 'https://www.random.org/integers/?num=1&min=0&max=' + (cards.length - 1) + '&col=1&base=10&format=plain&rnd=new';
    let movie_remaining = -1;
    xhr = new XMLHttpRequest();
    xhr.open("GET", url, true); // deschidem conexiunea
    xhr.send(null); // trimitem cererea HTTP (nu expediem date)

    xhr.onload = function () {
        if (xhr.readyState === 4) { // am primit datele
            if (xhr.status === 200) { // raspuns Ok din partea serverului
                movie_remaining = xhr.responseText;
                console.log("Nu va if sters" + movie_remaining);
                eraseMovies(movie_remaining, cards);
            }
        }
    };
}

function eraseMovies(dont_erase, cards) {
    console.log("dont_erase = " + dont_erase);
    for (let k = 0; k < cards.length; k++) {
        console.log(k);
        // console.log(cards[k]);
        // cards[k].parentNode.removeChild(cards[k]);
        if (k != dont_erase) {
            cards[k].style.position = "absolute";
            cards[k].style.top = "-9999px";
            cards[k].style.left = "-9999px";
        }
    }
}

init();
