try {
		      var j=jQuery.noConflict();
		        var front_uploaded_flag=false;
		        var side_uploaded_flag=false;
		        var global_view ="Front";
		        var video_streaming=false;
		        var tryOnImgUrl='';
		        var tryOnSideImgUrl='';
		        var productid='';
		        j( function() {
		        j( "#galssimagediv" ).draggable();
		        j( "#TryOnModal-dialog" ).draggable();
		        j( "#galssimagediv" ).resizable();
		                
		            } );
		        
		        rotate=0;
		      
		        
		        function rotate_right(){
		            rotate=rotate+1;
		            document.getElementById("galssimagediv").style.webkitTransform="rotate("+rotate+"deg)";
		            
		        }
		        function rotate_left(){
		             rotate=rotate-1;
		            document.getElementById("galssimagediv").style.webkitTransform="rotate("+rotate+"deg)";
		            
		        }
		        function zoom_out(){
		            var width= j("#galssimagediv").width();
		            j("#galssimagediv").width( width - (width * 0.05)) ;
		           
		        }
		        function zoom_in(){
		            var width= j("#galssimagediv").width();
		            j("#galssimagediv").width( width + (width * 0.05)) ;
		            
		        }
		        function upload(){
		            j("#imageLoader").click();
		        }
		}
		catch(err){
		  console.log(err.message);
		}

