setInterval(()=>{

    const time = document.querySelector(".digital_clock");
    let date = new Date();
    let hours = date.getHours();
    let minutes = date.getMinutes();
    let seconds = date.getSeconds();
    let AM_PM = "AM";

    if(hours > 11)
    {
       AM_PM = "PM";
       hours = hours -12;
    }

    if(hours == 0)
    {
       
       hours =  12;
    }

    if(hours < 10)
    {
       
       seconds = "0"+ seconds;
    }

     if(hours < 10)
    {
       
       minutes = "0"+ minutes;
    }

    time.textContent = hours+":"+minutes+":"+seconds+":"+AM_PM;

   })