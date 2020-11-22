<?php

require_once './src/PriorityQueue.php';


// Create the priority queue
$queue = new PriorityQueue();


// Insert some elements
$queue->push("Element 1", 6);
$queue->push("Element 2", 5);
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


// Our queue should now have 21 elements
echo "The queue has ".$queue->count()." elements.\n";

// Let's print out the priorities in the queue
$queue->print();


// Let's pop some elements.  It should be "Element 6" and "Element 17".
$element1 = $queue->pop();
echo "I have popped out \"".$element1."\".\n";

$element2 = $queue->pop();
echo "I have popped out \"".$element2."\"\n";

// Our queue should now have 19 elements
echo "The queue has ".$queue->count()." elements.\n\n";


// TESTS

//Let's change first element priority.
$queue->change_priority("Element 13", 15);
echo "I have changed priority for element \"Element 13\"\n";

//Let's change last element priority.
$queue->change_priority("Element 19", 2);
echo "I have changed priority for element \"Element 19\".\n";

//Let's increase the priority of an intermediate element.
$queue->change_priority("Element 11", 2);
echo "I have changed priority for element \"Element 11\".\n";

//Let's decrease the priority of an intermediate element.
$queue->change_priority("Element 1", 14);
echo "I have changed priority for element \"Element 1\".\n";

//Changes done!
$queue->print();
?>