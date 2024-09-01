<!DOCTYPE html>
<html>
<body>
<h1>What Is queues?</h1>
<p>While building your web application, you may have some tasks, such as storing an uploaded CSV file, that take too long to perform during the web request.but Laravel allows you to easily create queued jobs that may be processed in the background. By moving time intensive tasks to a queue, your application can respond to web requests with blazing speed and provide a better user experience to your customers.</p>
<p>
Note that each connection configuration example in the queue configuration file contains a queue attribute. This is the default queue that jobs will be dispatched to when they are sent to a given connection. In other words, if you dispatch a job without explicitly defining which queue it should be dispatched to, the job will be placed on the queue that is defined in the queue attribute of the connection configuration:</p>

<h2>the distinction between "connections" and "queues"</h2>
<p> In your config/queue.php configuration file, there is a connections configuration array. This option defines the connections to backend queue services such as Amazon SQS, Beanstalk, or Redis. However, any given queue connection may have multiple "queues" which may be thought of as different stacks or piles of queued jobs.</p>

</body>
</html>