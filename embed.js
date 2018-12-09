class Embed {
    constructor(templateId) {

        this.templateId = templateId;

        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function () {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {

                var parsedJSON = JSON.parse(xmlhttp.responseText);
                console.log('responseText:' + xmlhttp.responseText);
                // console.log(parsedJSON.label_text_fsize, "FONT SIZE NIGGERS");
                // var crtPara = document.createElement("p");

                //json data
                var label_text = parsedJSON.label_text;
                var label_text_fsize = parsedJSON.label_text_fsize;
                var label_text_color = parsedJSON.label_text_color;
                var label_background = parsedJSON.label_background;
                var sponsor_url = parsedJSON.sponsor_url;
                var summary = parsedJSON.summary;
                var summary_text_fsize = parsedJSON.summary_text_fsize;
                var summary_text_color = parsedJSON.summary_text_color;
                var summary_background = parsedJSON.summary_background;

                var crtSpecialTemplateDiv = document.createElement("div");
                crtSpecialTemplateDiv.setAttribute("id", "specialTemplateDiv");
                crtSpecialTemplateDiv.setAttribute("style", "position:absolute;top:0;right:0;left:0;background-color:#fff;");

                var crtDivMain = document.createElement("div");
                crtDivMain.setAttribute("id", "main_div"+ templateId);
                crtDivMain.setAttribute("style", "background-color:" + summary_background + ";position:relative;display:flex;align-items:center;justify-content:center;height:50px;width:100%;");
                crtDivMain.className = "main_div";
                var crtDivLabel = document.createElement("div");
                crtDivLabel.setAttribute("id", "label_div");
                crtDivLabel.setAttribute("style", "");
                crtDivLabel.className = "label_div";
                var crtDivLabelInner = document.createElement("div");
                crtDivLabelInner.setAttribute("id", "label_inner_div");
                crtDivLabelInner.className = "label_inner_div";
                var crtLabelA = document.createElement("a");
                crtLabelA.setAttribute("id", "labelParagraph");
                crtLabelA.setAttribute("href", sponsor_url);
                crtLabelA.setAttribute("style", "padding:3px 6px;border:0;border-radius:3px;text-decoration:none;background:" + label_background + ";font-size:" + label_text_fsize + ";color:" + label_text_color + ";");
                crtLabelA.className = "notifyParagraph";
                var crtDivSummary = document.createElement("div");
                crtDivSummary.setAttribute("id", "summary_div");
                crtDivSummary.setAttribute("style", "text-align: center;");
                crtDivSummary.className = "summary_div";
                var crtSummaryP = document.createElement("p");
                crtSummaryP.setAttribute("id", "crtSummaryP");
                crtSummaryP.setAttribute("style", "font-size:" + summary_text_fsize + ";color:" + summary_text_color + ";margin: 0 10px;");
                crtSummaryP.className = "notifyParagraph";
                var crtAnchor = document.createElement("a");
                crtAnchor.setAttribute("id", "closeBtn");
                // crtAnchor.setAttribute("onclick", "removeTemplate()");
                crtAnchor.setAttribute("style", "position:absolute;right:0;top:0;height:100%;cursor: pointer;background-color: #afa8a8;color: #fff;padding: 10px 7px;text-align: center;width: auto;display: inline-block;text-decoration: none;border:0;");
                crtAnchor.className = "om-trigger-close";

                if (!document.getElementById("specialTemplateDiv")) {
                    document.body.appendChild(crtSpecialTemplateDiv);
                }

                document.getElementById("specialTemplateDiv").appendChild(crtDivMain);
                var mainDiv = document.getElementById("main_div" + templateId);

                mainDiv.appendChild(crtDivSummary);
                crtDivSummary.appendChild(crtSummaryP);
                crtSummaryP.innerText = summary;

                mainDiv.appendChild(crtDivLabel);
                crtDivLabelInner.appendChild(crtLabelA);
                crtDivLabel.appendChild(crtDivLabelInner);
                crtLabelA.innerText = label_text;

                mainDiv.appendChild(crtAnchor);
                crtAnchor.addEventListener("click", function(){
                    var element = crtAnchor.parentNode;
                    element.parentNode.removeChild(element);
                });
                crtAnchor.innerText = "x";

            }

        };

        xmlhttp.open("GET", "/Json/" + templateId + "/data.json", true);
        xmlhttp.send();

    }

}
