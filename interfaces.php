<?php 

interface Subject{
  public function attach(Observer $observer): void;
  public function detach(Observer $observer): void;
  public function notify(): void;
  public function getState():string;
}

interface Observer{
  public function update(Subject $subject):void;
}