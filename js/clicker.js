function money_click(){
    text = document.getElementsByName('money')[0].innerHTML;
    words = text.split(" ");
    num = parseInt(words[0])+1;
    s_num = num.toString();
    document.getElementsByName('money')[0].innerHTML = s_num+" "
    +"<img src='img/money.png' alt='' width='200px' height='200px'></a>";
}

var myfunc = setInterval(function() {
    text = document.getElementsByName('money')[0].innerHTML;
    words = text.split(" ");
    num = parseInt(words[0])+1;
    s_num = num.toString();
    document.getElementsByName('money')[0].innerHTML = s_num+" "
    +"<img src='img/money.png' alt='' width='200px' height='200px'></a>";
}, 2000);