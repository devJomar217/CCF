function loadHtml(id, fileName){
    console.log(`div id: ${id}, filename: ${fileName}`);

    let xhttp;
    let element = document.getElementById(id);
    let file = fileName;
    
    if(file){
        xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            console.log(this.readyState);
            if(this.readyState == 4){
                if(this.status == 200) {
                    element.innerHTML = this.responseText;
                }
                if(this.status == 404) {element.innerHTML = "<h1>Page not found.</h1>"}
            }
        }
        xhttp.open("GET", `${file}`);
        xhttp.send();
        return;
    }
}

function loadLoginForm(id, fileName){
    console.log(`div id: ${id}, filename: ${fileName}`);

    let xhttp;
    let element = document.getElementById(id);
    let file = fileName;
    
    if(file){
        xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            console.log(this.readyState);
            if(this.readyState == 4){
                if(this.status == 200) {
                    element.innerHTML = this.responseText;
                    loadHtml("login-form", "./component/login/login-form.html");
                }
                if(this.status == 404) {element.innerHTML = "<h1>Page not found.</h1>"}
            }
        }
        xhttp.open("GET", `${file}`);
        xhttp.send();
        return;
    }
}