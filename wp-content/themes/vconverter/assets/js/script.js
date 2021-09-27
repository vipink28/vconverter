(function($) {
    $(document).ready(function(){

      $.get(
        "https://recruiting.paylocity.com/recruiting/v2/api/feed/jobs/7b62d1e5-02eb-4c84-9d0a-f80ba7b7d794", // url
        function (data, textStatus, jqXHR) {
          // success callback
        //   console.log(JSON.parse(data).jobs);
    
          $.each(JSON.parse(data).jobs, function (i, data) {
            $("#listing2").append(
              '<div id="job-listings">' +
              '<div class="vconverter-job-title">' +
                data.title +
                "</div>" +
                '<div class="vconverter-job-info"><span class="vconverter-job-location font-weight-bold">Location: </span><span>' +
                data.jobLocation.locationDisplayName +
                "</span></div>" +
                '<div class="vconverter-job-description">' +
                data.description +
                '<div class="vconverter-job-apply-link"><a href=' +
                data.applyUrl +
                ' target="_blank">Apply Now</a></div></div>' +
                '<div class="toggle-btn"><span class="show-btn">+ View Details</span><span class="hide-btn">- View Details</span></div>'+
                '</div>'

            );
          });
        }
      );



        $('.carousel').carousel();

        $(".listing1").click(function () {
          $(this).parent().siblings().find(".listlink").removeClass("active");
          $(this).addClass("active");
          $("#listing2").fadeOut();
          $("#listing1").fadeIn();
        });
    
        $(".listing2").click(function () {
          $(this).parent().siblings().find(".listlink").removeClass("active");
          $(this).addClass("active");
          $("#listing1").fadeOut();
          $("#listing2").fadeIn();
        });
    
        $(document).on("click", ".toggle-btn", function () {
          $(this).find("span").toggleClass("hide-btn show-btn");
          $(this).siblings(".vconverter-job-description").toggle();
        });     

   });
   

   //popup form code

   var wpcf7Elm = document.querySelectorAll( '.wpcf7' );
        for(var i = 0; i<wpcf7Elm.length; i++){
        wpcf7Elm[i].addEventListener( 'wpcf7submit', function(e) {
          var formId = e.detail.unitTag;  
          $('#'+formId).parent().addClass('sent');         
            $('#'+formId).closest('.pum-container').css('width','40%');
            $(window).trigger('resize');                      
          // setTimeout(function(){            
          //   var message = $('#'+formId).find('.wpcf7-response-output').html();              
          //   var result = message.replace(/\./g,'.<br/>');
          //   $('#'+formId).find('.wpcf7-response-output').html(result);
            
          // }, 200);
        }, false );
      }


   function handleFullWidthSizing(){
     const scrollbarWidth = window.innerWidth - document.body.clientWidth;    
     $('.page .entry-header:not(:empty)').css('width',`calc(100vw - ${scrollbarWidth}px)`);
     $('.page .location-header:not(:empty)').css('width',`calc(100vw - ${scrollbarWidth}px)`);
     $('.loc-title:not(:empty)').css('width',`calc(100vw - ${scrollbarWidth}px)`);
     $('.dark-bg:not(:empty)').css('width',`calc(100vw - ${scrollbarWidth}px)`);
     $('.career-job-section:not(:empty)').css('width',`calc(100vw - ${scrollbarWidth}px)`);
     $('.divider-img').css('width',`calc(100vw - ${scrollbarWidth}px)`);
   }
   handleFullWidthSizing();

  }(jQuery));