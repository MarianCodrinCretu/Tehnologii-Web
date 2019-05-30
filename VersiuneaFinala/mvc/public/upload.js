var feedback = function(res) {
    if (res.success === true) {
        var get_link = res.data.link.replace(/^http:\/\//i, 'https://');
        document.querySelector('.status').classList.add('bg-success');
        document.querySelector('.status').innerHTML = '<input type="text" style="width: 906px;" name="imagine" id="image" required value=\"' + get_link + '\"/>';

//            '' + '<br><input class="image-url" value=\"' + get_link + '\"/>';
    }
};

new Imgur({
    clientid: '25c6b55d7573afc', //You can change this ClientID
    callback: feedback
});