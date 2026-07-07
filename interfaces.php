<?php 

interface Subject{
  public function attach(Observer $observer): void;
  public function detach(Observer $observer): void;
  public function notify(): void;
}

interface Observer{
  public function update(Subject $subject):void;
}