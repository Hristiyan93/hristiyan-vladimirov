<?php

class Routes_Builder
{
    /**
     * @var NodesResolverInterface
     */
    protected $resolver;
    
    function __construct($resolver){
        $this->resolver = $resolver;
    }
    
    /**
     * @param NodeInterface $start
     */
    function build($start){
        $queue = new \SplQueue();
        $queue->enqueue($start);
        $routes = array($start);
        
        while(!$queue->isEmpty()){
            $route = $queue->dequeue();
    
            $nodes = $this->resolver->getNeighbor($route);
    
            foreach($nodes as $node){
                if($route->canAddChild($node)){
                    $newRoute = $route->createPath($node);
                    $queue->enqueue($newRoute);
                    $routes[] = $newRoute;
                }
            }
        }
        return $routes;
    }
}