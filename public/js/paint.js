// let fx = 0;
// let fy = 0;
// let lx = 0;
// let ly = 0;
// let dragging = false;
// let canvas = document.getElementById("myCanvas");
// let ctx = canvas.getContext("2d");
// $("canvas").on("mousedown", (e)=>{
//     dragging = true;
//     let coors = getPosition(e)
//     fx = coors.X;
//     fy = coors.Y;
//     ctx.beginPath();
//     ctx.moveTo(fx,fy);
//     ctx.lineTo(3,fy);
//     ctx.strokeStyle="red";
//     ctx.stroke();
// });
// $("canvas").on("mousemove",(e)=>{
//     if(dragging) {
//         // console.log(fx, fy);
//         let lx = e.offsetX;
//         let ly = e.offsetY;
//         console.log(lx,ly);
//         ctx.beginPath();
//         ctx.moveTo(fx,fy);
//         ctx.lineTo(lx,ly);
//         ctx.strokeStyle="red";
//         ctx.stroke();
//         fx = lx;
//         fy = ly;
//     }
// });
// $("canvas").on("mouseup",(e)=>{
//     dragging = false;
// })


let pos = {
    drawable: false,
    x: -1,
    y: -1
};

let canvas, ctx, dataURL;
window.onload = function(e) {
    
    canvas =  document.getElementById("canvas");
    
    ctx = canvas.getContext("2d");
    a();
}
function a() {
    canvas.width = $("canvas").width();
    canvas.height = $("canvas").height();
    
    ctx.strokeStye="red";

    canvas.addEventListener("mousedown", listener);
    canvas.addEventListener("mousemove", listener);
    canvas.addEventListener("mouseup", listener);
    canvas.addEventListener("mouseout", listener);
}
$(window).resize(function(e){
    ctx.drawImage(dataURL);
    
    a();
});

function listener(e) {
    switch(e.type) {
        case "mousedown" : 
            initDraw(e);
            break;
        case "mousemove" :
            if(pos.drawable) {
                draw(e);
            }
                
            break;
        case "mouseout" :
        case "mouseup" :
            finishDraw(e);
            break;
    }
}

function initDraw(e) {
    console.log(e.type);
    ctx.beginPath();
    pos.drawable = true;
    var coors = getPosition(e);
    pos.X = coors.X;
    pos.Y = coors.Y;
    ctx.moveTo(pos.X, pos.Y);
}

function draw(e) {
    console.log(e.type);
    var coors = getPosition(e);
    ctx.lineTo(coors.X, coors.Y);
    pos.X = coors.X;
    pos.Y = coors.Y;
    ctx.stroke();
}

function finishDraw(e) {
    console.log(e.type);
    pos.drawable = false;
    pos.X = -1;
    pos.Y = -1;
    
    dataURL = canvas.toDataURL();
}

function getPosition(e) {
    let x = e.pageX - canvas.offsetLeft;
    let y = e.pageY - canvas.offsetTop;
    return {X:x, Y:y};
}
