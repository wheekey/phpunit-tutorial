<?php

namespace App\Calculator;

class Calculator
{

    protected $operations = [];

    public function setOperation(OperationInterface $operation)
    {
        $this->operations[] = $operation;
    }

    /**
     * @return array
     */
    public function getOperations(): array
    {
        return $this->operations;
    }

    /**
     * @param array $operations
     */
    public function setOperations(array $operations): void
    {
        $filterdOperations = array_filter($operations, function($operation){
          return $operation instanceof OperationInterface;
        }

        );


        $this->operations = array_merge($this->operations, $filterdOperations);
    }

    public function calculate()
    {
        if(count($this->operations )> 1)
        {
           return array_map(function ($operation)
           {
               return $operation->calculate();
           }
           , $this->operations);

        }

        return $this->operations[0]->calculate();
    }



}