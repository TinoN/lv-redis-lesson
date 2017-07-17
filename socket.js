var server = require('http').Server();

var io = require('socket.io')(server);

var Redis = require('ioredis');
var redis = new Redis();

//subscribe to channel defined in routes/web.php through Redis::Publish('test-channel', json_encode($data));
redis.subscribe('test-channel');

redis.on('message', function(channel, message){
	message = JSON.parse(message);

	io.emit(channel + ':' + message.event, message.data) //test-channel: UserSignedUp
});

server.listen(3000);