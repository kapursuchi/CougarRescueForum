function retrieveInformation() {
	//Get list of "flagged" posts for admin to review.
	getPosts();

		
	return false;
}



function getPosts() {
    var posts = new Array(); //placeholder for PHP function
	posts = [["User1", "Post Title", "4", "6", "12/25/10"],["User2", "Post Title",  "4","5", "10/1/20"],
    ["User3", "Post Title", "3","4", "1/4/98"]];
	
	if (posts.length == 0) {
        var divElem0 = document.createElement("div");
		divElem0.setAttribute("class", "table-sub-format");
		var divElem = document.createElement("div");
		divElem.setAttribute("class", "item-subforum");
        var divElem2 = document.createElement("div");
        divElem2.setAttribute("class", "item-subforum-author");
        var divElemA = document.createElement("a");
        divElemA.setAttribute("class", "item-post-title");
        divElemA.setAttribute("href", "main.html");
        divElemA.innerHTML = "Post Title";
        var divElem3 = document.createElement("div");
        divElem3.setAttribute("class", "subforum-author");
        divElem3.innerHTML = "Author";
        var divElem4 = document.createElement("div");
        divElem4.setAttribute("class", "item-replies");
        divElem4.innerHTML = "0";
        //var divElem5 = document.createElement("div");
        //divElem5.setAttribute("class", "item-views");
        //divElem5.innerHTML = "0";
        var divElem6 = document.createElement("div");
        divElem6.setAttribute("class", "item-last-post");
        divElem6.innerHTML = "0";

        divElem0.appendChild(divElem)
        divElem.appendChild(divElem2);
        divElem2.appendChild(divElemA);
        divElem2.appendChild(divElem3);
        divElem0.appendChild(divElem4);
        //divElem0.appendChild(divElem5);
        divElem0.appendChild(divElem6);

        document.getElementById("subforum-div").appendChild(divElem0);
		
	}
	else {
		for (var i = 0; i < posts.length; i++) {
            var divElem0 = document.createElement("div");
		    divElem0.setAttribute("class", "table-sub-format");
			var divElem = document.createElement("div");
            divElem.setAttribute("class", "item-subforum");
            var divElem2 = document.createElement("div");
            divElem2.setAttribute("class", "item-subforum-author");
            var divElemA = document.createElement("a");
            divElemA.setAttribute("class", "item-post-title");
            divElemA.setAttribute("href", "main.html");
            divElemA.innerHTML = posts[i][1];
            var divElem3 = document.createElement("div");
            divElem3.setAttribute("class", "subforum-author");
            divElem3.innerHTML = posts[i][0];
            var divElem4 = document.createElement("div");
            divElem4.setAttribute("class", "item-replies");
            divElem4.innerHTML = posts[i][2];
            //var divElem5 = document.createElement("div");
            //divElem5.setAttribute("class", "item-views");
            //divElem5.innerHTML = posts[i][3];
            var divElem6 = document.createElement("div");
            divElem6.setAttribute("class", "item-last-post");
			var date = new Date(posts[i][4]);
            divElem6.innerHTML = (date.getMonth()+1).toString() + "/" + date.getDay() + "/" + date.getFullYear();

            divElem0.appendChild(divElem)
            divElem.appendChild(divElem2);
            divElem2.appendChild(divElemA);
            divElem2.appendChild(divElem3);
            divElem0.appendChild(divElem4);
            //divElem0.appendChild(divElem5);
            divElem0.appendChild(divElem6);
    
            document.getElementById("subforum-div").appendChild(divElem0);
	        }
	
	    }
}



function logout() {
	//TODO: log user out.
	window.location.href = "admin_index.html";
}