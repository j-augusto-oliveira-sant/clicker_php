function save_coins(val,id_val){
    $.post( 
        'save_coins.php', 
        { val: val, id: id_val}, 
        function( data ){  
    
            console.log("salvo "+data);
    
        });
}

window.onload = function() {
    if (window.jQuery) {  
        // jQuery is loaded  
        console.log("jquery loaded");
        //take coins
    } else {
        // jQuery is not loaded
        console.log("jquery not loaded");
    }
}

window.onbeforeunload = function () {
    //save before close
    var text = document.getElementsByName('money')[0].innerHTML;
    var words = text.split(" ");
    //userid
    var id = document.getElementById('user_pk').innerHTML;
    console.log(id);
    //ajax save
    save_coins(words[0],id);
};  


function money_click(){
    text = document.getElementsByName('money')[0].innerHTML;
    words = text.split(" ");
    num = parseInt(words[0])+1;
    s_num = num.toString();
    document.getElementsByName('money')[0].innerHTML = s_num
}

var myfunc = setInterval(function() {
    text = document.getElementsByName('money')[0].innerHTML;
    words = text.split(" ");
    num = parseInt(words[0])+1;
    s_num = num.toString();
    document.getElementsByName('money')[0].innerHTML = s_num
}, 2000);