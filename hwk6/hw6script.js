


$(document).ready(function(){
    const apiKey = "QxsDf29Nf9KWvJlpSCOGPH1YdPOc975UFD4U4eVO";
    const baseURL = "https://api.nasa.gov/planetary/apod?api_key=QxsDf29Nf9KWvJlpSCOGPH1YdPOc975UFD4U4eVO";

    $("table").hide();
    $("#errorBox").hide();


    $("#submitBtn").click(function(){
        $("#errorBox").hide();
        //get the date from the input box and make sure it's in the range 6/16/1995 - Current Date
        var date = $("#dateBox").val();

        if (validate(date))
            return;

        var hd = $("#HDBox").is(':checked');
        var queryURL = baseURL + "&date=" + date + "&" + "hd=" + hd;
        /*$.get(queryURL, (json, status) function(){
            if(status == "success") {
                alert("success");
        }
        });*/
        $.ajaxSetup({url: queryURL, error:function(result) {
            $("#errorBox").text("Enter a valid date");
            $("#errorBox").fadeIn(400).fadeOut(400).fadeIn(400).fadeIn(400).fadeOut(400).fadeIn(400);
            return;
        }});
        $.ajaxSetup({url: queryURL, success:function(result) {
            $("table").fadeIn(1500, "swing");
            $("#queryBox").animate({top: "350px"});
        }});
        $.ajax();



    });

    function validate(date) {
        var dateArr= date.split("-");
        var today = new Date();

        if(dateArr[0] < 1995 || dateArr[0] > today.getFullYear()) {
            $("#errorBox").text("Enter a date in the range 6/16/1995 - today");
            $("#errorBox").fadeIn(400).fadeOut(400).fadeIn(400).fadeIn(400).fadeOut(400).fadeIn(400);
            return true;
        }

        if (dateArr[0] == 1995 && dateArr[1] < 6) {
            $("#errorBox").text("Enter a date after 06/16/1995");
            $("#errorBox").fadeIn(400).fadeOut(400).fadeIn(400).fadeIn(400).fadeOut(400).fadeIn(400);
            return true;
        }
        if (dateArr[0] == 1995 && dateArr[1] == 6 && dateArr[2] < 16) {
            $("#errorBox").text("Enter a date after 06/16/1995");
            $("#errorBox").fadeIn(400).fadeOut(400).fadeIn(400).fadeIn(400).fadeOut(400).fadeIn(400);
            return true;
        }
        if (dateArr[0] == today.getFullYear() && dateArr[1] > (today.getMonth()) + 1) {
            $("#errorBox").text("Enter a date before today");
            $("#errorBox").fadeIn(400).fadeOut(400).fadeIn(400).fadeIn(400).fadeOut(400).fadeIn(400);
            return true;
        }
        if (dateArr[0] == today.getFullYear() && dateArr[1] == (today.getMonth() + 1) && dateArr[2] > today.getDate()) {
            $("#errorBox").text("Enter a date before today");
            $("#errorBox").fadeIn(400).fadeOut(400).fadeIn(400).fadeIn(400).fadeOut(400).fadeIn(400);
            return true;
        }

        return false;
    }
});