$(document).ready ( function(){
	
	$("#raidProgFunction").accordion({ active: 0 });
	
	//Resetting variables to fix an issue with the tracking when using pagination options on homepage.
	raid_en = 0;
	raid_en_normal = 0;
	raid_en_heroic = 0;
	raid_en_mythic = 0;
	/* Emerald Nightmare Tracking Logic Starts */
  if(raid_en_boss1) 
  {
  	if(raid_en_boss1_normal)
    {
      {$("#en_boss_1_status").text("Normal");};
      var en_boss_1_status = document.getElementById("en_boss_1_status");
      en_boss_1_status.classList.add("downed_normal");
      raid_en_normal++;
    }
    if (raid_en_boss1_heroic)
    {
      {$("#en_boss_1_status").text("Heroic");};
      var en_boss_1_status = document.getElementById("en_boss_1_status");
      en_boss_1_status.classList.add("downed_heroic");
      raid_en_heroic++;
    }
    if (raid_en_boss1_mythic)
    {
      {$("#en_boss_1_status").text("Mythic");};
      var en_boss_1_status = document.getElementById("en_boss_1_status");
      en_boss_1_status.classList.add("downed_mythic");
      raid_en_mythic++;
    }
    
    if (raid_en_boss1Video !== "")
    {
      var enBoss1Video = document.getElementById("en_boss_1_video").href = raid_en_boss1Video;
      var enBoss1VideoImg = document.getElementById("en_boss_1").getElementsByClassName("bossVideoImg")[0];
      enBoss1VideoImg.src=("/Custom/Raids/hasVideo.png");
      enBoss1VideoImg.setAttribute("title", "Boss Kill Video Available!");
      enBoss1VideoImg.removeAttribute("onclick");
    }
    
    raid_en++;
  }
  
  if(raid_en_boss2) 
  {
  	if(raid_en_boss2_normal)
    {
      {$("#en_boss_2_status").text("Normal");};
      var en_boss_2_status = document.getElementById("en_boss_2_status");
      en_boss_2_status.classList.add("downed_normal");
      raid_en_normal++;
      

    }
    if (raid_en_boss2_heroic)
    {
      {$("#en_boss_2_status").text("Heroic");};
      var en_boss_2_status = document.getElementById("en_boss_2_status");
      en_boss_2_status.classList.add("downed_heroic");
      raid_en_heroic++;
      

    }
    if (raid_en_boss2_mythic)
    {
      {$("#en_boss_2_status").text("Mythic");};
      var en_boss_2_status = document.getElementById("en_boss_2_status");
      en_boss_2_status.classList.add("downed_mythic");
      raid_en_mythic++;
    }
    
    if (raid_en_boss2Video !== "")
    {
      var enBoss2Video = document.getElementById("en_boss_2_video").href = raid_en_boss2Video;
      var enBoss2VideoImg = document.getElementById("en_boss_2").getElementsByClassName("bossVideoImg")[0];
      enBoss2VideoImg.src=("/Custom/Raids/hasVideo.png");
      enBoss2VideoImg.setAttribute("title", "Boss Kill Video Available!");
      enBoss2VideoImg.removeAttribute("onclick");
    } 
    raid_en++;
  }
  
  if(raid_en_boss3) 
  {
  	if(raid_en_boss3_normal)
    {
      {$("#en_boss_3_status").text("Normal");};
      var en_boss_3_status = document.getElementById("en_boss_3_status");
      en_boss_3_status.classList.add("downed_normal");
      raid_en_normal++;
    }
    if (raid_en_boss3_heroic)
    {
      {$("#en_boss_3_status").text("Heroic");};
      var en_boss_3_status = document.getElementById("en_boss_3_status");
      en_boss_3_status.classList.add("downed_heroic");
      raid_en_heroic++;
    }
    if (raid_en_boss3_mythic)
    {
      {$("#en_boss_3_status").text("Mythic");};
      var en_boss_3_status = document.getElementById("en_boss_3_status");
      en_boss_3_status.classList.add("downed_mythic");
      raid_en_mythic++;
    }
    
    if (raid_en_boss3Video !== "")
    {
      var enBoss3Video = document.getElementById("en_boss_3_video").href = raid_en_boss3Video;
      var enBoss3VideoImg = document.getElementById("en_boss_3").getElementsByClassName("bossVideoImg")[0];
      enBoss3VideoImg.src=("/Custom/Raids/hasVideo.png");
      enBoss3VideoImg.setAttribute("title", "Boss Kill Video Available!");
      enBoss3VideoImg.removeAttribute("onclick");
    }
    raid_en++;
  }
  
  if(raid_en_boss4) 
  {
  	if(raid_en_boss4_normal)
    {
      {$("#en_boss_4_status").text("Normal");};
      var en_boss_4_status = document.getElementById("en_boss_4_status");
      en_boss_4_status.classList.add("downed_normal");
      raid_en_normal++;
    }
    if (raid_en_boss4_heroic)
    {
      {$("#en_boss_4_status").text("Heroic");};
      var en_boss_4_status = document.getElementById("en_boss_4_status");
      en_boss_4_status.classList.add("downed_heroic");
      raid_en_heroic++;
    }
    if (raid_en_boss4_mythic)
    {
      {$("#en_boss_4_status").text("Mythic");};
      var en_boss_4_status = document.getElementById("en_boss_4_status");
      en_boss_4_status.classList.add("downed_mythic");
      raid_en_mythic++;
    }
    
    if (raid_en_boss4Video !== "")
    {
      var enBoss4Video = document.getElementById("en_boss_4_video").href = raid_en_boss4Video;
      var enBoss4VideoImg = document.getElementById("en_boss_4").getElementsByClassName("bossVideoImg")[0];
      enBoss4VideoImg.src=("/Custom/Raids/hasVideo.png");
      enBoss4VideoImg.setAttribute("title", "Boss Kill Video Available!");
      enBoss4VideoImg.removeAttribute("onclick");
    }   
    raid_en++;
  }
  
  if(raid_en_boss5) 
  {
  	if(raid_en_boss5_normal)
    {
      {$("#en_boss_5_status").text("Normal");};
      var en_boss_5_status = document.getElementById("en_boss_5_status");
      en_boss_5_status.classList.add("downed_normal");
      raid_en_normal++;
    }
    if (raid_en_boss5_heroic)
    {
      {$("#en_boss_5_status").text("Heroic");};
      var en_boss_5_status = document.getElementById("en_boss_5_status");
      en_boss_5_status.classList.add("downed_heroic");
      raid_en_heroic++;
    }
    if (raid_en_boss5_mythic)
    {
      {$("#en_boss_5_status").text("Mythic");};
      var en_boss_5_status = document.getElementById("en_boss_5_status");
      en_boss_5_status.classList.add("downed_mythic");
      raid_en_mythic++;
    }
    
    if (raid_en_boss5Video !== "")
    {
      var enBoss5Video = document.getElementById("en_boss_5_video").href = raid_en_boss5Video;
      var enBoss5VideoImg = document.getElementById("en_boss_5").getElementsByClassName("bossVideoImg")[0];
      enBoss5VideoImg.src=("/Custom/Raids/hasVideo.png");
      enBoss5VideoImg.setAttribute("title", "Boss Kill Video Available!");
      enBoss5VideoImg.removeAttribute("onclick");
    }   
    raid_en++;
  }
  
    if(raid_en_boss6) 
  {
  	if(raid_en_boss6_normal)
    {
      {$("#en_boss_6_status").text("Normal");};
      var en_boss_6_status = document.getElementById("en_boss_6_status");
      en_boss_6_status.classList.add("downed_normal");
      raid_en_normal++;
    }
    if (raid_en_boss6_heroic)
    {
      {$("#en_boss_6_status").text("Heroic");};
      var en_boss_6_status = document.getElementById("en_boss_6_status");
      en_boss_6_status.classList.add("downed_heroic");
      raid_en_heroic++;
    }
    if (raid_en_boss6_mythic)
    {
      {$("#en_boss_6_status").text("Mythic");};
      var en_boss_6_status = document.getElementById("en_boss_6_status");
      en_boss_6_status.classList.add("downed_mythic");
      raid_en_mythic++;
    }
    
    if (raid_en_boss6Video !== "")
    {
      var enBoss6Video = document.getElementById("en_boss_6_video").href = raid_en_boss6Video;
      var enBoss6VideoImg = document.getElementById("en_boss_6").getElementsByClassName("bossVideoImg")[0];
      enBoss6VideoImg.src=("/Custom/Raids/hasVideo.png");
      enBoss6VideoImg.setAttribute("title", "Boss Kill Video Available!");
      enBoss6VideoImg.removeAttribute("onclick");
    } 
    raid_en++;
  }
  
  if(raid_en_boss7) 
  {
  	if(raid_en_boss7_normal)
    {
      {$("#en_boss_7_status").text("Normal");};
      var en_boss_7_status = document.getElementById("en_boss_7_status");
      en_boss_7_status.classList.add("downed_normal");
      raid_en_normal++;
    }
    if (raid_en_boss7_heroic)
    {
      {$("#en_boss_7_status").text("Heroic");};
      var en_boss_7_status = document.getElementById("en_boss_7_status");
      en_boss_7_status.classList.add("downed_heroic");
      raid_en_heroic++;
    }
    if (raid_en_boss7_mythic)
    {
      {$("#en_boss_7_status").text("Mythic");};
      var en_boss_7_status = document.getElementById("en_boss_7_status");
      en_boss_7_status.classList.add("downed_mythic");
      raid_en_mythic++;
    }
    
    if (raid_en_boss7Video !== "")
    {
      var enBoss7Video = document.getElementById("en_boss_7_video").href = raid_en_boss7Video;
      var enBoss7VideoImg = document.getElementById("en_boss_7").getElementsByClassName("bossVideoImg")[0];
      enBoss7VideoImg.src=("/Custom/Raids/hasVideo.png");
      enBoss7VideoImg.setAttribute("title", "Boss Kill Video Available!");
      enBoss7VideoImg.removeAttribute("onclick");
    }
    raid_en++;
  }
  
  /* Emerald Nightmare Tracking Logic Ends */
  
  raid_en_comp = raid_en/raid_en_size;
  raid_en_comp *= 100;
  
  raid_en_comp_normal = raid_en_normal/raid_en_size;
  raid_en_comp_normal *= 100;
  var raid_en_comp_fill_normal = document.getElementById("raid_en_comp_normal");
  raid_en_comp_fill_normal.setAttribute("style", "width: "+raid_en_comp_normal+"%");
  
  raid_en_comp_heroic = raid_en_heroic/raid_en_size;
  raid_en_comp_heroic *= 100;
  var raid_en_comp_fill_heroic = document.getElementById("raid_en_comp_heroic");
  raid_en_comp_fill_heroic.setAttribute("style", "width: "+raid_en_comp_heroic+"%");
  
  raid_en_comp_mythic = raid_en_mythic/raid_en_size;
  raid_en_comp_mythic *= 100;
  var raid_en_comp_fill_mythic = document.getElementById("raid_en_comp_mythic");
  raid_en_comp_fill_mythic.setAttribute("style", "width: "+raid_en_comp_mythic+"%");
  
  
  {$("#en_boss_kill_count_normal").text(raid_en_normal);};
  {$("#en_boss_kill_count_heroic").text(raid_en_heroic);};
  {$("#en_boss_kill_count_mythic").text(raid_en_mythic);};
//------------------------------------------------------------------------------------------------------------------------------------------------------------
//------------------------------------------------------------------------------------------------------------------------------------------------------------
//------------------------------------------------------------------------------------------------------------------------------------------------------------
//------------------------------------------------------------------------------------------------------------------------------------------------------------
//------------------------------------------------------------------------------------------------------------------------------------------------------------
  
  //Resetting variables to fix an issue with the tracking when using pagination options on homepage.
  	raid_tov = 0;
	raid_tov_normal = 0;
	raid_tov_heroic = 0;
	raid_tov_mythic = 0;
  /* Trial of Valor Tracking Logic Starts */
  if(raid_tov_boss1) 
  {
  	if(raid_tov_boss1_normal)
    {
      {$("#tov_boss_1_status").text("Normal");};
      var tov_boss_1_status = document.getElementById("tov_boss_1_status");
      tov_boss_1_status.classList.add("downed_normal");
      raid_tov_normal++;
    }
    if (raid_tov_boss1_heroic)
    {
      {$("#tov_boss_1_status").text("Heroic");};
      var tov_boss_1_status = document.getElementById("tov_boss_1_status");
      tov_boss_1_status.classList.add("downed_heroic");
      raid_tov_heroic++;
    }
    if (raid_tov_boss1_mythic)
    {
      {$("#tov_boss_1_status").text("Mythic");};
      var tov_boss_1_status = document.getElementById("tov_boss_1_status");
      tov_boss_1_status.classList.add("downed_mythic");
      raid_tov_mythic++;
    }
    
    if (raid_tov_boss1Video !== "")
    {
      var tovBoss1Video = document.getElementById("tov_boss_1_video").href = raid_tov_boss1Video;
      var tovBoss1VideoImg = document.getElementById("tov_boss_1").getElementsByClassName("bossVideoImg")[0];
      tovBoss1VideoImg.src=("/Custom/Raids/hasVideo.png");
      tovBoss1VideoImg.setAttribute("title", "Boss Kill Video Available!");
      tovBoss1VideoImg.removeAttribute("onclick");
    }
    
    raid_tov++;
  }
  
  if(raid_tov_boss2) 
  {
  	if(raid_tov_boss2_normal)
    {
      {$("#tov_boss_2_status").text("Normal");};
      var tov_boss_2_status = document.getElementById("tov_boss_2_status");
      tov_boss_2_status.classList.add("downed_normal");
      raid_tov_normal++;
      

    }
    if (raid_tov_boss2_heroic)
    {
      {$("#tov_boss_2_status").text("Heroic");};
      var tov_boss_2_status = document.getElementById("tov_boss_2_status");
      tov_boss_2_status.classList.add("downed_heroic");
      raid_tov_heroic++;
      

    }
    if (raid_tov_boss2_mythic)
    {
      {$("#tov_boss_2_status").text("Mythic");};
      var tov_boss_2_status = document.getElementById("tov_boss_2_status");
      tov_boss_2_status.classList.add("downed_mythic");
      raid_tov_mythic++;
    }
    
    if (raid_tov_boss2Video !== "")
    {
      var tovBoss2Video = document.getElementById("tov_boss_2_video").href = raid_tov_boss2Video;
      var tovBoss2VideoImg = document.getElementById("tov_boss_2").getElementsByClassName("bossVideoImg")[0];
      tovBoss2VideoImg.src=("/Custom/Raids/hasVideo.png");
      tovBoss2VideoImg.setAttribute("title", "Boss Kill Video Available!");
      tovBoss2VideoImg.removeAttribute("onclick");
    } 
    raid_tov++;
  }
  
  if(raid_tov_boss3) 
  {
  	if(raid_tov_boss3_normal)
    {
      {$("#tov_boss_3_status").text("Normal");};
      var tov_boss_3_status = document.getElementById("tov_boss_3_status");
      tov_boss_3_status.classList.add("downed_normal");
      raid_tov_normal++;
    }
    if (raid_tov_boss3_heroic)
    {
      {$("#tov_boss_3_status").text("Heroic");};
      var tov_boss_3_status = document.getElementById("tov_boss_3_status");
      tov_boss_3_status.classList.add("downed_heroic");
      raid_tov_heroic++;
    }
    if (raid_tov_boss3_mythic)
    {
      {$("#tov_boss_3_status").text("Mythic");};
      var tov_boss_3_status = document.getElementById("tov_boss_3_status");
      tov_boss_3_status.classList.add("downed_mythic");
      raid_tov_mythic++;
    }
    
    if (raid_tov_boss3Video !== "")
    {
      var tovBoss3Video = document.getElementById("tov_boss_3_video").href = raid_tov_boss3Video;
      var tovBoss3VideoImg = document.getElementById("tov_boss_3").getElementsByClassName("bossVideoImg")[0];
      tovBoss3VideoImg.src=("/Custom/Raids/hasVideo.png");
      tovBoss3VideoImg.setAttribute("title", "Boss Kill Video Available!");
      tovBoss3VideoImg.removeAttribute("onclick");
    }
    raid_tov++;
  }
  
  raid_tov_comp = raid_tov/raid_tov_size;
  raid_tov_comp *= 100;
  
  raid_tov_comp_normal = raid_tov_normal/raid_tov_size;
  raid_tov_comp_normal *= 100;
  var raid_tov_comp_fill_normal = document.getElementById("raid_tov_comp_normal");
  raid_tov_comp_fill_normal.setAttribute("style", "width: "+raid_tov_comp_normal+"%");
  
  raid_tov_comp_heroic = raid_tov_heroic/raid_tov_size;
  raid_tov_comp_heroic *= 100;
  var raid_tov_comp_fill_heroic = document.getElementById("raid_tov_comp_heroic");
  raid_tov_comp_fill_heroic.setAttribute("style", "width: "+raid_tov_comp_heroic+"%");
  
  raid_tov_comp_mythic = raid_tov_mythic/raid_tov_size;
  raid_tov_comp_mythic *= 100;
  var raid_tov_comp_fill_mythic = document.getElementById("raid_tov_comp_mythic");
  raid_tov_comp_fill_mythic.setAttribute("style", "width: "+raid_tov_comp_mythic+"%");
  
  
  {$("#tov_boss_kill_count_normal").text(raid_tov_normal);};
  {$("#tov_boss_kill_count_heroic").text(raid_tov_heroic);};
  {$("#tov_boss_kill_count_mythic").text(raid_tov_mythic);};
  
//------------------------------------------------------------------------------------------------------------------------------------------------------------
//------------------------------------------------------------------------------------------------------------------------------------------------------------
//------------------------------------------------------------------------------------------------------------------------------------------------------------
//------------------------------------------------------------------------------------------------------------------------------------------------------------
//------------------------------------------------------------------------------------------------------------------------------------------------------------  

//Resetting variables to fix an issue with the tracking when using pagination options on homepage.
  	raid_tn = 0;
	raid_tn_normal = 0;
	raid_tn_heroic = 0;
	raid_tn_mythic = 0;
      /* The Nighthold Tracking Logic Starts */
    if(raid_tn_boss1) 
  {
  	if(raid_tn_boss1_normal)
    {
      {$("#tn_boss_1_status").text("Normal");};
      var tn_boss_1_status = document.getElementById("tn_boss_1_status");
      tn_boss_1_status.classList.add("downed_normal");
      raid_tn_normal++;
    }
    if (raid_tn_boss1_heroic)
    {
      {$("#tn_boss_1_status").text("Heroic");};
      var tn_boss_1_status = document.getElementById("tn_boss_1_status");
      tn_boss_1_status.classList.add("downed_heroic");
      raid_tn_heroic++;
    }
    if (raid_tn_boss1_mythic)
    {
      {$("#tn_boss_1_status").text("Mythic");};
      var tn_boss_1_status = document.getElementById("tn_boss_1_status");
      tn_boss_1_status.classList.add("downed_mythic");
      raid_tn_mythic++;
    }
    
    if (raid_tn_boss1Video !== "")
    {
      var tnBoss1Video = document.getElementById("tn_boss_1_video").href = raid_tn_boss1Video;
      var tnBoss1VideoImg = document.getElementById("tn_boss_1").getElementsByClassName("bossVideoImg")[0];
      tnBoss1VideoImg.src=("/Custom/Raids/hasVideo.png");
      tnBoss1VideoImg.setAttribute("title", "Boss Kill Video Available!");
      tnBboss1VideoImg.removeAttribute("onclick");
    }
    
    raid_tn++;
  }
  
      if(raid_tn_boss2) 
  {
  	if(raid_tn_boss2_normal)
    {
      {$("#tn_boss_2_status").text("Normal");};
      var tn_boss_2_status = document.getElementById("tn_boss_2_status");
      tn_boss_2_status.classList.add("downed_normal");
      raid_tn_normal++;
      

    }
    if (raid_tn_boss2_heroic)
    {
      {$("#tn_boss_2_status").text("Heroic");};
      var tn_boss_2_status = document.getElementById("tn_boss_2_status");
      tn_boss_2_status.classList.add("downed_heroic");
      raid_tn_heroic++;
      

    }
    if (raid_tn_boss2_mythic)
    {
      {$("#tn_boss_2_status").text("Mythic");};
      var tn_boss_2_status = document.getElementById("tn_boss_2_status");
      tn_boss_2_status.classList.add("downed_mythic");
      raid_tn_mythic++;
    }
    
    if (raid_tn_boss2Video !== "")
    {
      var tnBoss2Video = document.getElementById("tn_boss_2_video").href = raid_tn_boss2Video;
      var tnBoss2VideoImg = document.getElementById("tn_boss_2").getElementsByClassName("bossVideoImg")[0];
      tnBoss2VideoImg.src=("/Custom/Raids/hasVideo.png");
      tnBoss2VideoImg.setAttribute("title", "Boss Kill Video Available!");
      tnBoss2VideoImg.removeAttribute("onclick");
    } 
    raid_tn++;
  }
  
    if(raid_tn_boss3) 
  {
  	if(raid_tn_boss3_normal)
    {
      {$("#tn_boss_3_status").text("Normal");};
      var tn_boss_3_status = document.getElementById("tn_boss_3_status");
      tn_boss_3_status.classList.add("downed_normal");
      raid_tn_normal++;
    }
    if (raid_tn_boss3_heroic)
    {
      {$("#tn_boss_3_status").text("Heroic");};
      var tn_boss_3_status = document.getElementById("tn_boss_3_status");
      tn_boss_3_status.classList.add("downed_heroic");
      raid_tn_heroic++;
    }
    if (raid_tn_boss3_mythic)
    {
      {$("#tn_boss_3_status").text("Mythic");};
      var tn_boss_3_status = document.getElementById("tn_boss_3_status");
      tn_boss_3_status.classList.add("downed_mythic");
      raid_tn_mythic++;
    }
    
    if (raid_tn_boss3Video !== "")
    {
      var tnBoss3Video = document.getElementById("tn_boss_3_video").href = raid_tn_boss3Video;
      var tnBoss3VideoImg = document.getElementById("tn_boss_3").getElementsByClassName("bossVideoImg")[0];
      tnBoss3VideoImg.src=("/Custom/Raids/hasVideo.png");
      tnBoss3VideoImg.setAttribute("title", "Boss Kill Video Available!");
      tnBoss3VideoImg.removeAttribute("onclick");
    }
    raid_tn++;
  }
  
  if(raid_tn_boss4) 
  {
  	if(raid_tn_boss4_normal)
    {
      {$("#tn_boss_4_status").text("Normal");};
      var tn_boss_4_status = document.getElementById("tn_boss_4_status");
      tn_boss_4_status.classList.add("downed_normal");
      raid_tn_normal++;
    }
    if (raid_tn_boss4_heroic)
    {
      {$("#tn_boss_4_status").text("Heroic");};
      var tn_boss_4_status = document.getElementById("tn_boss_4_status");
      tn_boss_4_status.classList.add("downed_heroic");
      raid_tn_heroic++;
    }
    if (raid_tn_boss4_mythic)
    {
      {$("#tn_boss_4_status").text("Mythic");};
      var tn_boss_4_status = document.getElementById("tn_boss_4_status");
      tn_boss_4_status.classList.add("downed_mythic");
      raid_tn_mythic++;
    }
    
    if (raid_tn_boss4Video !== "")
    {
      var tnBoss4Video = document.getElementById("tn_boss_4_video").href = raid_tn_boss4Video;
      var tnBoss4VideoImg = document.getElementById("tn_boss_4").getElementsByClassName("bossVideoImg")[0];
      tnBoss4VideoImg.src=("/Custom/Raids/hasVideo.png");
      tnBoss4VideoImg.setAttribute("title", "Boss Kill Video Available!");
      tnBoss4VideoImg.removeAttribute("onclick");
    }   
    raid_tn++;
  }
  
    if(raid_tn_boss5) 
  {
  	if(raid_tn_boss5_normal)
    {
      {$("#tn_boss_5_status").text("Normal");};
      var tn_boss_5_status = document.getElementById("tn_boss_5_status");
      tn_boss_5_status.classList.add("downed_normal");
      raid_tn_normal++;
    }
    if (raid_tn_boss5_heroic)
    {
      {$("#tn_boss_5_status").text("Heroic");};
      var tn_boss_5_status = document.getElementById("tn_boss_5_status");
      tn_boss_5_status.classList.add("downed_heroic");
      raid_tn_heroic++;
    }
    if (raid_tn_boss5_mythic)
    {
      {$("#tn_boss_5_status").text("Mythic");};
      var tn_boss_5_status = document.getElementById("tn_boss_5_status");
      tn_boss_5_status.classList.add("downed_mythic");
      raid_tn_mythic++;
    }
    
    if (raid_tn_boss5Video !== "")
    {
      var tnBoss5Video = document.getElementById("tn_boss_5_video").href = raid_tn_boss5Video;
      var tnBoss5VideoImg = document.getElementById("tn_boss_5").getElementsByClassName("bossVideoImg")[0];
      tnBoss5VideoImg.src=("/Custom/Raids/hasVideo.png");
      tnBoss5VideoImg.setAttribute("title", "Boss Kill Video Available!");
      tnBoss5VideoImg.removeAttribute("onclick");
    }   
    raid_tn++;
  }
  
    if(raid_tn_boss6) 
  {
  	if(raid_tn_boss6_normal)
    {
      {$("#tn_boss_6_status").text("Normal");};
      var tn_boss_6_status = document.getElementById("tn_boss_6_status");
      tn_boss_6_status.classList.add("downed_normal");
      raid_tn_normal++;
    }
    if (raid_tn_boss6_heroic)
    {
      {$("#tn_boss_6_status").text("Heroic");};
      var tn_boss_6_status = document.getElementById("tn_boss_6_status");
      tn_boss_6_status.classList.add("downed_heroic");
      raid_tn_heroic++;
    }
    if (raid_tn_boss6_mythic)
    {
      {$("#tn_boss_6_status").text("Mythic");};
      var tn_boss_6_status = document.getElementById("tn_boss_6_status");
      tn_boss_6_status.classList.add("downed_mythic");
      raid_tn_mythic++;
    }
    
    if (raid_tn_boss6Video !== "")
    {
      var tnBoss6Video = document.getElementById("tn_boss_6_video").href = raid_tn_boss6Video;
      var tnBoss6VideoImg = document.getElementById("tn_boss_6").getElementsByClassName("bossVideoImg")[0];
      tnBoss6VideoImg.src=("/Custom/Raids/hasVideo.png");
      tnBoss6VideoImg.setAttribute("title", "Boss Kill Video Available!");
      tnBoss6VideoImg.removeAttribute("onclick");
    } 
    raid_tn++;
  }
  
  if(raid_tn_boss7) 
  {
  	if(raid_tn_boss7_normal)
    {
      {$("#tn_boss_7_status").text("Normal");};
      var tn_boss_7_status = document.getElementById("tn_boss_7_status");
      tn_boss_7_status.classList.add("downed_normal");
      raid_tn_normal++;
    }
    if (raid_tn_boss7_heroic)
    {
      {$("#tn_boss_7_status").text("Heroic");};
      var tn_boss_7_status = document.getElementById("tn_boss_7_status");
      tn_boss_7_status.classList.add("downed_heroic");
      raid_tn_heroic++;
    }
    if (raid_tn_boss7_mythic)
    {
      {$("#tn_boss_7_status").text("Mythic");};
      var tn_boss_7_status = document.getElementById("tn_boss_7_status");
      tn_boss_7_status.classList.add("downed_mythic");
      raid_tn_mythic++;
    }
    
    if (raid_tn_boss7Video !== "")
    {
      var tnBoss7Video = document.getElementById("tn_boss_7_video").href = raid_tn_boss7Video;
      var tnBoss7VideoImg = document.getElementById("tn_boss_7").getElementsByClassName("bossVideoImg")[0];
      tnBoss7VideoImg.src=("/Custom/Raids/hasVideo.png");
      tnBoss7VideoImg.setAttribute("title", "Boss Kill Video Available!");
      tnBoss7VideoImg.removeAttribute("onclick");
    }
    raid_tn++;
  }
  
  if(raid_tn_boss8) 
  {
  	if(raid_tn_boss8_normal)
    {
      {$("#tn_boss_8_status").text("Normal");};
      var tn_boss_8_status = document.getElementById("tn_boss_8_status");
      tn_boss_7_status.classList.add("downed_normal");
      raid_tn_normal++;
    }
    if (raid_tn_boss8_heroic)
    {
      {$("#tn_boss_8_status").text("Heroic");};
      var tn_boss_8_status = document.getElementById("tn_boss_8_status");
      tn_boss_8_status.classList.add("downed_heroic");
      raid_tn_heroic++;
    }
    if (raid_tn_boss8_mythic)
    {
      {$("#tn_boss_8_status").text("Mythic");};
      var tn_boss_8_status = document.getElementById("tn_boss_8_status");
      tn_boss_8_status.classList.add("downed_mythic");
      raid_tn_mythic++;
    }
    
    if (raid_tn_boss8Video !== "")
    {
      var tnBoss8Video = document.getElementById("tn_boss_8_video").href = raid_tn_boss8Video;
      var tnBoss8VideoImg = document.getElementById("tn_boss_8").getElementsByClassName("bossVideoImg")[0];
      tnBoss8VideoImg.src=("/Custom/Raids/hasVideo.png");
      tnBoss8VideoImg.setAttribute("title", "Boss Kill Video Available!");
      tnBoss8VideoImg.removeAttribute("onclick");
    }
    raid_tn++;
  }
  
  if(raid_tn_boss9) 
  {
  	if(raid_tn_boss9_normal)
    {
      {$("#tn_boss_9_status").text("Normal");};
      var tn_boss_9_status = document.getElementById("tn_boss_9_status");
      tn_boss_9_status.classList.add("downed_normal");
      raid_tn_normal++;
    }
    if (raid_tn_boss9_heroic)
    {
      {$("#tn_boss_9_status").text("Heroic");};
      var tn_boss_9_status = document.getElementById("tn_boss_9_status");
      tn_boss_9_status.classList.add("downed_heroic");
      raid_tn_heroic++;
    }
    if (raid_tn_boss9_mythic)
    {
      {$("#tn_boss_9_status").text("Mythic");};
      var tn_boss_9_status = document.getElementById("tn_boss_9_status");
      tn_boss_9_status.classList.add("downed_mythic");
      raid_tn_mythic++;
    }
    
    if (raid_tn_boss9Video !== "")
    {
      var tnBoss9Video = document.getElementById("tn_boss_9_video").href = raid_tn_boss9Video;
      var tnBoss9VideoImg = document.getElementById("tn_boss_9").getElementsByClassName("bossVideoImg")[0];
      tnBoss9VideoImg.src=("/Custom/Raids/hasVideo.png");
      tnBoss9VideoImg.setAttribute("title", "Boss Kill Video Available!");
      tnBoss9VideoImg.removeAttribute("onclick");
    }
    raid_tn++;
  }
  
  if(raid_tn_boss10) 
  {
  	if(raid_tn_boss10_normal)
    {
      {$("#tn_boss_10_status").text("Normal");};
      var tn_boss_10_status = document.getElementById("tn_boss_10_status");
      tn_boss_10_status.classList.add("downed_normal");
      raid_tn_normal++;
    }
    if (raid_tn_boss10_heroic)
    {
      {$("#tn_boss_10_status").text("Heroic");};
      var tn_boss_10_status = document.getElementById("tn_boss_10_status");
      tn_boss_10_status.classList.add("downed_heroic");
      raid_tn_heroic++;
    }
    if (raid_tn_boss10_mythic)
    {
      {$("#tn_boss_10_status").text("Mythic");};
      var tn_boss_10_status = document.getElementById("tn_boss_10_status");
      tn_boss_10_status.classList.add("downed_mythic");
      raid_tn_mythic++;
    }
    
    if (raid_tn_boss10Video !== "")
    {
      var tnBoss10Video = document.getElementById("tn_boss_10_video").href = raid_tn_boss10Video;
      var tnBoss10VideoImg = document.getElementById("tn_boss_10").getElementsByClassName("bossVideoImg")[0];
      tnBoss10VideoImg.src=("/Custom/Raids/hasVideo.png");
      tnBoss10VideoImg.setAttribute("title", "Boss Kill Video Available!");
      tnBoss10VideoImg.removeAttribute("onclick");
    }
    raid_tn++;
  }
  
  /* The Nighthold Tracking Logic Ends */
  
  raid_tn_comp = raid_tn/raid_tn_size;
  raid_tn_comp *= 100;
  
  raid_tn_comp_normal = raid_tn_normal/raid_tn_size;
  raid_tn_comp_normal *= 100;
  var raid_tn_comp_fill_normal = document.getElementById("raid_tn_comp_normal");
  raid_tn_comp_fill_normal.setAttribute("style", "width: "+raid_tn_comp_normal+"%");
  
  raid_tn_comp_heroic = raid_tn_heroic/raid_tn_size;
  raid_tn_comp_heroic *= 100;
  var raid_tn_comp_fill_heroic = document.getElementById("raid_tn_comp_heroic");
  raid_tn_comp_fill_heroic.setAttribute("style", "width: "+raid_tn_comp_heroic+"%");
  
  raid_tn_comp_mythic = raid_tn_mythic/raid_tn_size;
  raid_tn_comp_mythic *= 100;
  var raid_tn_comp_fill_mythic = document.getElementById("raid_tn_comp_mythic");
  raid_tn_comp_fill_mythic.setAttribute("style", "width: "+raid_tn_comp_mythic+"%");
  
  {$("#tn_boss_kill_count_normal").text(raid_tn_normal);};
  {$("#tn_boss_kill_count_heroic").text(raid_tn_heroic);};
  {$("#tn_boss_kill_count_mythic").text(raid_tn_mythic);};
});