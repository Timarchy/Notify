
/*

var xmlhttp = new XMLHttpRequest();
xmlhttp.onreadystatechange = function() {
    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
        console.log('responseText:' + xmlhttp.responseText);
        var parsedJSON = JSON.parse(xmlhttp.responseText);
        console.log(parsedJSON.label_text_fsize, "FONT SIZE NIGGERS");

        var crtPara = document.createElement("p");
        var crtDivMain = document.createElement("div");
        crtDivMain.setAttribute("id", "main_div");
        crtDivMain.className = "main_div";
        var crtDivLabel = document.createElement("div");
        crtDivLabel.setAttribute("id", "label_div");
        crtDivLabel.className = "label_div";
        var crtDivLabelInner = document.createElement("div");
        crtDivLabelInner.setAttribute("id", "label_inner_div");
        crtDivLabelInner.className = "label_inner_div";
        var crtDivSummary = document.createElement("div");
        crtDivSummary.setAttribute("id", "summary_div");
        crtDivSummary.className = "summary_div";
        var crtDivExit = document.createElement("div");
        crtDivExit.setAttribute("id", "exit_div");
        crtDivExit.className = "exit_div";
        var crtBtn = document.createElement("button");
        crtBtn.setAttribute("id", "button_div");
        crtBtn.className = "button_div";


        document.body.appendChild(crtDivMain);
        document.getElementById("main_div").appendChild(crtDivLabel);
        document.getElementById("label_div").appendChild(crtDivLabelInner);
        crtDivLabelInner.innerText = parsedJSON.label_text;
        document.getElementById("main_div").appendChild(crtDivSummary);
        crtDivSummary.innerText = parsedJSON.summary;
        document.getElementById("main_div").appendChild(crtDivExit);
        document.getElementById("exit_div").appendChild(crtBtn);
        crtBtn.innerText = "x";


        crtPara.setAttribute("id", "main_div");
        // document.body.appendChild(ctrDiv.setAttribute("id", "main_div"));
        document.body.appendChild(crtPara);
        crtPara.innerText = "Lorem Ipsum Dolor Aisgmet Bagati-ai in el scris";
        crtPara.style.fontSize = parsedJSON.label_text_fsize;
    }
};

xmlhttp.open("GET", "./Json/45/data.json", true);
xmlhttp.send();*/
