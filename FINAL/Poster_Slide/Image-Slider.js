//1. set ul width
            //2. image when click prev/next button


//            function set()
//        {
//                var xmlhttp =  new XMLHttpRequest();
//                //xmlhttp.open("GET","https://www.cognalys.com/api/v1/otp/?app_id=05b84dbe7ff546d6a913c63&access_token=cd4b3b1d2bfada9571ac6a03acae09b83c232690&mobile=+91"+a,true);
//                xmlhttp.open("GET","TRY.php",true);
//                xmlhttp.onreadystatechange = function()
//                {
//                if(xmlhttp.readyState==4 && xmlhttp.status==200)
//                    {
//                        var response = xmlhttp.responseText.split("<br/>");
//                        var output = "<div class='container'><div class='slider_wrapper'><ul id='image_slider'>";
//                        for(i=0;i<response.length-1;i++)
//                        {
//                            var p = response[i];
//                            //alert("<img src='http://localhost/last/"+p+" ' width='100px' height='100px' />");
//                            //output +="<td><img src='http://localhost/last/"+p+"' width='100px' height='100px' /></td>";
//                            output +="<li><img src='http://localhost/last/"+p+"' width='800px' height='365px'></li>";
//                            //alert(output);
//                        }
//                            output+="</ul><span class='nvgt' id='prev'></span><span class='nvgt' id='next'></span></div></div>";
//                            document.getElementById("Grid").innerHTML=output;
//                    }
//                }
//                xmlhttp.send();
//        }


            var ul;
            var li_items;
            var imageNumber;
            var imageWidth;
            var prev, next;
            var currentPostion = 0;
            var currentImage = 0;
            
            function init()
            {
                //alert();
                ul = document.getElementById('image_slider');
                li_items = ul.children;
                imageNumber = li_items.length;
                imageWidth = li_items[0].children[0].clientWidth;
                ul.style.width = parseInt(imageWidth * imageNumber) + 'px';
                prev = document.getElementById("prev");
                next = document.getElementById("next");
                //.onclike = slide(-1) will be fired when onload;
                /*
                prev.onclick = function(){slide(-1);};
                next.onclick = function(){slide(1);};*/
                prev.onclick = function(){ onClickPrev();};
                next.onclick = function(){ onClickNext();};
            }

            function animate(opts)
            {
                var start = new Date;
                var id = setInterval(function(){
                    var timePassed = new Date - start;
                    var progress = timePassed / opts.duration;
                    if (progress > 1){
                        progress = 1;
                    }
                    var delta = opts.delta(progress);
                    opts.step(delta);
                    if (progress == 1){
                        clearInterval(id);
                        opts.callback();
                    }
                }, opts.delay || 17);
                //return id;
            }

            function slideTo(imageToGo)
            {
                var direction;
                var numOfImageToGo = Math.abs(imageToGo - currentImage);
                // slide toward left

                direction = currentImage > imageToGo ? 1 : -1;
                currentPostion = -1 * currentImage * imageWidth;
                var opts = {
                    duration:1000,
                    delta:function(p){return p;},
                    step:function(delta){
                        ul.style.left = parseInt(currentPostion + direction * delta * imageWidth * numOfImageToGo) + 'px';
                    },
                    callback:function(){currentImage = imageToGo;}
                };
                animate(opts);
            }

            function onClickPrev()
            {
                if (currentImage == 0){
                    slideTo(imageNumber - 1);
                }
                else{
                    slideTo(currentImage - 1);
                }
            }

            function onClickNext()
            {
                if (currentImage == imageNumber - 1)
                {
                    slideTo(0);
                }
                else
                {
                    slideTo(currentImage + 1);
                }
            }

            function autocall()
            {
                setInterval(onClickNext, 3000);
            }

            //window.onload = init;