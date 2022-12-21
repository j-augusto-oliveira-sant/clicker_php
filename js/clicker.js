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
    var text = document.getElementsByName('money')[0].innerHTML;
    var words = text.split(" ");
    var num = parseInt(words[0])+1;
    var s_num = num.toString();
    document.getElementsByName('money')[0].innerHTML = s_num
}

function take_text(name){
    var text = document.getElementsByName(name)[0].innerHTML;
    var words = text.split(" ");
    return words;
}


// Create the fish object
const fish = {
    images: ['img/fish3.png','img/fish2.png','img/fish1.png'],
    value: 500,
}
  
// Generate a random fish and display it on the screen
let currentFish;
function generateFish() {

    if (currentFish && currentFish.parentNode) {
        currentFish.parentNode.removeChild(currentFish);
    }

    const fishElement = document.createElement('img');
    
    const randomIndex = Math.floor(Math.random() * fish.images.length);
    const randomImage = fish.images[randomIndex];
    fishElement.src = randomImage;
    fishElement.width = 150;
    fishElement.className = 'fish_screen'
    fishElement.classList.add('fish');
    currentFish = fishElement;
  
    // Generate random x and y coordinates for the fish element
    const x = Math.random() * (window.innerWidth-200);
    const y = Math.random() * (window.innerHeight-100);
  
    // Set the position of the fish element using the random coordinates
    fishElement.style.position = 'absolute';
    fishElement.style.top = `${y}px`;
    fishElement.style.left = `${x}px`;
  
    document.body.appendChild(fishElement);
  
    // Add an event listener to the fish element that increases the player's fish currency when the fish is clicked
    fishElement.addEventListener('click', () => {
        const money = parseInt(take_text('money')[0]) + fish.value;
        document.getElementsByName('money')[0].innerHTML = money;
        fishElement.remove();
    });
}

const updateUI = () => {
    const fishermanNum = parseInt(take_text('fisherman')[0]);
    const boatNum = parseInt(take_text('boat')[0]);
    //se valor for 0 ou nulo valor = 0 else calcular
    const fishermanPrice = fishermanNum ? 500 * fishermanNum : 0;
    const boatPrice = boatNum ? 800 * boatNum : 0;
  
    console.log(`fisherman: ${fishermanPrice}`);
    console.log(`boat: ${boatPrice}`);
  
    const workersValue = fishermanNum * 5 + boatNum * 10;
    const valPerSecond = workersValue + 1;
    document.getElementsByName('val_per_second')[0].innerHTML = `${valPerSecond} <img src='img/up-arrow.png' width='20px' alt=''>`;
  
    const money = parseInt(take_text('money')[0]) + 1 + workersValue;
    document.getElementsByName('money')[0].innerHTML = money;
  
    const fishermanBtn = document.getElementsByName('fisherman')[0];
    if (money < fishermanPrice) {
        fishermanBtn.style = 'filter: grayscale(1.0);pointer-events:none;';
    } else {
        fishermanBtn.style = '';
    }
  
    const boatBtn = document.getElementsByName('boat')[0];
    if (money < boatPrice) {
        boatBtn.style = 'filter: grayscale(1.0);pointer-events:none;';
    } else {
        boatBtn.style = '';
    }
}
  
const myFunc = setInterval(updateUI, 2000);
setInterval(generateFish, 7000);