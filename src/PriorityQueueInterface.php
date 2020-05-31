<?php

Interface PriorityQueueInterface
{

    public function isEmpty(): bool;
    public function push($element, $priority): bool;
    public function pop();
    public function purge(): void;
    public function count(): int;
    public function print(): void;

}
?>