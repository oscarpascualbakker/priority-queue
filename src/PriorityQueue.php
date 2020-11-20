<?php

require_once 'PriorityQueueInterface.php';


/**
 * This priority queue is based on the 'heap' concept (a 'heap' is an ordered stack) and is
 * implemented using a binary tree.
 * It's first element should be 1.
 *
 * @author Oscar Pascual <oscar.pascual@gmail.com>
 */
class PriorityQueue implements PriorityQueueInterface
{

    protected $queue;
    protected $num_elements;


    /**
     * Create a new queue (an array) without elements in it.
     * We create a bidimensional array for element and priority.
     */
    public function __construct()
    {
        $this->queue        = array(array());
        $this->num_elements = 0;
    }


    /**
     * Returns a boolean indicating wether the queue is empty or not.
     * (true = empty)
     *
     * @return boolean
     */
    public function isEmpty(): bool
    {
        return $this->num_elements == 0;
    }


    /**
     * Push an element into the priority queue.  The process is:
     *   1. Get next free position
     *   2. Get father's position
     *   3. Insert or swith positions
     *
     * @param Mixed $element
     * @param Integer $priority
     * @return boolean
     */
    public function push($element, $priority): bool
    {
        //Why is the first element treated differently?  Because otherwise the first element
        //in the queue would have index 0 (zero), and that is not desired.  ;-)
        if ($this->isEmpty()) {
            $this->num_elements          = 1;
            $this->queue[1]['element']   = $element;
            $this->queue[1]['priority']  = $priority;
            $this->queue[1]['timestamp'] = time();
            return true;
        }

        $this->num_elements++;                          //Increment number of elements inside the queue.

        $next_position    = $this->num_elements;        //Pointer to the next free position in the queue.
        $fathers_position = intdiv($next_position, 2);  //Obtain father's position of the new element.

        while (($fathers_position > 0) &&
               ($this->queue[$fathers_position]['priority'] > $priority)) {
            $this->queue[$next_position] = $this->queue[$fathers_position];
            $next_position               = $fathers_position;
            $fathers_position            = intdiv($next_position, 2);
        }
        $this->queue[$next_position]['element']   = $element;
        $this->queue[$next_position]['priority']  = $priority;
        $this->queue[$next_position]['timestamp'] = time();
        return true;
    }


    /**
     * Get the first element of the priority queue.
     * In order to have the correct priority queue, we get the last element and insert it in
     * the first position.  And then we push it down to it's correct position.
     *
     * @return Mixed
     */
    public function pop()
    {
        //What if we perform a pop on an empty queue?  Throw exception.
        if ($this->isEmpty()) {
            throw new EmptyQueueException("Queue is empty");
        }

        $first_element = $this->queue[1];

        //We get the last element of the priority queue, and decrement the number of elements in it.
        $last = $this->queue[$this->num_elements];   //Remember! Index in implementation is one less!
        $this->num_elements--;

        //Point to the top of the queue and its first child
        $top      = 1;
        $tops_son = $top * 2;

        //If first son exists and sibling's priority is higher, point to the sibling
        if (($tops_son < $this->num_elements) && ($this->queue[$tops_son+1]['priority'] < $this->queue[$tops_son]['priority'])) {
            $tops_son++;
        }

        //While son exists and priority is higher than last element, change!
        while (($tops_son < $this->num_elements) && ($this->queue[$tops_son]['priority'] < $last['priority'])) {
            $this->queue[$top] = $this->queue[$tops_son];
            $top                 = $tops_son;
            $tops_son            = $top * 2;

            //Again, if first son exists and sibling's priority is higher, point to the sibling
            if (($tops_son < $this->num_elements) && ($this->queue[$tops_son+1]['priority'] < $this->queue[$tops_son]['priority'])) {
                $tops_son++;
            }
        }
        $this->queue[$top] = $last;

        return $first_element['element'];
    }


    /**
     * Eliminate all the queue elements, and set num_elements to zero.
     *
     * @return void
     */
    public function purge(): void
    {
        array_splice($this->queue, 0);
        $this->num_elements = 0;
    }


    /**
     * Returns the number of elements in the queue
     *
     * @return integer
     */
    public function count(): int
    {
        return $this->num_elements;
    }


    /**
     * Just a help function to print out the queue
     *
     * @return void
     */
    public function print(): void
    {
        for ($i=1; $i<=$this->num_elements; $i++) {
            echo $i." - ".$this->queue[$i]['priority']." - ".$this->queue[$i]['element']."\n";
        }
    }

}
?>