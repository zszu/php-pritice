# websocket
	socket = new WebSocket(address , [protocol])
	url, 指定连接的 URL。第二个参数 protocol 是可选的，指定了可接受的子协议。

	1.概念
		WebSocket 是 HTML5 开始提供的一种在单个 TCP 连接上进行全双工通讯的协议。
	WebSocket 使得客户端和服务器之间的数据交换变得更加简单，允许服务端主动向客户端推送数据。在 WebSocket API 中，浏览器和服务器只需要完成一次握手，两者之间就直接可以创建持久性的连接，并进行双向数据传输。
	在 WebSocket API 中，浏览器和服务器只需要做一个握手的动作，然后，浏览器和服务器之间就形成了一条快速通道。两者之间就直接可以数据互相传送。
	现在，很多网站为了实现推送技术，所用的技术都是 Ajax 轮询。轮询是在特定的的时间间隔（如每1秒），由浏览器对服务器发出HTTP请求，然后由服务器返回最新的数据给客户端的浏览器。这种传统的模式带来很明显的缺点，即浏览器需要不断的向服务器发出请求，然而HTTP请求可能包含较长的头部，其中真正有效的数据可能只是很小的一部分，显然这样会浪费很多的带宽等资源。
	HTML5 定义的 WebSocket 协议，能更好的节省服务器资源和带宽，并且能够更实时地进行通讯。

	2.属性
		socket.readyState 只读属性 表示连接状态  0 - 表示连接尚未建立。1 - 表示连接已建立，可以进行通信。2 - 表示连接正在进行关闭。3 - 表示连接已经关闭或者连接不能打开。

		socket.bufferedAmount 只读属性 已被 send() 放入正在队列中等待传输，但是还没有发出的 UTF-8 文本字节数。
	3.事件
		open socket.onopen 连接建立时触发
		message socket.onmessage 客户端接收服务端数据时触发
		error socket.onerror 通信发生错误时触发
		colse socket.oncolse 连接关闭时触发
	4.方法
		socket.send 使用连接发送数据
		socket.close 关闭连接


	客户端请求
		```
			GET / HTTP/1.1
			Upgrade: websocket
			Connection: Upgrade
			Host: example.com
			Origin: http://example.com
			Sec-WebSocket-Key: sN9cRrP/n9NdMgdcy2VJFQ==
			Sec-WebSocket-Version: 13
		```
	服务器响应
		```
		HTTP/1.1 101 Switching Protocols
		Upgrade: websocket
		Connection: Upgrade
		Sec-WebSocket-Accept: fFBooB7FAkLlXgRSz0BT3v4hq5s=
		Sec-WebSocket-Location: ws://example.com/
		```



	example:
		```
			<!DOCTYPE HTML>
			<html>
			   <head>
			   <meta charset="utf-8">
			   <title>菜鸟教程(runoob.com)</title>
			    
			      <script type="text/javascript">
			         function WebSocketTest()
			         {
			            if ("WebSocket" in window)
			            {
			               alert("您的浏览器支持 WebSocket!");
			               
			               // 打开一个 web socket
			               var ws = new WebSocket("ws://localhost:9998/echo");
			                
			               ws.onopen = function()
			               {
			                  // Web Socket 已连接上，使用 send() 方法发送数据
			                  ws.send("发送数据");
			                  alert("数据发送中...");
			               };
			                
			               ws.onmessage = function (evt) 
			               { 
			                  var received_msg = evt.data;
			                  alert("数据已接收...");
			               };
			                
			               ws.onclose = function()
			               { 
			                  // 关闭 websocket
			                  alert("连接已关闭..."); 
			               };
			            }
			            
			            else
			            {
			               // 浏览器不支持 WebSocket
			               alert("您的浏览器不支持 WebSocket!");
			            }
			         }
			      </script>
			        
			   </head>
			   <body>
			   
			      <div id="sse">
			         <a href="javascript:WebSocketTest()">运行 WebSocket</a>
			      </div>
			      
			   </body>
			</html>
		```

