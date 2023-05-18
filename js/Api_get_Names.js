let Imm = document.querySelector("#Imm") ;
let Num_appar = document.querySelector("#Num_apar");
let Nom = document.querySelector("#Nomf");
let Money = document.querySelector("#Money");

function Get_Names_by_Imm(Imm) {
        if (Imm.length == 0) {
          return;
        } else {
          var xmlhttp = new XMLHttpRequest();
          xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
  

              var request = new XMLHttpRequest();
                request.open('GET', '../json/List_Names_by_Imm.json', true);
                request.onreadystatechange = function() {
                  if (request.readyState === 4 && request.status === 200) {
                    var data = JSON.parse(request.responseText);
                    // Use the data from the JSON file
                    data.forEach(element => {
                      Nom.innerHTML +="<option value>"+element["user_username"]+"</option>";
                     
                    });
                  }
                };
                request.send();
              
            }
          };
          xmlhttp.open("GET", `../include/api_get_data.php?token=A123123&Imm=${Imm}`, true);
          xmlhttp.send();
        }
      }

Imm.addEventListener("click",function(){
  Get_Names_by_Imm(Imm.value) 
})

