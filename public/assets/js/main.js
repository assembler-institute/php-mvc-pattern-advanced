const buttons = document.querySelectorAll(".btnDelete");

buttons.forEach(button => {
    button.addEventListener("click", function(){
        const contentId = this.dataset.content_id;
        
        const confirm = window.confirm("Do you want to delete the selected content?");

        if(confirm){
            //AJAX request
            httpRequest("http://puchu/MVC_Advanced/consult/deleteContent/" + contentId, function(){
                console.log(this.responseText);

                const tbody = document.querySelector("#tbody-contents");
                const row = document.querySelector("#row-" + contentId);
                tbody.removeChild(row);

                document.querySelector("#responseContent").innerHTML = this.responseText;
            });
        }
    });
});


function httpRequest(url, callback){
    const http = new XMLHttpRequest();
    http.open("GET", url);
    http.send();

    http.onreadystatechange = function(){
        if(this.readyState == 4 && this.status == 200){
            callback.apply(http);
        }
    }
}