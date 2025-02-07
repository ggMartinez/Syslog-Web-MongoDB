$("#applyMessageFilter").click(function(){
    var urlParams = new URLSearchParams(window.location.search);

    if ([...urlParams].length == 0)
        window.location.href = "/?message=" + encodeURIComponent($("#messageFilter").val());
    else {
        var destination = "?";
        for (let [key, value] of urlParams) {
            if (key !== "message")
                destination += "&" + key + "=" + value;
        }
        if ($("#messageFilter").val() !== "")
            destination += "&message=" + $("#messageFilter").val();

        window.location.href = destination;
    }
    

});


$('#messageFilter').keypress(function (e) {
    var key = e.which;
    var enterKeyCode = 13;
    if(key == enterKeyCode){
        $("#applyMessageFilter").trigger("click");
        return false;  
    }
   });  