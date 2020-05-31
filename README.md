# Priority Queue in PHP
This README.md file describes the implementation of a Priority Queue written in PHP.  A Priority Queue permits pushing elements with a certain priority, but when an element is popped out, it will always be the most prioritized one.

In this queue, priorities are:

* **1:** highest priority
* **n:** lowest priority

## Uses
There are lots of uses for priority queues in the real world.  Here just some examples:

* 'On the fly' ordering.
* Various algorithmes, like Dijkstra and Prim.
* Managing Emergency Room's priority (use aging techniques!).
* Get the top N items of a collection.
* Managing shared resources between various processes.
* Job scheduling algorithms.
* Round robin scheduling.
* Recognizing a palindrome (funny!).

## Implementation
The queue is based on the ‘heap’ concept.  A heap is:

* A binary tree.
* Homogeneous and complete.
* Implemented on an array.
* Ordered the following way:
  * For every sub-node of the tree, the parent’s priority is higher than the priority of its children.

This is how the priority queue looks like using a binary tree:

[![Binary tree](http://oscarpascual.com/images/binary-tree.gif)](http://oscarpascual.com/images/binary-tree.gif)

*(This is the binary tree used in the test case)*

The implementation of the heap (the binary tree) on an array is very simple. The same structure as shown in the image above looks like this in an array:

[![Binary tree array](http://oscarpascual.com/images/binary-tree-array.gif)](http://oscarpascual.com/images/binary-tree-array.gif)

The operations a priority queue should offer are:

* Push an element with its priority.
* Pop an element (the highest priority element in the queue).
* Purge the queue (eliminate all its elements).
* Check if it is empty.
* Return the number of elements.

Pushing an element to the heap is done using the **'up-heap'** operation:

1. Add the element to the very last position of the heap.
2. Compare new element priority with its parent.  If lower, stop.
3. If priority is higher, switch positions and return to step 2.

By contrary, to pop an element we perform a **'down-heap'** operation:

1. Replace the first element with the last one.
2. Compare the top element priority with its children.  If higher, stop.
3. If priority is lower, switch the position with the first higher child and return to step 2.

Additional operations could be:

* Apply aging techniques to increase priority of old elements in order to avoid starvation death.  For this purpose there is already a timestamp in the queue.
* Print the queue.


### Cost analysis
Time complexity analysis of this implementation in big O notation.

| Operation | Cost |
|---|---|
| isEmpty | O(1) |
| purge | O(1) |
| count | O(1) |
| push | O(log n) in worst case |
| pop | O(log n) in worst case |


## Installation
First, clone this repository:

```sh
$ git clone https://github.com/oscarpascualbakker/priority-queue.git .
```

Then, run the commands to build and run the Docker image:

```sh
$ docker build -t priority-queue .
$ docker container run -it --rm --name my-priority-queue priority-queue php start.php
```

The output contains the number of elements in the queue, the queue elements with its priority, and the extraction of two elements for demonstration purposes.

Tests can be run this way:

```sh
$ docker container run -it --rm --name my-priority-queue priority-queue vendor/bin/phpunit ./tests
```

If you would like to modify the code, mount a volume:

```sh
$ docker container run --rm -v $(pwd):/usr/src/queue/ priority-queue php start.php
$ docker container run --rm -v $(pwd):/usr/src/queue/ priority-queue vendor/bin/phpunit ./tests
```


### Comments
Of course, don't hesitate to give me your feedback.  I'm glad to improve it with your help.

### **Cheers!**