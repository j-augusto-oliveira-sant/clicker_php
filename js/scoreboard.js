//PESQUISA USANDO AJAX E PHP | JOSÉ AUGUSTO
function take_names(str){
    let rows = document.getElementsByName('tr_rows');
    let elements = document.getElementsByName("td_name");
    let saved_rows = [];
    for (var i=0;i<elements.length;i++){
        element_text = elements[i].innerHTML;
        if (similarity(str,element_text) > 0.2){
          rows[i].style.display = "";
        } else {
          rows[i].style.display = "none";
        }
    }
}
  
function redisplay_all(){
    let rows = document.getElementsByName('tr_rows');
    for (var i=0;i<rows.length;i++){
      rows[i].style.display = "";
    }
}
  
function mostrarContatosSearch(str) {
      if (str.length == 0) {
        redisplay_all();
        return;
      } else {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
          if (this.readyState == 4 && this.status == 200) {
            take_names(str);
          }
        };
        xmlhttp.open("GET", "scoreboard.php?q=" + str, true);
        xmlhttp.send();
      }
}

//LEVSHTEIN CALCULUS
function similarity(s1, s2) {
  var longer = s1;
  var shorter = s2;
  if (s1.length < s2.length) {
    longer = s2;
    shorter = s1;
  }
  var longerLength = longer.length;
  if (longerLength == 0) {
    return 1.0;
  }
  return (longerLength - editDistance(longer, shorter)) / parseFloat(longerLength);
}

function editDistance(s1, s2) {
  s1 = s1.toLowerCase();
  s2 = s2.toLowerCase();

  var costs = new Array();
  for (var i = 0; i <= s1.length; i++) {
    var lastValue = i;
    for (var j = 0; j <= s2.length; j++) {
      if (i == 0)
        costs[j] = j;
      else {
        if (j > 0) {
          var newValue = costs[j - 1];
          if (s1.charAt(i - 1) != s2.charAt(j - 1))
            newValue = Math.min(Math.min(newValue, lastValue),
              costs[j]) + 1;
          costs[j - 1] = lastValue;
          lastValue = newValue;
        }
      }
    }
    if (i > 0)
      costs[s2.length] = lastValue;
  }
  return costs[s2.length];
}