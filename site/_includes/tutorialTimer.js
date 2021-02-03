{% raw %}
function tutorialTimer() {
   var expireDate = "<?php echo EXPIRES; ?>";
   // Set the date we're counting down to
   var countDownDate = new Date(expireDate).getTime();

   // Update the count down every 1 second
   var x = setInterval(function() {

      // Get todays date and time
      var now = new Date().getTime();

      // Find the distance between now and the count down date
      var distance = countDownDate - now;

      // If the count down is finished, write some text 
      if (distance < 0) {
         clearInterval(x);
         document.getElementById("tutorialTimer").innerHTML = "Your test drive has EXPIRED";
      } else {
         // Time calculations for days, hours, minutes and seconds
         var days = Math.floor(distance / (1000 * 60 * 60 * 24));
         var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
         var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
         var seconds = Math.floor((distance % (1000 * 60)) / 1000);

         // Display the result in the element with id="tutorialTimer"
         if (days > 0) {
            document.getElementById("tutorialTimer").innerHTML = 
                   "Your test drive expires in: " + days + "d " + hours 
                         + "h " + minutes + "m " + seconds + "s ";
         } else {
            document.getElementById("tutorialTimer").innerHTML = 
                   "Your test drive expires in: " + hours 
                         + "h " + minutes + "m " + seconds + "s ";
         }
      }
   }, 1000);
}
{% endraw %}
