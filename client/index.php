<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<body>

<div id="chatlog">

</div>

<input id="chat" type="text" name="command">
<button id=submit></button>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
<script type="text/javascript">

    function connect(host, port) {
        ws = new WebSocket('ws://' + host + ':' + '8080');
        console.log(ws);
        return ws
    }

    function sendMessage() {
        message = $('#chat').val();
        ws.send(message);
    }

    function showMessage(message){
        $('#chatlog').append(message + '<br>');
        console.log('Message received:' + message);
    }

    ws = connect('52.74.90.15', '8080');
    // ws = connect('0.0.0.0', '8080');
    ws.onopen = function() {
        $('#submit').on('click', sendMessage);
    }
    ws.onmessage = function(event) {
        showMessage(event.data);
    }

    // ws.onclose = function() {
    //     // websocket is closed.
    //     console.log("Connection is closed...");
    // };
    console.log('script ended');
</script>

</body>
</html>
