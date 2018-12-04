
class Embed {
    constructor(templateId) {

        this.templateId = templateId;

        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function () {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {

                var parsedJSON = JSON.parse(xmlhttp.responseText);
                // console.log('responseText:' + xmlhttp.responseText);
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

                // console.log(label_text_fsize);

                var crtSpecialTemplateDiv = document.createElement("div");
                crtSpecialTemplateDiv.setAttribute("id", "specialTemplateDiv");
                crtSpecialTemplateDiv.setAttribute("style", "");

                var crtDivMain = document.createElement("div");
                crtDivMain.setAttribute("id", "main_div");
                crtDivMain.className = "main_div";
                var crtDivLabel = document.createElement("div");
                crtDivLabel.setAttribute("id", "label_div");
                crtDivLabel.className = "label_div";
                var crtDivLabelInner = document.createElement("div");
                crtDivLabelInner.setAttribute("id", "label_inner_div");
                crtDivLabelInner.className = "label_inner_div";
                var crtLabelP = document.createElement("p");
                crtLabelP.setAttribute("id", "labelParagraph");
                crtLabelP.className = "notifyParagraph";
                var crtDivSummary = document.createElement("div");
                crtDivSummary.setAttribute("id", "summary_div");
                crtDivSummary.className = "summary_div";
                var crtSummaryP = document.createElement("p");
                crtSummaryP.setAttribute("id", "crtSummaryP");
                crtSummaryP.className = "notifyParagraph";
                var crtDivExit = document.createElement("div");
                crtDivExit.setAttribute("id", "exit_div");
                crtDivExit.className = "exit_div";
                var crtBtn = document.createElement("button");
                crtBtn.setAttribute("id", "button_div");
                crtBtn.className = "button_div";
                var crtAnchor = document.createElement("a");
                crtAnchor.setAttribute("id", "closeBtn");
                crtAnchor.className = "om-trigger-close";

                // template() {
                //     document.getElementById("specialTemplateDiv").appendChild(crtDivMain);
                //     document.getElementById("main_div").setAttribute("style", "display:flex;height:115px;width:100%;border: 2px solid gray;border-radius:10px;");
                //     document.getElementById("main_div").appendChild(crtDivLabel);
                //     document.getElementById("label_div").setAttribute("style", "display: flex;align-items: center;justify-content: center;flex: 3;");
                //     document.getElementById("label_div").appendChild(crtDivLabelInner);
                //     document.getElementById("label_inner_div").appendChild(crtLabelP);
                //     document.getElementById("labelParagraph").setAttribute("style", "font-size:" + label_text_fsize + ";color:" + label_text_color + ";");
                //     crtLabelP.innerText = label_text;
                //     document.getElementById("main_div").appendChild(crtDivSummary);
                //     document.getElementById("summary_div").setAttribute("style", "display: flex;align-items: center;justify-content: center;text-align: center;flex: 6;");
                //     document.getElementById("summary_div").appendChild(crtSummaryP);
                //     document.getElementById("crtSummaryP").setAttribute("style", "font-size:" + summary_text_fsize + ";color:" + summary_text_color + ";");
                //     crtSummaryP.innerText = summary;
                //     document.getElementById("main_div").appendChild(crtDivExit);
                //     document.getElementById("exit_div").setAttribute("style", "flex: 3;position:relative;");
                //     document.getElementById("exit_div").appendChild(crtBtn);
                //     document.getElementById("button_div").setAttribute("style", "position: absolute;bottom: -1px;right: -1px;border: 0;background: #fff;border-radius: 25px;");
                //     document.getElementById("button_div").appendChild(crtAnchor);
                //     document.getElementById("closeBtn").setAttribute("style", "background-color: #afa8a8;color: #fff;padding: 5px 7px;text-align: center;border-radius: 10px!important;width: auto;display: inline-block;border-radius: 5px;text-decoration: none;");
                //     crtAnchor.innerText = "x";
                // }


                if (document.getElementById("specialTemplateDiv")) {

                    // this.template();
                    document.getElementById("specialTemplateDiv").appendChild(crtDivMain);
                    document.getElementById("main_div").setAttribute("style", "display:flex;height:115px;width:100%;border: 2px solid gray;border-radius:10px;");
                    document.getElementById("main_div").appendChild(crtDivLabel);
                    document.getElementById("label_div").setAttribute("style", "display: flex;align-items: center;justify-content: center;flex: 3;");
                    document.getElementById("label_div").appendChild(crtDivLabelInner);
                    document.getElementById("label_inner_div").appendChild(crtLabelP);
                    document.getElementById("labelParagraph").setAttribute("style", "font-size:" + label_text_fsize + ";color:" + label_text_color + ";");
                    crtLabelP.innerText = label_text;
                    document.getElementById("main_div").appendChild(crtDivSummary);
                    document.getElementById("summary_div").setAttribute("style", "display: flex;align-items: center;justify-content: center;text-align: center;flex: 6;");
                    document.getElementById("summary_div").appendChild(crtSummaryP);
                    document.getElementById("crtSummaryP").setAttribute("style", "font-size:" + summary_text_fsize + ";color:" + summary_text_color + ";");
                    crtSummaryP.innerText = summary;
                    document.getElementById("main_div").appendChild(crtDivExit);
                    document.getElementById("exit_div").setAttribute("style", "flex: 3;position:relative;");
                    document.getElementById("exit_div").appendChild(crtBtn);
                    document.getElementById("button_div").setAttribute("style", "position: absolute;bottom: -1px;right: -1px;border: 0;background: #fff;border-radius: 25px;");
                    document.getElementById("button_div").appendChild(crtAnchor);
                    document.getElementById("closeBtn").setAttribute("style", "background-color: #afa8a8;color: #fff;padding: 5px 7px;text-align: center;border-radius: 10px!important;width: auto;display: inline-block;border-radius: 5px;text-decoration: none;");
                    crtAnchor.innerText = "x";
                } else {

                    document.body.appendChild(crtSpecialTemplateDiv);
                    // this.template();
                    document.getElementById("specialTemplateDiv").appendChild(crtDivMain);
                    document.getElementById("main_div").setAttribute("style", "display:flex;height:115px;width:100%;border: 2px solid gray;border-radius:10px;");
                    document.getElementById("main_div").appendChild(crtDivLabel);
                    document.getElementById("label_div").setAttribute("style", "display: flex;align-items: center;justify-content: center;flex: 3;");
                    document.getElementById("label_div").appendChild(crtDivLabelInner);
                    document.getElementById("label_inner_div").appendChild(crtLabelP);
                    document.getElementById("labelParagraph").setAttribute("style", "font-size:" + label_text_fsize + ";color:" + label_text_color + ";");
                    crtLabelP.innerText = label_text;
                    document.getElementById("main_div").appendChild(crtDivSummary);
                    document.getElementById("summary_div").setAttribute("style", "display: flex;align-items: center;justify-content: center;text-align: center;flex: 6;");
                    document.getElementById("summary_div").appendChild(crtSummaryP);
                    document.getElementById("crtSummaryP").setAttribute("style", "font-size:" + summary_text_fsize + ";color:" + summary_text_color + ";");
                    crtSummaryP.innerText = summary;
                    document.getElementById("main_div").appendChild(crtDivExit);
                    document.getElementById("exit_div").setAttribute("style", "flex: 3;position:relative;");
                    document.getElementById("exit_div").appendChild(crtBtn);
                    document.getElementById("button_div").setAttribute("style", "position: absolute;bottom: -1px;right: -1px;border: 0;background: #fff;border-radius: 25px;");
                    document.getElementById("button_div").appendChild(crtAnchor);
                    document.getElementById("closeBtn").setAttribute("style", "background-color: #afa8a8;color: #fff;padding: 5px 7px;text-align: center;border-radius: 10px!important;width: auto;display: inline-block;border-radius: 5px;text-decoration: none;");
                    crtAnchor.innerText = "x";

                }

            }
        };

        xmlhttp.open("GET", "./Json/" + templateId + "/data.json", true);
        xmlhttp.send();

    }
}

var embed = new Embed(60);