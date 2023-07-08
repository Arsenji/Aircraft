<?php
abstract class Aircraft {
    public $name;
    protected $maxSpeed;
    protected $isFlying;

    public function __construct($name, $maxSpeed) {
        $this->name = $name;
        $this->maxSpeed = $maxSpeed;
        $this->isFlying = false;
    }

    public function takeoff() {
        $this->isFlying = true;
        echo $this->name . " взлетел.\n";
    }

    public function land() {
        $this->isFlying = false;
        echo $this->name . " приземлился.\n";
    }

    public function getStatus() {
        return ($this->isFlying) ? "В воздухе" : "На земле";
    }
}

class Mig extends Aircraft {
    public function attack() {
        echo $this->name . " атакует цель.\n";
    }
}

class Tu154 extends Aircraft {
    // Дополнительные методы или свойства для класса Tu154
}

class Airport {
    private $hangarCapacity;
    private $hangarOccupancy;

    public function __construct($hangarCapacity) {
        $this->hangarCapacity = $hangarCapacity;
        $this->hangarOccupancy = 0;
    }

    public function acceptAircraft(Aircraft $aircraft) {
        if ($this->hangarOccupancy < $this->hangarCapacity) {
            $this->hangarOccupancy++;
            echo $aircraft->name . " принят в аэропорт.\n";
        } else {
            echo "Аэропорт полон. " . $aircraft->name . " не может быть принят.\n";
        }
    }

    public function releaseAircraft(Aircraft $aircraft) {
        $this->hangarOccupancy--;
        echo $aircraft->name . " освободил место и улетел.\n";
    }

    public function aircraftGoesToParking(Aircraft $aircraft) {
        echo $aircraft->name . " ушел на стоянку.\n";
    }

    public function aircraftReadyForTakeoff(Aircraft $aircraft) {
        echo $aircraft->name . " готов к взлету.\n";
    }

    public function getHangarOccupancy() {
        return $this->hangarOccupancy; // количество самолетов, занятых в ангаре
    }

    public function getMaxHangarCapacity() {
        return $this->hangarCapacity; // максимальная вместимость ангара
    }

    // Дополнительные методы аэропорта
}
