var anhArr=[];
            var count=0;
            var t;
            // var slide=document.getElementById("mySlide");
            function loadAnh(){
                t=window.setInterval(next,3000);
                for(var i=1;i<5;i++){
                    anhArr[i]=new Image();
                    anhArr[i].src="image/imageslide/slide"+i+".jpg";
                }
            }  
            function next(){  
                count++;             
                if(count>4){
                    count=0;
                }
                document.getElementById("mySlide").src=anhArr[count].src;
            }
            function back(){
                count--;
                if(count<0){
                    count=4;
                    
                }
                document.getElementById("mySlide").src=anhArr[count].src;
            }