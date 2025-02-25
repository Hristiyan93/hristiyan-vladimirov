<?php

interface Routes_NodeInterface
{
    function createPath($child);
    function canAddChild($child);
}
