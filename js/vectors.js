var stage;
        var line = new Array();
        var aplusb;
        var negline;
        var aminb;
        var angle;
        var headlen = 10;
        var ptime;
        var fromx = new Array();
        var fromy = new Array();
        var tox = new Array(), toy = new Array();
        /*
         *function canvas_arrow(context, fromx, fromy, tox, toy){
    var headlen = 10;   // length of head in pixels
    var angle = Math.atan2(toy-fromy,tox-fromx);
    context.moveTo(fromx, fromy);
    context.lineTo(tox, toy);
    context.lineTo(tox-headlen*Math.cos(angle-Math.PI/6),toy-headlen*Math.sin(angle-Math.PI/6));
    context.moveTo(tox, toy);
    context.lineTo(tox-headlen*Math.cos(angle+Math.PI/6),toy-headlen*Math.sin(angle+Math.PI/6));
}
*/
        $(function() {
            stage = new createjs.Stage("mycanvas");
            
        
            createjs.Ticker.addEventListener("tick", stage);
            stage.addEventListener("stagemousedown", handleMouseDown);
            stage.addEventListener("stagemouseup", handleMouseUp);
            createjs.Ticker.setFPS(10);
            //createjs.Ticker.addEventListener("tick", tick);
        });
        
        function handleMouseDown(event) {
            if (stage.mouseInBounds) {
                fromx.push(stage.mouseX);
                fromy.push(stage.mouseY);
            }
        }
        
        function handleMouseUp(event) {
            
            if (stage.mouseInBounds) {
                tox.push(stage.mouseX);
                toy.push(stage.mouseY);
                console.log(fromx.length);  
                line[line.length] = new createjs.Shape();
                line[line.length - 1].graphics.beginStroke('#000');
                var fx = fromx[fromx.length - 1],fy = fromy[fromy.length - 1];
                var tx = tox[tox.length - 1], ty = toy[toy.length - 1];
                console.log(tx);
                console.log(ty);
                line[line.length - 1].graphics.moveTo(fx, fy);
                line[line.length - 1].graphics.lineTo(tx, ty);
                angle = Math.atan2(ty - fy, tx - fx);
                line[line.length - 1].graphics.lineTo(tx-headlen*Math.cos(angle-Math.PI/6),ty-headlen*Math.sin(angle-Math.PI/6));
                line[line.length - 1].graphics.moveTo(tx, ty);
                line[line.length - 1].graphics.lineTo(tx-headlen*Math.cos(angle+Math.PI/6),ty-headlen*Math.sin(angle+Math.PI/6));
                line[line.length - 1].graphics.endStroke();
                stage.addChild(line[line.length - 1]);
                
                
                stage.update();
            }
           
            
          
            
        }
        function tick(event) {
            console.log("dasd");
            if(createjs.Ticker.getTime() - ptime > 2500.00 && createjs.Ticker.getTime() - ptime <2600){
                console.log("Dfasf");
            negline = new createjs.Shape;
            negline.graphics.beginStroke('blue');
            negline.graphics.moveTo(tox[0],toy[0]);
            negline.graphics.lineTo(tox[0] - (tox[1] - fromx[1]),toy[0] - (toy[1] - fromy[1]));
            
            angle = Math.atan2(toy[0] - (toy[1] - fromy[1]) - toy[0], tox[0] - (tox[1] - fromx[1]) - tox[0]);
            negline.graphics.lineTo(tox[0] - (tox[1] - fromx[1])-headlen*Math.cos(angle-Math.PI/6),toy[0] - (toy[1] - fromy[1])-headlen*Math.sin(angle-Math.PI/6));
            negline.graphics.moveTo(tox[0] - (tox[1] - fromx[1]), toy[0] - (toy[1] - fromy[1]));
            negline.graphics.lineTo(tox[0] - (tox[1] - fromx[1])-headlen*Math.cos(angle+Math.PI/6),toy[0] - (toy[1] - fromy[1])-headlen*Math.sin(angle+Math.PI/6));
            negline.graphics.endStroke();
            stage.addChild(negline);
            
            aminb = new createjs.Shape();
            stage.update();
            }
            if(createjs.Ticker.getTime() - ptime > 3000.00 && createjs.Ticker.getTime() - ptime <3100){
            aminb.graphics.beginStroke('red');
            aminb.graphics.setStrokeStyle(3);
            aminb.graphics.moveTo(fromx[0], fromy[0]);
            aminb.graphics.lineTo(tox[0] - (tox[1] - fromx[1]),toy[0] - (toy[1] - fromy[1]));
            angle = Math.atan2(toy[0] - (toy[1] - fromy[1]) - fromy[0], tox[0] - (tox[1] - fromx[1]) - fromx[0]);
            aminb.graphics.lineTo(tox[0] - (tox[1] - fromx[1])-headlen*Math.cos(angle-Math.PI/6),toy[0] - (toy[1] - fromy[1])-headlen*Math.sin(angle-Math.PI/6));
            aminb.graphics.moveTo(tox[0] - (tox[1] - fromx[1]),toy[0] - (toy[1] - fromy[1]));
            aminb.graphics.lineTo(tox[0] - (tox[1] - fromx[1])-headlen*Math.cos(angle+Math.PI/6),toy[0] - (toy[1] - fromy[1])-headlen*Math.sin(angle+Math.PI/6));
            aminb.graphics.endStroke();
            stage.addChild(aminb);
            
            stage.update();
            }
            if (createjs.Ticker.getTime() - ptime > 4000) {
                createjs.Ticker.removeEventListener("tick",tick);
            }
            
        }
        
        function tick1(event) {
            console.log("dasjjd");
           
            if(createjs.Ticker.getTime() - ptime > 2500.00 && createjs.Ticker.getTime() - ptime <2600){
            aplusb = new createjs.Shape();
            aplusb.graphics.beginStroke('red');
            aplusb.graphics.setStrokeStyle(3);
            aplusb.graphics.moveTo(fromx[0], fromy[0]);
            aplusb.graphics.lineTo(tox[0] + (tox[1] - fromx[1]),toy[0] + (toy[1] - fromy[1]));
            angle = Math.atan2(toy[0] + (toy[1] - fromy[1]) - fromy[0], tox[0] + (tox[1] - fromx[1]) - fromx[0]);
            aplusb.graphics.lineTo(tox[0] + (tox[1] - fromx[1])-headlen*Math.cos(angle-Math.PI/6),toy[0] + (toy[1] - fromy[1])-headlen*Math.sin(angle-Math.PI/6));
            aplusb.graphics.moveTo(tox[0] + (tox[1] - fromx[1]),toy[0] + (toy[1] - fromy[1]));
            aplusb.graphics.lineTo(tox[0] + (tox[1] - fromx[1])-headlen*Math.cos(angle+Math.PI/6),toy[0] + (toy[1] - fromy[1])-headlen*Math.sin(angle+Math.PI/6));
            aplusb.graphics.endStroke();
            stage.addChild(aplusb);
            
            stage.update();
            }
            if (createjs.Ticker.getTime() - ptime > 3000) {
                createjs.Ticker.removeEventListener("tick",tick1);
            }
            
        }
        
        function show_components() {
               line1 = new createjs.Shape();
            /* line1.graphics.beginStroke('#000');
            line1.graphics.moveTo(250,250);
            line1.graphics.lineTo(250,260);
            line1.graphics.endStroke();*/
         
            
          
           /* var tween = new createjs.Tween.get(line1,{loop:true}, false)
                            .to({scaleY: 50}, 2000);*/
            for (var i = 0;i<fromx.length;i++) {
                var fx = fromx[i],fy = fromy[i],tx = tox[i], ty = toy[i];
            
                for (var j = fy;((ty - fy) >= 0?(j<=ty):(j>=ty)); ((ty - fy) >= 0 ? j += 3 : j -= 3)) {
                    line1.graphics.beginStroke('red');
                    line1.graphics.moveTo(tx,j);
                    line1.graphics.lineTo(tx, ((ty - fy) >= 0 ? j + 3 : j - 3));
                    ((ty - fy) >= 0 ? j += 3 : j -= 3)
                    line1.graphics.endStroke();
                    stage.addChild(line1);
                    stage.update();
                }
                
                for (var j = fx ;(tx - fx >= 0 ? (j <= tx) : (j >= tx)); (tx - fx >= 0 ? j += 3 : j -= 3)) {
                    line1.graphics.beginStroke('red');
                    line1.graphics.moveTo(j,ty);
                    line1.graphics.lineTo(((tx - fx) >= 0 ? j + 3 : j - 3), ty);
                    ((tx - fx) >= 0 ? j += 3 : j -= 3)
                    line1.graphics.endStroke();
                    stage.addChild(line1);
                    stage.update();
                }
                //horizontal line
                line1.graphics.beginStroke('blue');
                line1.graphics.setStrokeStyle(3);
                line1.graphics.moveTo(fx,fy);
                line1.graphics.lineTo(tx, fy);
                angle = Math.atan2(0, tx - fx);
                line1.graphics.lineTo(tx-headlen*Math.cos(angle-Math.PI/6),fy-headlen*Math.sin(angle-Math.PI/6));
                line1.graphics.moveTo(tx, fy);
                line1.graphics.lineTo(tx-headlen*Math.cos(angle+Math.PI/6),fy-headlen*Math.sin(angle+Math.PI/6));
    
                line1.graphics.endStroke();
                stage.addChild(line1);
                //vertical line
                line1.graphics.beginStroke('blue');
                line1.graphics.setStrokeStyle(3);
                line1.graphics.moveTo(fx,fy);
                line1.graphics.lineTo(fx, ty);
                angle = Math.atan2(ty - fy, 0);
                line1.graphics.lineTo(fx-headlen*Math.cos(angle-Math.PI/6),ty-headlen*Math.sin(angle-Math.PI/6));
                line1.graphics.moveTo(fx, ty);
                line1.graphics.lineTo(fx-headlen*Math.cos(angle+Math.PI/6),ty-headlen*Math.sin(angle+Math.PI/6));
    
                line1.graphics.endStroke();
                stage.addChild(line1);
            }
        
            
            
               //   stage.addChild(line1);
            stage.update();
            //createjs.Ticker.addEventListener("tick", tick);
        }
        /* var tween = new createjs.Tween.get(line1,{loop:true}, false)
                            .to({scaleY: 50}, 2000);*/
        function addition() {
            ptime = createjs.Ticker.getTime();
            var asd = stage.getChildAt(0);
            console.log(asd.x + " " + asd.y);
            //asd = stage.getChildAt(1);
            //console.log(asd.x + " " + asd.y);
            var xx = tox[0] - fromx[1], yy = toy[0] - fromy[1];
            var tween = new createjs.Tween.get(stage.getChildAt(1), {loop:false}).to({x:xx,y:yy}, 2000)
                        ;//{x:stage.getChildAt(0).x, y:stage.getChildAt(0).y}, 2000);
           /* aplusb = new createjs.Shape();
            
            aplusb.graphics.beginStroke('red');
            aplusb.graphics.setStrokeStyle(3);
            aplusb.graphics.moveTo(fromx[0], fromy[0]);
            aplusb.graphics.lineTo(tox[0] + (tox[1] - fromx[1]),toy[0] + (toy[1] - fromy[1]));
            angle = Math.atan2(toy[0] + (toy[1] - fromy[1]) - fromy[0], tox[0] + (tox[1] - fromx[1]) - fromx[0]);
            aplusb.graphics.lineTo(tox[0] + (tox[1] - fromx[1])-headlen*Math.cos(angle-Math.PI/6),toy[0] + (toy[1] - fromy[1])-headlen*Math.sin(angle-Math.PI/6));
            aplusb.graphics.moveTo(tox[0] + (tox[1] - fromx[1]),toy[0] + (toy[1] - fromy[1]));
            aplusb.graphics.lineTo(tox[0] + (tox[1] - fromx[1])-headlen*Math.cos(angle+Math.PI/6),toy[0] + (toy[1] - fromy[1])-headlen*Math.sin(angle+Math.PI/6));
            aplusb.graphics.endStroke();
            stage.addChild(aplusb);*/
           createjs.Ticker.addEventListener("tick", tick1);
            stage.update();
        }
        
        function substraction() {
            ptime = createjs.Ticker.getTime();
            console.log(ptime);
            var xx = tox[0] - fromx[1], yy = toy[0] - fromy[1];
            var tween = new createjs.Tween.get(stage.getChildAt(1), {loop:false}).to({x:xx,y:yy}, 2000);
            createjs.Ticker.addEventListener("tick", tick);
            //negline = new createjs.Shape();
            
        }
        function reset() {
            stage.removeAllChildren();
            if (createjs.Ticker.hasEventListener()) {
                //code
            
            createjs.Ticker.removeAllListeners();
            }
            fromx = new Array();
            fromy = new Array();
            tox = new Array();
            toy = new Array();
            line = new Array();
            console.log("len"+fromx.length);    
            
            stage.update();
            
        }

    