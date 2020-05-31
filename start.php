<?php

require_once './src/PriorityQueue.php';


// Create the priority queue
$queue = new PriorityQueue();


// Insert some elements
$queue->push("Element 1", 6);
$queue->push("Element 2", 10);
$queue->push("Element 3", 9);
$queue->push("Element 4", 14);
$queue->push("Element 5", 8);
$queue->push("Element 6", 1);      //Highest priority
$queue->push("Element 7", 19);
$queue->push("Element 8", 23);
$queue->push("Element 9", 7);
$queue->push("Element 10", 16);
$queue->push("Element 11", 17);
$queue->push("Element 12", 12);
$queue->push("Element 13", 3);
$queue->push("Element 14", 4);
$queue->push("Element 15", 14);
$queue->push("Element 16", 13);
$queue->push("Element 17", 2);      //Second highest priority
$queue->push("Element 18", 4);
$queue->push("Element 19", 18);
$queue->push("Element 20", 16);
$queue->push("Element 21", 8);

// Our queue should now have 7 elements
echo "The queue has ".$queue->count()." elements.\n";

// Let's print out the priorities in the queue
$queue->print();


// Let's pop some elements.  It should be "Element 6" and "Element 17".
$element1 = $queue->pop();
echo "I have popped out \"".$element1."\".\n";
$element2 = $queue->pop();
echo "I have popped out \"".$element2."\"\n";
?>