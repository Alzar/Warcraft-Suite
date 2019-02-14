
document.addEventListener("DOMContentLoaded", function(event) { 
    document.querySelectorAll('.raid-table').forEach(function(parent) {
        var mythicKills = parent.getElementsByClassName("mythic");
        var heroicKills = parent.getElementsByClassName("heroic");
        var normalKills = parent.getElementsByClassName("normal");
    
    
        console.log("Fuck My Life: " + mythicKills.length);
        
        document.getElementById("uldir_mythic").textContent= mythicKills.length;
        document.getElementById("uldir_heroic").textContent= heroicKills.length;
        document.getElementById("uldir_normal").textContent= normalKills.length;
      });
  });