
function createRequestObject() {
    var http;
    if (navigator.appName == "Microsoft Internet Explorer") {
        http = new ActiveXObject("Microsoft.XMLHTTP");
    }
    else {
        http = new XMLHttpRequest();
    }
    return http;
}
 
function sendRequest() {
    var http = createRequestObject();
    http.open("GET", "upload.php",true);
    http.onreadystatechange = function () { handleResponse(http); };
    http.send(null);
    var http2 = createRequestObject();
    http2.open("GET", "upload2.php",true);
    http2.onreadystatechange = function () { handleResponse2(http2); };
    http2.send(null);
    var http3 = createRequestObject();
    http3.open("GET", "upload3.php",true);
    http3.onreadystatechange = function () { handleResponse3(http3); };
    http3.send(null);
}
 
function handleResponse(http) {
    var response;
    if (http.readyState == 4 && http.status == 200) {
        response = http.responseText;
    	document.getElementById("demo").value=response;
 
        if (response < 100) {
            setTimeout("sendRequest()", 1000);
        }
    }
}

function handleResponse2(http) {
    var response;
    if (http.readyState == 4 && http.status == 200) {
        response = http.responseText;
    	document.getElementById("demo1").value=response;
 
    }
}

function handleResponse3(http) {
    var response;
    if (http.readyState == 4 && http.status == 200) {
        response = http.responseText;
    	displayUploadedFiles(response);
	//document.getElementById("demo2").value=response;
    }
}

function  displayUploadedFiles(response){
 var response = response.split(",");
 var tempResponse=""
 for(i=0;i<response.length;i++){
  tempResponse+=response[i]+"\n"; 
 }
 document.getElementById("demo2").value=tempResponse;
 
}

function startUpload() {
    
    setTimeout("sendRequest()", 1000);
}
 
(function () {
    document.getElementById("myForm").onsubmit = startUpload;
})();