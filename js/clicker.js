function fisherman_click(){
    text = document.getElementsByName('fisherman')[0].innerHTML;
    words = text.split(" ");
    num = parseInt(words[0])+1;
    s_num = num.toString();
    document.getElementsByName('fisherman')[0].innerHTML = s_num+" "
    +"<img src='img/fisherman.png' alt='' width='200px' height='200px'></a>";
}

var myfunc = setInterval(function() {
    text = document.getElementsByName('fisherman')[0].innerHTML;
    words = text.split(" ");
    num = parseInt(words[0])+1;
    s_num = num.toString();
    document.getElementsByName('fisherman')[0].innerHTML = s_num+" "
    +"<img src='img/fisherman.png' alt='' width='200px' height='200px'></a>";
}, 2000);