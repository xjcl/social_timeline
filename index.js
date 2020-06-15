// https://stackoverflow.com/a/9251169/2111778
var _escape = document.createElement('textarea');
function escapeHTML(html) {
    _escape.textContent = html;
    return _escape.innerHTML;
}

// https://stackoverflow.com/a/18324384/2111778
// make an asynchronous request to the backend with a callback accepting the response string
function callAjax(callback, req_type, req_url, req_body) {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (xmlhttp.readyState == XMLHttpRequest.DONE && xmlhttp.status == 200) {
            callback(xmlhttp.responseText);
        }
    }
    xmlhttp.open(req_type, req_url, true);
    xmlhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    xmlhttp.send(req_body);
}

// get all posts as an unprocessed JSON array from the backend and generate appropriate HTML
function getAllPosts() {
    callAjax(function(responseText) {
        json_arr = JSON.parse(responseText);
        var str_arr = json_arr.map(post =>
            // https://stackoverflow.com/a/784547/2111778
            `${escapeHTML(post.content).replace(/(?:\r\n|\r|\n)/g, '<br>')}<br>` +
            `<button onclick=\"deletePost(${post.id})\" class="buttonSocial buttonDelete">` +
            `Delete</button><br><br>`
        );
        document.getElementById("txtPosts").innerHTML = str_arr.join(" ");
    },
    "GET", "get.php", "");
}

function deletePost(id) {
    callAjax(getAllPosts, "POST", "delete.php?id=" + id, "");
}

function createPost(content) {
    callAjax(function() {
        // clear the text field for future inputs
        document.getElementById("newpost").value = "";
        getAllPosts();
    }
    , "POST", "create.php", content);
}
