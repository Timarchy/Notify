

var xmlhttp = new XMLHttpRequest();
xmlhttp.onreadystatechange = function() {
    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
        console.log('responseText:' + xmlhttp.responseText);
        var parsedJSON = JSON.parse(xmlhttp.responseText);
        console.log(parsedJSON.label_text_fsize, "FONT SIZE NIGGERS");
        var crtPara = document.createElement("p");
        var crtDiv = document.createElement("div");
        var crtSpan = document.createElement("span");
        document.body.appendChild(crtPara);
        crtPara.innerText = "Lorem Ipsum Dolor Aisgmet Bagati-ai in el scris";
        crtPara.style.fontSize = parsedJSON.label_text_fsize;
    }
};

xmlhttp.open("GET", "./Json/46/data.json", true);
xmlhttp.send();