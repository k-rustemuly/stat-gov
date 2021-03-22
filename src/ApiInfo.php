<?php

namespace Stat\Gov;


/**
 * Class ApiInfo
 *
 * Класс информации о ИП или Орагизации
 *
 * @package Stat\Gov
 */

class ApiInfo
{
    public $id = 0;
    public $bin = null;
    public $name  = null;
    public $registerDate = "1900-01-01T00:00:00.000+0000";
    public $okedCode = 0;
    public $okedName = null;
    public $secondOkeds = [];
    public $krpCode = 0;
    public $krpName = null;
    public $krpBfCode = 0;
    public $krpBfName = null;
    public $katoCode = 0;
    public $katoId = 0;
    public $katoAddress = null;
    public $fio = null;
    public $is_ip = false;
    
    public function __construct(array $info)
    {
        $this->id = $info['id'];
        $this->bin = $info['bin'];
        $this->name = $info['name'];
        $this->registerDate = $info['registerDate'];
        $this->okedCode = intval($info['okedCode']);
        $this->okedName = $info['okedName'];
        $this->secondOkeds = explode(",",$info['secondOkeds']!=null?$info['secondOkeds']:"",-1);
        $this->krpCode = intval($info['krpCode']);
        $this->krpName = $info['krpName'];
        $this->krpBfCode = intval($info['krpBfCode']);
        $this->krpBfName = $info['krpBfName'];
        $this->katoCode = intval($info['katoCode']);
        $this->katoId = intval($info['katoId']);
        $this->katoAddress = $info['katoAddress'];
        $this->fio = $info['fio'];
        $this->is_ip = $info['is_ip'];
        
    }

    public function getId() {
        return $this->id;
    }

    public function getBin() {
        return $this->bin;
    }

    public function getName() {
        return $this->name;
    }
    
    public function getRegisterDate() {
        return new \DateTime($this->registerDate);
    }
    
    public function getOkedCode() {
        return $this->okedCode;
    }
    
    public function getOkedName() {
        return $this->okedName;
    }
    
    public function getSecondOkeds() {
        return $this->secondOkeds;
    }
    
    public function getKrpCode() {
        return $this->krpCode;
    }
    
    public function getKrpName() {
        return $this->krpName;
    }
    
    public function getKrpBfCode() {
        return $this->krpBfCode;
    }
    
    public function getKrpBfName() {
        return $this->krpBfName;
    }
    
    public function getKatoCode() {
        return $this->katoCode;
    }
    
    public function getKatoId() {
        return $this->katoId;
    }
    
    public function getKatoAddress() {
        return $this->katoAddress;
    }
    
    public function getFio() {
        return $this->fio;
    }
    
    public function isIp() {
        return $this->is_ip;
    }
}