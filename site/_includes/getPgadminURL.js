{% raw %}
onload = function getPgadminURL() {
    var url = location.href;  // entire url including querystring 
    var indx = url.indexOf(':', 10);
    if (indx == -1) {
       // there was no port specified, so look for first /
       var indx = url.indexOf('/', 10);
    }
    var baseURL = url.substring(0, indx);
    var myurl = baseURL.substring(baseURL.indexOf(':')+1);
    //var myurl = "http:" + myurl + ":5430";
    var myurl = "http:" + myurl + "/pgadmin";

    var res = "<a target=\"_blank\" rel=\"noopener noreferrer\" href=\"" 
               + myurl + "\">" + myurl + "<\a>";
    document.getElementById("pgadminurl").innerHTML=unescape(res);
}
{% endraw %}
