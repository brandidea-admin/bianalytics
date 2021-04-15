var tipObj = null;
//offset along x and y in px
var offset = {
    x: 20,
    y: 20
};

/********************************************************************
 * injectTooltip(e,data)
 * inject the custom tooltip into the DOM
 ********************************************************************/
function injectTooltip(event, data) {
    if (!tipObj && event) {
        coordPropName = null;
        eventPropNames = Object.keys(event);
        if(!coordPropName){
            //discover the name of the prop with MouseEvent
          for(var i in eventPropNames){
            var name = eventPropNames[i];
            if(event[name] instanceof MouseEvent){
                coordPropName = name;
              //console.log("--> mouse event in", coordPropName)
              break;
            }
          }
        }
        // console.log(coordPropName);
        //create the tooltip object
        tipObj = document.createElement("div");
        tipObj.id = 'tooltip_map';
        tipObj.style.width = 'auto';
        // tipObj.style.maxHeight = '402px';
        tipObj.style.minHeight = '27px';
        tipObj.style.tableLayout = 'fixed';
        tipObj.style.background = "#FFFFFF";
        tipObj.style.color = "#333";
        tipObj.style.borderRadius = "2px";
        tipObj.style.padding = "5px 10px";
        tipObj.style.fontFamily = "Arial,Helvetica";
        tipObj.style.textAlign = "left";
        // tipObj.style.overflow = "auto";
        tipObj.style.boxShadow = "0px 0px 10px 5px rgba(0,0,0,0.2)";
        // tipObj.style.fontStyle = "italic";
        tipObj.style.zIndex = "9999999";
        tipObj.innerHTML = data;
        //position it
        // var div_height = document.getElementById('tooltip_map');
        // var div_height1 = $( "#tooltip_map" ).height();
        // console.log(div_height1);

        tipObj.style.position = "fixed";
        // if((event[coordPropName].clientY)>500)
        // {
          // var tpl_y = (event[coordPropName].clientX)-300;
          // alert(tpl_x);
           tipObj.style.top = event[coordPropName].clientY + window.scrollY + offset.y + "px";
          //tipObj.style.top = event[coordPropName].clientY + window.scrollY + offset.y + "px";
            tipObj.style.left = event[coordPropName].clientX + window.scrollX + offset.x + "px";
          // console.log(tipObj.style.left);
        // }
        // else {
          // tipObj.style.top = event[coordPropName].clientY + window.scrollY + offset.y + "px";
          // tipObj.style.left = event[coordPropName].clientX + window.scrollX + offset.x + "px";
        // }

        //add it to the body
        document.body.appendChild(tipObj);
    }
}
/********************************************************************
 * moveTooltip(e)
 * update the position of the tooltip based on the event data
 ********************************************************************/
function moveTooltip(event) {
    if (tipObj && event) {
        //position it
        coordPropName = null;
        eventPropNames = Object.keys(event);
        if(!coordPropName){
            //discover the name of the prop with MouseEvent
          for(var i in eventPropNames){
            var name = eventPropNames[i];
            if(event[name] instanceof MouseEvent){
                coordPropName = name;
              // console.log("--> mouse event in", coordPropName)
              break;
            }
          }
        }
        var div_height = $( "#tooltip_map" ).height();
        var div_width = $( "#tooltip_map" ).width();
        // && div_height>100
        if((event[coordPropName].clientY)>350 )
        {
          var tpl_y = (event[coordPropName].clientY)-div_height;
          tipObj.style.top = tpl_y + "px";
            // tipObj.style.left = event[coordPropName].clientX + window.scrollX + offset.x + "px";
           if((event[coordPropName].clientX)>750)
           {
               var tpl_x = (event[coordPropName].clientX)-div_width;
               tipObj.style.top = tpl_y - 20+ "px";
               tipObj.style.left = tpl_x - 20 + "px";
           }
           else {
               tipObj.style.left = event[coordPropName].clientX + window.scrollX + offset.x + "px";
           }

        }
        else {
          tipObj.style.top = event[coordPropName].clientY + window.scrollY + offset.y + "px";
          tipObj.style.left = event[coordPropName].clientX + window.scrollX + offset.x + "px";
        }
        // switch(expression) {
        //                     case x:
        //                       // code block
        //                       break;
        //                     case y:
        //                       // code block
        //                       break;
        //                     default:
        //                       // code block
        //                   }
        // tipObj.style.top = event[coordPropName].clientY + window.scrollY + offset.y + "px";
        // tipObj.style.left = event[coordPropName].clientX + window.scrollX + offset.x + "px";
    }
}

/********************************************************************
 * deleteTooltip(e)
 * delete the tooltip if it exists in the DOM
 ********************************************************************/
function deleteTooltip(event) {
    if (tipObj) {
        //delete the tooltip if it exists in the DOM
            try {
            document.body.removeChild(tipObj);
            tipObj = null;
            }
            catch(err) {
            // document.getElementById("demo").innerHTML = err.message;
            }
    }
}
