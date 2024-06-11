<?php
interface Employee {
    public function getSalary();
    public function setSalary($salary);
    public function getRole();
}

class Manager implements Employee {
    private $salary = 0;
    private $employees = array();
    public function getSalary()
    {
        return $this->salary;
    }

    public function setSalary($salary)
    {
        $this->salary = $salary;
    }

    public function getRole()
    {
        return get_class($this);
    }

    public function getEmployees(){
        return $this->employees;
    }

    public function addEmployee(Employee $employee){
        array_push($this->employees, $employee);
    }
}

class Developer implements Employee {
    private $programmingLanguage;
    private $salary = 0;

    public function getSalary()
    {
        return $this->salary;
    }

    public function setSalary($salary)
    {
        $this->salary = $salary;
    }

    public function getRole()
    {
        return get_class($this);
    }

    public function setProgrammingLanguage($lang){
        $this->programmingLanguage = $lang;
    }

    public function getProgrammingLanguage(){
        return $this->programmingLanguage;
    }
}

class Designer implements Employee {
    private $salary = 0;
    private $designingTool;

    public function getDesigningTool(){
        return $this->designingTool;
    }

    public function setDesigningTool($tool){
        $this->designingTool = $tool;
    }

    public function getSalary()
    {
        return $this->salary;
    }

    public function setSalary($salary)
    {
        $this->salary = $salary;
    }

    public function getRole()
    {
        return get_class($this);
    }
}

?>