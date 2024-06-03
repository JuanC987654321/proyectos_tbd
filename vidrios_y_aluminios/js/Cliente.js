
updateProgressBar();

function updateProgressBar(){
    let cookieStatus = getCookie("OrderStatus")

    var progreso = document.querySelector('.progress-bar');
    
    switch(cookieStatus){
        //los nombres de las fases no son finales, ademas de
        //que depende si son 4 o 5 el porcentaje que avanzra
        //entre una y otra
        case "":
            progreso.style.width = "20%";
            progreso.innerHTML = "20%";
            break;

            
        case "En proceso":
            progreso.style.width = "40%";
            progreso.innerHTML = "40%";
            break;
        
        
        case "":
            progreso.style.width = "60%";
            progreso.innerHTML = "60%";
            break;

        case "":
            progreso.style.width = "80%";
            progreso.innerHTML = "80%";
            break;
                
        case "Completado":
            progreso.style.width = "100%";
            progreso.innerHTML = "100%";
            break;

        default:
            console.log("a");
            break; 
    }
}

function getCookie(cname) {
    let name = cname + "=";
    let decodedCookie = decodeURIComponent(document.cookie);
    let ca = decodedCookie.split(';');
    for(let i = 0; i <ca.length; i++) {
        let c = ca[i];
        while (c.charAt(0) == ' ') {
            c = c.substring(1);
        }
        if (c.indexOf(name) == 0) {
            return c.substring(name.length, c.length);
        }
    }
    return "";
}