<?php 

/**
 *一个多线程程序比单线程程序被操作系统调度的概率更大，所以多线程程序一般会比单线程程序更高效；
 *多线程程序的多个线程可以在多核 CPU 的多个核心同时运行，可以将完全发挥机器多核的优势；
 *线程的创建和切换的系统开销都比进程要小，所以一定程度上会比多进程更高效；
 *线程天生的共享内存空间，线程间的通信更简单，避免了进程IPC引入新的复杂度。

 *I/O 阻塞会使操作系统发生任务调度，阻塞当前任务，所以代码中 I/O 多的情况下，使用多线程时可以将代码并行。例如多次读整块的文件，或请求多个网络资源。
 *多线程能充分利用 CPU，所以有多处大计算量代码时，也可以使用多线程使他们并行执行，例如上文中后一个例子。


 * run()：此方法是一个抽象方法，每个线程都要实现此方法，线程开始运行后，此方法中的代码会自动执行；
 * start()：在主线程内调用此方法以开始运行一个线程；
 * join()：各个线程相对于主线程都是异步执行，调用此方法会等待线程执行结束；
 * kill()：强制线程结束；
 * isRunning()：返回线程的运行状态，线程正在执行run()方法的代码时会返回 true；
 */
class MultiThread extends Thread{
	public $url;
	public $response;
	public function __construct($url){
		$this->url = $url;
	}
	public function run()
	{
		 $this->response = file_get_contents($this->url);

	}
}	
$thread1 = new MultiThread('www.google.com');
$thread1 = new MultiThread('www.baidu.com');
$thread1->start();
$thread2->start();
$thread1->join();
$thread2->join();

$google = $thread1->response;
$baidu = $thread2->response;


