$(document).ready(function(){
	
	changeLinks();
	
	$(".megaid").colorbox({width:"90%", height:"90%", iframe:true});
	
	$("#reportLink").colorbox();
	
	if ($(".uniqueAuto").length > 0) {
		$(".uniqueAuto").autocomplete("/movies/autocomplete", { minChars:4, cacheLength:10, maxItemsToShow:10, matchContains:1});
	}
	
	if ($(".titletip").length > 0) {
		$(".titletip").tooltip({ effect: 'toggle', offset: [105, -15], delay: 0});
		pic = new Image(360, 90); 
		pic.src = "/images/tipbk2.png"; 
	}
});

function changeLinks() {
   //Create an object of all links
   var links = $('.megaid')
   //Parse each item in links object
   for (var a in links){
      //This will allow the for iteration to give the actual link objects that are
      //referred to with numeric indexes and not objects that jQuery appends
      //Object 'a' should be a number
      if(a == parseInt(a)){
         //Variable b is now the object that is links[a];
         var b = links[a];
         //Variable c is now variable b cast to jQuery so I can use built in jQuery functions
         var c = $(b);
         //Variable temp now contains the href of that link
         var temp = c.attr('href');
         //This should filter out any anchors in the page or any links without an href
         if(temp != undefined){
            //This checks to see if they are inline links, mailto link, OR absolute link
            //This isn't perfect in the case that your link was 'mailsomething.php' or any non http link (ftp or other protocol)
            //The correct scenario here is to use regex but I didn't have the patience
            //or time to do so, so I didn't plus I knew my links didn't apply to these caveats
            var test = temp.substring(0,4);
            if(test != 'mail' && test != 'http' && test != '#'){
               //Now we prepend the abosulte url with the proper and add the relative file location
               c.attr('href','/' + type + '/mega' + temp);
            }
         }
      }
   }
}
