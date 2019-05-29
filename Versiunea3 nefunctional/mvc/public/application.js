function init() {
    check_if_logged_in();
    document.getElementById("disconnectButton").addEventListener("click", ajax); 
    document.addEventListener('DOMContentLoaded', function(){
            let stars = document.querySelectorAll('.star');
            stars.forEach(function(star){
                star.addEventListener('click', setRating); 
            });
            
            let rating = parseInt(document.querySelector('.stars').getAttribute('data-rating'));
            let target = stars[rating - 1];
            target.dispatchEvent(new MouseEvent('click'));
        });
        function setRating(ev){
            let span = ev.currentTarget;
            let stars = document.querySelectorAll('.star');
            let match = false;
            let num = 0;
            stars.forEach(function(star, index){
                if(match){
                    star.classList.remove('rated');
                }else{
                    star.classList.add('rated');
                }
                //are we currently looking at the span that was clicked
                if(star === span){
                    match = true;
                    num = index + 1;
                }
            });
            document.querySelector('.stars').setAttribute('data-rating', num);
        }

        
        














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


    genres = ["Horror", "Thriller", "Comedy", "Drama", "Other"];
    for(var i = 0; i < genres.length; i++) {
        optiune_gen = document.getElementById(genres[i].toLowerCase())
        console.log(optiune_gen);
        optiune_gen.addEventListener("click", 
                                    function(theVar){
                                        return function(){select_category(theVar)};
                                    }(genres[i])); 
    }

}

function select_category(gen) {
    console.log("m-am activat");
    console.log(gen);
    var toClose = document.getElementsByClassName("card");
    for (var j = 0; j < toClose.length; j++) {
        toClose[j].style.position = "relative";
        toClose[j].style.top = 0;
        toClose[j].style.left = 0;

        var movie_genre = toClose[j].querySelector('#genre').textContent;
        movie_genre = movie_genre.trim();
        console.log(movie_genre);
        console.log(gen);
        var x = movie_genre == gen;
        console.log('----');
        if (!x) {
            toClose[j].style.position = "absolute";
            toClose[j].style.top = "-9999px";
            toClose[j].style.left = "-9999px";
        }
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



        

function ajax()
{
  var variable = new XMLHttpRequest();
  variable.open("GET","localhost/mvc/app/session_destroyer.php", false);
  variable.send();
  document.getElementById("p_logat").innerHTML = "0";
  check_if_logged_in();

}

function check_if_logged_in() {
    var logat = document.getElementById("p_logat").textContent;
    logat = parseInt(logat);
    console.log(logat);
    console.log("bbbb");

    if(logat)
    {
      document.getElementById("loginButton").style.display="none";
      document.getElementById("uploadButton").style.display="block";
      document.getElementById("registerButton").style.display="none";
      document.getElementById("disconnectButton").style.display="block";
    }
    else
    {
      document.getElementById("loginButton").style.display="block";
      document.getElementById("uploadButton").style.display="none";
      document.getElementById("registerButton").style.display="block";
      document.getElementById("disconnectButton").style.display="none";
    }
}

init();