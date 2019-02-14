/*
*	Guild Rank JavaScript by Alzar
*
*	Simply change this code with the id name of where you'd
*	like your rank to be display on your website. This has
*	a check to set the output to -- if you guild isn't ranked
*/

jQuery(document).ready(function() {

	var $ = jQuery;
	//var i = Math.floor(Math.random() * (header_images.length-1));
	//var header = $('#t3-header .row');
	
	var header = $('.rank-header');
	
	

	header.append('<div class="realmRank"></div>');
	
	
	var header_rank = $('.realmRank');
	
	function get_rank(cb) {
		var wow_rank = false;
		
		if(localStorage.wow_rank) {
			try {
				wow_rank = $.parseJSON(localStorage.wow_rank);
			} catch(e) {
				console.error(e);
				localStorage.removeItem('wow_rank');
			}
		}
		
		if(wow_rank && wow_rank.data && (new Date().getTime() < wow_rank.time)) {
			cb(wow_rank.data);
			return;
		}

		//if(Cookies.get('wow_rank')) {
			//cb($.parseJSON(Cookies.get('wow_rank')));
		//} else {
			$.ajax({
			  dataType: "json",
			  cache: true,
			  url: "/wowprogress.php",
			  data: "",
			  success: function(data) {
				  localStorage.setItem('wow_rank', JSON.stringify({time: (new Date().getTime() + 15*60*1000), data: data}));
				  //Cookies.set('wow_rank', data, { expires: new Date((new Date().getTime() + 15*60*1000)) });
				  cb(data);
			  }
			});
		//}
	}
	
	get_rank(function(data) {
		//console.log(data);
		header_rank.html('<a href="http://www.wowprogress.com/guild/us/echo-isles/Nebula" title="Nebula on WoWProgress" target="_blank"><span id="rankTitle">realm rank: </span><ul id="rankNumber">' + data.realm_rank + '</ul></a>')
	});
	

});