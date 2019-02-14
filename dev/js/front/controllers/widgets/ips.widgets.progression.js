;( function($, _, undefined){
    "use strict";
    
    ips.controller.register('wowsuite.front.widgets.progression', {

        initialize: function() {
            this.on( document, 'contentChange', this.contentChange );
			this.setup();
        },

        contentChange: function () {
            var parent = document.getElementById("raid-table");
            var mythicKills = parent.getElementsByClassName("mythic");
            console.log("Fuck My Life: " + mythicKills.length);
            
            document.getElementById("uldir_mythic").textContent= mythicKills.length;
        }

    })
}(jQuery, _));