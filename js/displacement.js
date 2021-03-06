
         var canvas, stage;
        var drawingCanvas;
        var oldPt;
        var startPt;
        var oldMidPt;
        var title;
        var color;
        var stroke;
        var colors;
        var index;
        var docx;
        var docy;
        var docdisp;
        var docdist ;
        var line;
        var line1;
        var count;
        var displacement = 0;
        var abc;
        var abd;
        var eases = [createjs.Ease.none,createjs.Ease.quadIn,createjs.Ease.getPowIn(2.5),createjs.Ease.cubicIn,createjs.Ease.quartIn,createjs.Ease.quintIn];
        $(function() {
			docx = document.getElementById("x-coord");
			docy = document.getElementById("y-coord");
			docdisp = document.getElementById("disp");
			docdist = document.getElementById("dist");
            canvas = document.getElementById("canvas1");
            stage = new createjs.Stage(canvas);
            //stage.autoClear = true;
            
            line = new createjs.Shape();
            line.graphics.setStrokeStyle(1);
            for (var i = 0;i < 420;i = i + 50 ) {
                
                line.graphics.beginStroke('#000');
                line.graphics.moveTo(i,0);
                line.graphics.lineTo(i,500);
                line.graphics.endStroke();
                stage.addChild(line);
            }
            
            for (var i = 0;i<=500;i += 50) {
                line.graphics.beginStroke('#000');
                line.graphics.moveTo(0,i);
                line.graphics.lineTo(460,i);
                line.graphics.endStroke();
                stage.addChild(line);
            }
			createjs.Ticker.addEventListener("tick", stage);
            createjs.Ticker.addEventListener("tick", tick);

            stage.autoClear = false;
            stage.enableDOMEvents(true);

            createjs.Touch.enable(stage);
            createjs.Ticker.setFPS(24);

            drawingCanvas = new createjs.Shape();

            stage.addEventListener("stagemousedown", handleMouseDown);
            stage.addEventListener("stagemouseup", handleMouseUp);


            stage.addChild(drawingCanvas);
            stage.update();
            
        });
        
        function tick(event) {
            stage.update();
        }
        
        
       

        function stop() {}

        function handleMouseDown(event) {
            distance = 0;
            count = 0;
            if (stage.contains(drawingCanvas)) { stage.clear();  }
            if (stage.contains(line1)) { stage.removeChild(line1);  }
            color = "#333";
            stroke = 8;
            oldPt = new createjs.Point(stage.mouseX, stage.mouseY);
            oldMidPt = oldPt;
            startPt = new createjs.Point(stage.mouseX, stage.mouseY);;
            stage.addEventListener("stagemousemove" , handleMouseMove);
            docdisp.innerHTML = displacement;
           
        }

        function handleMouseMove(event) {
            var midPt = new createjs.Point(oldPt.x + stage.mouseX>>1, oldPt.y+stage.mouseY>>1);
        count++;
            drawingCanvas.graphics.clear().setStrokeStyle(stroke, 'round', 'round').beginStroke(color).moveTo(midPt.x, midPt.y).curveTo(oldPt.x, oldPt.y, oldMidPt.x, oldMidPt.y);
            //console.log(stage.mouseX + " old " + oldPt.x);
          //  console.log( Math.sqrt((stage.mouseX - oldPt.x)*(stage.mouseX - oldPt.x) + (stage.mouseY - oldPt.y)*(stage.mouseY - oldPt.y)));
            distance += Math.sqrt((stage.mouseX - oldPt.x)*(stage.mouseX - oldPt.x) + (stage.mouseY - oldPt.y)*(stage.mouseY - oldPt.y));
           // console.log("disp" + displacement);
            /*if (count %5 == 0) {
                //code
            
            displacement += Math.sqrt((stage.mouseX - abc)*(stage.mouseX - abd) + (stage.mouseY - abc)*(stage.mouseY - abd));
                  abc = stage.mouseX;
                  abd = stage.mouseY;
                  console.log(abc);
            }*/
			docx.innerHTML = stage.mouseX;
			docy.innerHTML = stage.mouseY;
            oldPt.x = stage.mouseX;
            oldPt.y = stage.mouseY;
            

            oldMidPt.x = midPt.x;
            oldMidPt.y = midPt.y;

            stage.update();
        }

        function handleMouseUp(event) {
            line1 = new createjs.Shape();
            line1.graphics.setStrokeStyle(2);
            line1.graphics.beginStroke('red');
            line1.graphics.moveTo(startPt.x, startPt.y);
            line1.graphics.lineTo(stage.mouseX, stage.mouseY);
            line1.graphics.endStroke();
            stage.addChild(line1);
            distance/2.5 ;
            var displacement = Math.sqrt((stage.mouseX - startPt.x)*(stage.mouseX - startPt.x) + (stage.mouseY - startPt.y)*(stage.mouseY - startPt.y));
            docdist.innerHTML = distance/2.2;
			docdisp.innerHTML = displacement;
			console.log(distance);
            stage.removeEventListener("stagemousemove" , handleMouseMove);
        }


    