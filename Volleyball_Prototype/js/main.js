function togglePopup() {
    let popup = document.getElementById("popup");
    let container = document.getElementById("blur");
    popup.classList.toggle("visible");
    container.classList.toggle('blurred');
}



var viewSearchInput = document.getElementById("viewSearch");
if (viewSearchInput) {

    // Search function for view player.
    // Filters through players by looking for text matches
    document.getElementById("viewSearch").addEventListener("input", function(){
        var input = this.value.toLowerCase();
        var players = document.getElementsByClassName("player-container");

        for(var i=0; i< players.length;i++){
            var playerName = players[i].querySelector(".playerName").innerText.toLowerCase();
            if(playerName.indexOf(input) > -1){
                players[i].style.display = "";
            }else{
                players[i].style.display = "none"
            }
        }
    });
}

var teamSearchInput = document.getElementById("teamSearch");
if (teamSearchInput) {
    document.getElementById("teamSearch").addEventListener("input", function(){
        var input = this.value.toLowerCase();
        var players = document.getElementsByClassName("player-container");
        
        for(var i=0; i< players.length;i++){
            var playerName = players[i].querySelector(".checkPlayer").nextSibling.textContent.toLowerCase();
            if(playerName.indexOf(input) > -1){
                players[i].style.display = "";
            }else{
                players[i].style.display = "none"
            }
        }
    });
}
//Selects all of the checkboxes when select all checkbox is checked
function calc()
{  
    
    var selectedNum = document.getElementById("selected-number");
    if (document.getElementById('checkAll').checked) 
    {

        var players = document.getElementsByClassName("checkPlayer");

        for(var i=0; i< players.length;i++){
            players[i].checked = true;
            //Updates the selected number accordingly.
            selectedNum.innerHTML = players.length;
        }
    } else {
        var players = document.getElementsByClassName("checkPlayer");

        for(var i=0; i< players.length;i++){
            players[i].checked = false;
             //Updates the selected number accordingly.
            selectedNum.innerHTML = 0;
        }
    }
}

//Displays the number of players selected

var selectedNum = document.getElementById("selected-number");

if(selectedNum){

    
    
    var players = document.getElementsByClassName("checkPlayer");
    for(var i=0; i< players.length;i++){
        players[i].addEventListener('change', function(){
            var total = selectedNum.innerHTML;
            if(this.checked){
                total++;
            } else{
                total--;
            }
            selectedNum.innerHTML = total;

        });
      }
}

//Nav burger event listener

const hamburger = document.querySelector(".hamburger");
const nav = document.getElementById("header-nav");

hamburger.addEventListener("click", () => {
    hamburger.classList.toggle("active");
    nav.classList.toggle("active");
    console.log("hi");
})

document.querySelectorAll
